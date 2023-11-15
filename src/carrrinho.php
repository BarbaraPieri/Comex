<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <?php
    // Verifica se há itens no carrinho
    if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
        echo '<h2>Itens no Carrinho</h2>';

        $subtotal = 0;

        // Exibe os detalhes de cada produto no carrinho
        foreach ($_SESSION['carrinho'] as $produtoId => $detalhesProduto) {
            echo '<div>';
            echo '<p>Nome: ' . $detalhesProduto['nome'] . '</p>';
            echo '<p>Preço: $' . $detalhesProduto['preco'] . '</p>';
            echo '<p>Quantidade: ' . $detalhesProduto['quantidade'] . '</p>';
            echo '<p>Subtotal: $' . ($detalhesProduto['preco'] * $detalhesProduto['quantidade']) . '</p>';
            echo '<form action="atualizar_quantidade.php?id=' . $produtoId . '" method="post">';
            echo '<label for="quantidade">Nova Quantidade:</label>';
            echo '<input type="number" name="quantidade" id="quantidade" min="1" value="' . $detalhesProduto['quantidade'] . '" required>';
            echo '<input type="submit" value="Atualizar Quantidade">';
            echo '</form>';
            echo '<a href="remover_produto.php?id=' . $produtoId . '">Remover Produto</a>';
            echo '</div>';

            // Calcula o subtotal
            $subtotal += $detalhesProduto['preco'] * $detalhesProduto['quantidade'];
        }

        // Exibe o subtotal
        echo '<h3>Subtotal: $' . $subtotal . '</h3>';

        // Botões para ações adicionais
        echo '<button onclick="window.location.href=\'index.html\'" class="blue">Continuar Comprando</button>';
        echo '<button onclick="window.location.href=\'limpar_carrinho.php\'" class="red">Limpar Carrinho</button>';
    } else {
        echo '<p>O carrinho está vazio.</p>';
        echo '<button onclick="window.location.href=\'index.html\'" class="blue">Voltar à Página Inicial</button>';
    }
    ?>
</body>
</html>
