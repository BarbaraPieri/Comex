<?php

use PHPUnit\Framework\TestCase;

use Barbaraviana\Comex\classes\pagamento\interface\MeioDePagamento;
class MeiosDePagamentoTest extends TestCase
{
    public function testProcessarPagamento()
    {
        // Criar um mock da interface MeioDePagamento
        $meioDePagamentoMock = $this->getMockBuilder(MeioDePagamento::class)
            ->getMock();

        // Configurar a expectativa de chamada do método processarPagamento
        $meioDePagamentoMock->expects($this->once())
            ->method('processarPagamento')
            ->with($this->equalTo(100.0)); // Espera que o método seja chamado com o valor 100.0

        // Chamando o método processarPagamento no mock
        $meioDePagamentoMock->processarPagamento(100.0);
       
    }
}