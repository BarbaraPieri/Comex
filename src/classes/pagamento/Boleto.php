<?php

namespace Barbaraviana\Comex\classes\pagamento;

use Barbaraviana\Comex\classes\pagamento\interface\MeioDePagamento;


class Boleto implements MeioDePagamento {
    public function processarPagamento($valor) {
        // Lógica para processar um pagamento via boleto
        echo "Pagamento via Boleto de R$ " . $valor . " processado com sucesso.\n";
    }

    public function exibirRecibo($valor) {
        // Lógica para exibir um recibo de pagamento via boleto
        echo "Recibo de pagamento via Boleto de R$ " . $valor . "\n";
    }
}
?>