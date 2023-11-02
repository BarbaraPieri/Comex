<?php


use PHPUnit\Framework\TestCase;
use Barbaraviana\Comex\classes\pagamento\Produto;
use InvalidArgumentException;


class ProdutoTest extends TestCase
{
    public function testAdicionarProdutoComQuantidadeNegativa()
    {
        $produto = new Produto("Produto A", 10.0, 5);

        $this->expectException(InvalidArgumentException::class);
        $produto->adicionarProduto(-1);
    }

    public function testAdicionarProdutoComQuantidadePositiva()
    {
        $produto = new Produto("Produto A", 10.0, 5);
        $quantidadeAdicionada = 3; // Adicionar 3 unidades do produto

        $produto->adicionarProduto($quantidadeAdicionada);

     $this->assertEquals(5 + $quantidadeAdicionada, $produto->getQuantidadeEstoque());
    }

}