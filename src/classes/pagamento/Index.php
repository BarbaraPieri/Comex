<?php

use Barbaraviana\Comex\classes\pagamento\Pix;
use Barbaraviana\Comex\classes\pagamento\CartaoDeCredito;
use Barbaraviana\Comex\classes\pagamento\Boleto;



$pix = new Pix();
$valorDoPagamento = 130.50;
$pix->processarPagamento($valorDoPagamento);
$pix->exibirRecibo($valorDoPagamento);

$cartao = new CartaoDeCredito();
$valorDoPagamento = null;
$cartao->processarPagamento($valorDoPagamento);
$cartao->exibirRecibo($valorDoPagamento);

$boleto = new Boleto();
$valorDoPagamento = 300.25;
$boleto->processarPagamento($valorDoPagamento);
$boleto->exibirRecibo($valorDoPagamento);
?>
