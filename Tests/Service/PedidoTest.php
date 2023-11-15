<?php
use Barbaraviana\Comex\classes\pagamento\Pedido;
use Barbaraviana\Comex\classes\pagamento\cliente;
use Barbaraviana\Comex\classes\pagamento\Produto;


use PHPUnit\Framework\TestCase;

class PedidoTest extends TestCase
{
    public function testAdicionarProdutoAoPedido()
    {
        $cliente = new Cliente("João Silva", "joao@email.com", "12345678912" , "Rua A, 123");
        $pedido = new Pedido(1, $cliente);
        $produto = new Produto("Produto A", 10.0, 5);

        $pedido->adicionarProduto($produto, 2);

        $produtosNoPedido = $pedido->getProdutos();
        $this->assertCount(1, $produtosNoPedido);

        $item = $produtosNoPedido[0];
        $this->assertEquals($produto, $item['produto']);
        $this->assertEquals(2, $item['quantidade']);
    }

    public function testRemoverProdutoDoPedido()
    {
        $cliente = new Cliente("Maria Santos", "maria@email.com", "98765432101", "Rua B, 456");
        $pedido = new Pedido(2, $cliente);
        $produto = new Produto("Produto B", 15.0, 3);

        $pedido->adicionarProduto($produto, 8);

        // Verifica se o produto foi adicionado corretamente ao pedido
        $this->assertCount(1, $pedido->getProdutos());

        // Remove o produto do pedido
        $pedido->removerProduto($produto, 8);

        // Verifica se o produto foi removido com sucesso
        $this->assertCount(0, $pedido->getProdutos());
    }
}
