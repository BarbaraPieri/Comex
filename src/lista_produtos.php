<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>
<body>

    <h1>Lista de Produtos Disponíveis</h1>

    <?php
    try {
        $pdo = include __DIR__ . "/../src/Config/pdo.php";

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->query("SELECT * FROM produtos");
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($produtos as $produto) {
            echo '<div>';
            echo '<p>Nome: ' . $produto['nome'] . '</p>';
            echo '<p>Preço: $' . $produto['preco'] . '</p>';
            echo '<p>Quantidade em Estoque: ' . $produto['quantidade'] . '</p>';
            echo '<a href="comprar_produto.php?id=' . $produto['id'] . '">Comprar</a>';
            echo '</div>';
        }
    } catch (PDOException $e) {
        echo 'Erro de conexão: ' . $e->getMessage();
    } finally {
        $pdo = null;
    }
    ?>

</body>
</html>
