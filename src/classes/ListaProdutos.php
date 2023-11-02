<?php
// Criar uma lista de produtos

$produto1 = [
    "item" => "Lapiseira 0,5",
    "preço" => 10.99
];

$produto2 = [
    "item" => "Grafite 0,5",
    "preço" => 5.99
];

$produto3 = [
    "item" => "Marca Texto",
    "preço" => 7.99
];

$produto4 = [
    "item" => "Caneta Gel",
    "preço" => 4.99
];

$produto5 = [
    "item" => "Borracha",
    "preço" => 3.99
];

$listaDeProdutos = [$produto1, $produto2, $produto3, $produto4, $produto5];

for ($i = 0; $i < count($listaDeProdutos); $i++) {
    echo "Produto " . ($i + 1) . ": " . $listaDeProdutos[$i]["item"] . " - Preço: $" . $listaDeProdutos[$i]["preço"] . PHP_EOL;
}
?>
