<?php

use Barbaraviana\Comex\classes\pagamento\Produto;


class CarrinhoDeCompras {
    private $produtos = array();

    public function adicionarProduto($produto, $quantidade) {
        $this->produtos[] = array('produto' => $produto, 'quantidade' => $quantidade);
    }

    public function removerProduto($produto) {
        // Encontre o índice do produto no carrinho
        $index = -1;
        foreach ($this->produtos as $key => $item) {
            if ($item['produto'] === $produto) {
                $index = $key;
                break;
            }
        }

        // Remova o produto se encontrado
        if ($index >= 0) {
            array_splice($this->produtos, $index, 1);
        }
    }

    public function calcularSubtotal() {
        $subtotal = 0;
        foreach ($this->produtos as $item) {
            $subtotal += $item['produto']->getPreco() * $item['quantidade'];
        }
        return $subtotal;
    }

    public function calcularDesconto($percentual) {
        $subtotal = $this->calcularSubtotal();
        return ($percentual / 100) * $subtotal;
    }

    public function calcularFrete($valorFrete) {
        return $valorFrete;
    }

    public function calcularTotal($percentualDesconto, $valorFrete) {
        $subtotal = $this->calcularSubtotal();
        $desconto = $this->calcularDesconto($percentualDesconto);
        $frete = $this->calcularFrete($valorFrete);
        return $subtotal - $desconto + $frete;
    }

}


// Crie objetos da classe Produto
$produto1 = new Produto("Produto A", 10.0, 2);
$produto2 = new Produto("Produto B", 20.0, 2);

// Crie um objeto da classe CarrinhoDeCompras
$carrinho = new CarrinhoDeCompras();

// Adicione produtos ao carrinho
$carrinho->adicionarProduto($produto1, 2);
$carrinho->adicionarProduto($produto2, 1);

// Calcule os valores
$subtotal = $carrinho->calcularSubtotal();
$desconto = $carrinho->calcularDesconto(10); // 10% de desconto
$frete = $carrinho->calcularFrete(5); // Frete de $5
$total = $carrinho->calcularTotal(10, 5); // Desconto de 10% e frete de $5

// Exiba os valores calculados
echo "Subtotal: $" . $subtotal . "\n";
echo "Desconto: $" . $desconto . "\n";
echo "Frete: $" . $frete . "\n";
echo "Total: $" . $total . "\n";
?>
