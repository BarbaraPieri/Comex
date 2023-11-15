<?php

use PHPUnit\Framework\TestCase;
use Barbaraviana\Comex\classes\pagamento\carrinhoDeCompras;
use Barbaraviana\Comex\classes\pagamento\Produto;

class CarrinhoDeComprasTest extends TestCase
{
    public function testCalcularSubtotal()
    {
        // Crie objetos da classe Produto
        $produto1 = new Produto("Produto A", 10.0, 2);
        $produto2 = new Produto("Produto B", 20.0, 2);

        // Crie um objeto da classe CarrinhoDeCompras
        $carrinho = new CarrinhoDeCompras();

        // Adicione produtos ao carrinho
        $carrinho->adicionarProduto($produto1, 2);
        $carrinho->adicionarProduto($produto2, 1);

        // Calcule o subtotal
        $subtotal = $carrinho->calcularSubtotal();

        // Verifique se o subtotal está correto
        $this->assertEquals(40.0, $subtotal);
    }

    public function testCalcularDesconto()
    {
        // Crie um objeto da classe CarrinhoDeCompras
        $carrinho = new CarrinhoDeCompras();

        // Calcule o desconto
        $desconto = $carrinho->calcularDesconto(10);

        // Verifique se o desconto está correto
        $this->assertEquals(0.0, $desconto);
    }

    public function testCalcularFrete()
    {
        // Crie um objeto da classe CarrinhoDeCompras
        $carrinho = new CarrinhoDeCompras();

        // Calcule o frete
        $frete = $carrinho->calcularFrete(5);

        // Verifique se o frete está correto
        $this->assertEquals(5.0, $frete);
    }

    public function testCalcularTotal()
    {
        // Crie um objeto da classe CarrinhoDeCompras
        $carrinho = new CarrinhoDeCompras();

        // Calcule o total
        $total = $carrinho->calcularTotal(10, 5);

        // Verifique se o total está correto
        $this->assertEquals(5.0, $total);
    }
}
