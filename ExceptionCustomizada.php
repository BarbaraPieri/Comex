<?php
class ExceptionCustomizada extends Exception {
    public function __construct($mensagem = "Sistema fora do ar, por favor tente mais tarde. ", $codigo = 0, Exception $anterior = null) {
        parent::__construct($mensagem, $codigo, $anterior);
    }
}

?>