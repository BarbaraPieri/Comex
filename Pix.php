<?php

require_once(__DIR__ . '/MeioDePagamento.php');
require_once (__DIR__ . '/ExceptionCustomizada.php');



class Pix implements MeioDePagamento {
    public function processarPagamento($valor) {
        if ($valor === null) {
            throw new  ExceptionCustomizada ("Sistema fora do ar, por favor tente mais tarde. ");
        }

        // Lógica para processar um pagamento via Pix
        echo "Pagamento via Pix de R$ " . $valor . " processado com sucesso.\n";
    }

    public function exibirRecibo($valor) {
        // Lógica para exibir um recibo de pagamento via Pix
        echo "Recibo de pagamento via Pix de R$ " . $valor . "\n";
    }
}

?>