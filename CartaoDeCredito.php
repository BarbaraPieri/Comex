<?php
require_once(__DIR__ . '/MeioDePagamento.php');

class CartaoDeCredito implements MeioDePagamento {
    public function processarPagamento($valor) {
        if ($valor === null) {
            throw new  ExceptionCustomizada ("Sistema fora do ar, por favor tente mais tarde. ");
        }
        // Lógica para processar um pagamento via cartão de crédito
        echo "Pagamento via Cartão de Crédito de R$ " . $valor . " processado com sucesso.\n";
    }

    public function exibirRecibo($valor) {
        // Lógica para exibir um recibo de pagamento via cartão de crédito
        echo "Recibo de pagamento via Cartão de Crédito de R$ " . $valor . "\n";
    }
}
?>