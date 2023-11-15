<?php
session_start();

if (isset($_GET['id'])) {
    $produtoId = $_GET['id'];

    // Verifica se o produto existe no carrinho
    if (isset($_SESSION['carrinho'][$produtoId])) {
        // Remove o produto do carrinho
        unset($_SESSION['carrinho'][$produtoId]);

        // Redireciona de volta para a página do carrinho
        header('Location: carrinho.php');
        exit();
    }
}

// Se o ID do produto não estiver presente ou o produto não estiver no carrinho, redirecione para a página do carrinho
header('Location: carrinho.php');
exit();
?>
