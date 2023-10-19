<?php

class Cliente {
    private $nome;
    private $email;
    private $celular;
    private $endereco;
    private $totalCompras;

    public function __construct($nome, $email, $celular, $endereco) {
        $this->nome = $nome;
        $this->email = $email;
        $this->celular = $celular;
        $this->endereco = $endereco;
        $this->totalCompras = 0; // Inicializa o total de compras como 0
    }

    // Getters
    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getTotalCompras() {
        return $this->totalCompras;
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

    // Método para adicionar compras
    public function adicionarCompra($valor) {
        $this->totalCompras += $valor;
    }
}

// Criar um objeto Cliente
$cliente1 = new Cliente("João Silva", "joao@email.com", "123456789", "Rua A, 123");

// Exibir os valores atribuídos à classe
echo "Nome do cliente: " . $cliente1->getNome() . "\n";
echo "E-mail do cliente: " . $cliente1->getEmail() . "\n";
echo "Celular do cliente: " . $cliente1->getCelular() . "\n";
echo "Endereço do cliente: " . $cliente1->getEndereco() . "\n";
echo "Total de compras do cliente: R$" . $cliente1->getTotalCompras() . "\n";

// Adicionar uma compra de R$100 ao cliente
$cliente1->adicionarCompra(100);

// Exibir o novo total de compras
echo "Novo total de compras do cliente: R$" . $cliente1->getTotalCompras() . "\n";
?>
