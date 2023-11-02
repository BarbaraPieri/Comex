<?php
// Função para calcular o valor com desconto
function calcularDesconto($valorCompra) {
    if ($valorCompra >= 100) {
        $desconto = 0.10 * $valorCompra; // 10% de desconto
        $valorComDesconto = $valorCompra - $desconto;
    } else {
        $valorComDesconto = $valorCompra;
    }
    return $valorComDesconto;
}

// Valor inicial da compra
$valorInicial = 120.00; 

// Calcular o valor com desconto
$valorFinal = calcularDesconto($valorInicial);

// Exibir os valores iniciais e finais
echo "Valor Inicial: R$" . number_format($valorInicial, 2) . PHP_EOL;
echo "Valor Final: R$" . number_format($valorFinal, 2) . PHP_EOL;
?>
