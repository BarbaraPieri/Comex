<?php
require_once(__DIR__ . '/MeioDePagamento.php');
require_once(__DIR__ . '/Pix.php');
require_once(__DIR__ . '/Boleto.php');
require_once(__DIR__ . '/CartaoDeCredito.php');
require_once (__DIR__ . '/ExceptionCustomizada.php');


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
