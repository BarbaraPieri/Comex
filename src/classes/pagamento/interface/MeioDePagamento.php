<?php
namespace Barbaraviana\Comex\classes\pagamento\interface;
interface MeioDePagamento {
    public function processarPagamento($valor);
    public function exibirRecibo($valor);
}
