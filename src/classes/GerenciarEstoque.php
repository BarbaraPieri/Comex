<?php
// Inicialize a lista de produtos com nome, preço e quantidade em estoque
$produtos = [
    ["nome" => "Lapiseira 0,5", "preço" => 10.99, "estoque" => 5],
    ["nome" => "Grafite 0,5", "preço" => 5.99, "estoque" => 8],
    ["nome" => "Marca Texto", "preço" => 7.99, "estoque" => 12],
    ["nome" => "Caneta Gel", "preço" => 4.99, "estoque" => 12],
    ["nome" => "Borracha", "preço" => 3.99, "estoque" => 3]
];

// Função para adicionar um produto ao estoque
function adicionarProduto($produto, $quantidade) {
    global $produtos;
    foreach ($produtos as &$item) {
        if ($item["nome"] === $produto) {
            $item["estoque"] += $quantidade;
            return;
        }
    }
}

// Função para remover um produto do estoque
function removerProduto($produto, $quantidade) {
    global $produtos;
    foreach ($produtos as &$item) {
        if ($item["nome"] === $produto) {
            if ($item["estoque"] >= $quantidade) {
                $item["estoque"] -= $quantidade;
            } else {
                echo "Estoque insuficiente para $produto." . PHP_EOL;
            }
            return;
        }
    }
}

// Função para verificar a disponibilidade de um produto
function verificarDisponibilidade($produto) {
    global $produtos;
    foreach ($produtos as $item) {
        if ($item["nome"] === $produto) {
            return $item["estoque"];
        }
    }
    return 0; // Produto não encontrado
}

// Interface de linha de comando para testar as funções
echo "Bem-vindo ao sistema de gerenciamento de estoque." . PHP_EOL;
while (true) {
    echo "Selecione uma opção:" . PHP_EOL;
    echo "1. Adicionar produto" . PHP_EOL;
    echo "2. Remover produto" . PHP_EOL;
    echo "3. Verificar disponibilidade de um produto" . PHP_EOL;
    echo "4. Sair" . PHP_EOL;

    $opcao = readline("Opção: ");

    switch ($opcao) {
        case '1':
            $produto = readline("Nome do produto a adicionar: ");
            $quantidade = (int)readline("Quantidade a adicionar: ");
            adicionarProduto($produto, $quantidade);
            break;
        case '2':
            $produto = readline("Nome do produto a remover: ");
            $quantidade = (int)readline("Quantidade a remover: ");
            removerProduto($produto, $quantidade);
            break;
        case '3':
            $produto = readline("Nome do produto a verificar: ");
            $estoque = verificarDisponibilidade($produto);
            echo "Estoque disponível para $produto: $estoque" . PHP_EOL;
            break;
        case '4':
            exit("Obrigado por utilizar o sistema de gerenciamento de estoque. Adeus!");
        default:
            echo "Opção inválida. Tente novamente." . PHP_EOL;
    }
}
?>
