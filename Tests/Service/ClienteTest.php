<?php

use PHPUnit\Framework\TestCase;
use Barbaraviana\Comex\classes\pagamento\Cliente;

class ClienteTest extends TestCase{
   
    public function testCriarCliente()
    {
        $cliente = new Cliente("João Silva", "joao@email.com", "12345678911", "Rua A, 123");

        $this->assertEquals("João Silva", $cliente->getNome());
        $this->assertEquals("joao@email.com", $cliente->getEmail());
        $this->assertEquals("(12) 34567-8911", $cliente->getCelular());
        $this->assertEquals("Rua A, 123", $cliente->getEndereco());
        $this->assertEquals(0, $cliente->getTotalCompras());
    }

    public function testAdicionarCompra()
    {
        $cliente = new Cliente("Maria Santos", "maria@email.com", "98765432101", "Rua B, 456");

        $cliente->adicionarCompra(100);
        $this->assertEquals(100, $cliente->getTotalCompras());

        // Testar exceção ao adicionar compra negativa
        $this->expectException(\InvalidArgumentException::class);
        $cliente->adicionarCompra(-100);
    }
}


