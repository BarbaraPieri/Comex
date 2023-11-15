<!-- comprar_produto.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar Produto</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <?php
    try {
        $pdo = include __DIR__ . "/../src/Config/pdo.php";

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_GET['id'])) {
            $produtoId = $_GET['id'];
            
            // Consulta o produto no banco de dados usando o ID
        $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
        $stmt->bindParam(':id', $produtoId);
        $stmt->execute();
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($produto) {
            // Exibe as informações do produto
            echo '<h2>Detalhes do Produto</h2>';
            echo '<p>Nome: ' . $produto['nome'] . '</p>';
            echo '<p>Preço: $' . $produto['preco'] . '</p>';
            echo '<p>Quantidade em Estoque: ' . $produto['quantidade'] . '</p>';

            // Formulário para o cliente inserir a quantidade desejada
            echo '<form action="processar_compra.php?id=' . $produto['id'] . '" method="post">';
            echo '<label for="quantidade">Quantidade desejada:</label>';
            echo '<input type="number" name="quantidade" id="quantidade" min="1" max="' . $produto['quantidade'] . '" required>';
            echo '<input type="submit" value="Comprar">';
            echo '</form>';
        } else {
            echo '<p>Produto não encontrado.</p>';
        }
    } else {
        echo '<p>ID do produto não especificado.</p>';
    }
} catch (PDOException $e) {
    echo 'Erro de conexão: ' . $e->getMessage();
} finally {
    $pdo = null;
}
?>
<button onclick="window.location.href='index.html'" class="blue">Voltar à Página Inicial</button>