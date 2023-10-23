<?php
interface MeioDePagamento {
    public function processarPagamento($valor);
    public function exibirRecibo($valor);
}
