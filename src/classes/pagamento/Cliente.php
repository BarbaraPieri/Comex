<?php

namespace Barbaraviana\Comex\classes\pagamento;

use InvalidArgumentException;
use LogicException;

class Cliente {
    private $nome;
    private $email;
    private $celular;
    private $endereco;

    public function __construct($nome, $email, $celular, $endereco) {
        try {
            if (empty($nome)) {
                throw new InvalidArgumentException("Nome não pode ser vazio");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new InvalidArgumentException("E-mail inválido.");
            }
            if (!preg_match('/^\d{11}$/', $celular)) {
                throw new InvalidArgumentException("Celular deve ter 11 dígitos numéricos.");
            }

            $this->nome = $nome;
            $this->email = $email;
            $this->celular = $celular;
            $this->endereco = $endereco;
        } catch (InvalidArgumentException $e) {
            throw new LogicException("Erro ao criar cliente: " . $e->getMessage());
        }
    }
    
    // Getters
    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getCelular() {
        return $this->formatarCelular($this->celular);
    }

    public function getEndereco() {
        return $this->endereco;
    }

    // Setters
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    // Método para formatar celular
    public function formatarCelular($celular) {
        // Remove todos os caracteres que não são dígitos
        $celular = preg_replace('/\D/', '', $celular);

        // Aplica a máscara (XX) XXXXX-XXXX
        $numeroFormatado = preg_replace('/^(\d{2})(\d{5})(\d{4})$/', '($1) $2-$3', $celular);

        return $numeroFormatado;
    }
}


?>
