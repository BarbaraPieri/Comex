<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Inclui o arquivo de configuração do banco de dados
        $pdo = include __DIR__ . "/../src/Config/pdo.php";

        // Configura o PDO para lançar exceções em caso de erro
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Variável para armazenar o objeto de instrução
        $stmt = null;

        // Verifica se o ID do produto e a quantidade foram passados pelo formulário
        if (isset($_GET['id']) && isset($_POST['quantidade'])) {
            $produtoId = $_GET['id'];
            $quantidadeDesejada = intval($_POST['quantidade']);

            // Consulta o produto no banco de dados
            $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id FOR UPDATE");
            $stmt->bindParam(':id', $produtoId);
            $stmt->execute();
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica se o produto existe
            if ($produto) {
                // Verifica se há estoque suficiente
                if ($quantidadeDesejada <= $produto['estoque']) {
                    // Inicia uma transação
                    $pdo->beginTransaction();

                    // Atualiza o estoque no banco de dados
                    $novoEstoque = $produto['estoque'] - $quantidadeDesejada;
                    $updateStmt = $pdo->prepare("UPDATE produtos SET estoque = :novoEstoque WHERE id = :id");
                    $updateStmt->bindParam(':novoEstoque', $novoEstoque);
                    $updateStmt->bindParam(':id', $produtoId);
                    $updateStmt->execute();

                    // Cria uma estrutura para armazenar os detalhes da compra na sessão
                    $carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];
                    $carrinho[$produtoId] = [
                        'nome' => $produto['nome'],
                        'preco' => $produto['preco'],
                        'quantidade' => $quantidadeDesejada,
                    ];

                    // Atualiza a sessão com o novo carrinho
                    $_SESSION['carrinho'] = $carrinho;

                    // Confirma a transação
                    $pdo->commit();

                    // Mensagem de sucesso (opcional)
                    echo '<p>Produto adicionado ao carrinho com sucesso.</p>';
                } else {
                    // Mensagem de erro se não houver estoque suficiente
                    echo '<p>Quantidade desejada indisponível em estoque.</p>';
                }
            } else {
                // Mensagem de erro se o produto não for encontrado
                echo '<p>Produto não encontrado.</p>';
            }
        } else {
            // Mensagem de erro se os parâmetros forem inválidos
            echo '<p>Parâmetros inválidos.</p>';
        }
    } catch (PDOException $e) {
        // Log do erro com detalhes adicionais
        $mensagemErro = 'Erro de conexão: ' . $e->getMessage() . "\n";
        if ($stmt !== null) {
            $mensagemErro .= 'Query SQL: ' . $stmt->queryString;
        }
        error_log($mensagemErro);

        // Rollback da transação apenas se uma transação estiver ativa
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }

        // Exibição de uma mensagem de erro amigável
        echo '<p>Ocorreu um erro ao processar a compra.</p>';
    } finally {
        // Fecha a conexão com o banco de dados
        $pdo = null;
    }
} else {
    // Mensagem de erro se o método HTTP não for POST
    echo '<p>Método inválido para processar a compra.</p>';
}
?>
