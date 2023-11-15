<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['id']) && isset($_POST['quantidade'])) {
        $produtoId = $_GET['id'];
        $novaQuantidade = intval($_POST['quantidade']);

        // Verifica se o produto existe no carrinho
        if (isset($_SESSION['carrinho'][$produtoId])) {
            // Atualiza a quantidade
            $_SESSION['carrinho'][$produtoId]['quantidade'] = $novaQuantidade;
        }
    }
}

// Redireciona de volta para a página do carrinho
header('Location: carrinho.php');
exit();
?>
