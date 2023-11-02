<?php
// Inicialize a lista de produtos com nome, preço e quantidade em estoque
$produtos = [
    ["nome" => "Lapiseira 0,5", "preço" => 10.99, "estoque" => 5],
    ["nome" => "Grafite 0,5", "preço" => 5.99, "estoque" => 8],
    ["nome" => "Marca Texto", "preço" => 7.99, "estoque" => 12],
    ["nome" => "Caneta Gel", "preço" => 4.99, "estoque" => 12],
    ["nome" => "Borracha", "preço" => 3.99, "estoque" => 3]
];

// Função para encontrar o produto de maior valor
function produtoMaisCaro($produtos) {
    $produtoMaisCaro = null;
    $precoMaisAlto = 0;

    foreach ($produtos as $produto) {
        if ($produto["preço"] > $precoMaisAlto) {
            $precoMaisAlto = $produto["preço"];
            $produtoMaisCaro = $produto;
        }
    }

    return $produtoMaisCaro;
}

// Função para encontrar o produto de menor valor
function produtoMaisBarato($produtos) {
    $produtoMaisBarato = null;
    $precoMaisBaixo = PHP_FLOAT_MAX;

    foreach ($produtos as $produto) {
        if ($produto["preço"] < $precoMaisBaixo) {
            $precoMaisBaixo = $produto["preço"];
            $produtoMaisBarato = $produto;
        }
    }

    return $produtoMaisBarato;
}

// Encontrar e exibir o produto mais caro e o mais barato
$produtoCaro = produtoMaisCaro($produtos);
$produtoBarato = produtoMaisBarato($produtos);

echo "Produto mais caro: " . $produtoCaro["nome"] . " - Preço: $" . $produtoCaro["preço"] . PHP_EOL;
echo "Produto mais barato: " . $produtoBarato["nome"] . " - Preço: $" . $produtoBarato["preço"] . PHP_EOL;
?>