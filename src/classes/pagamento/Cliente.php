<?php

namespace Barbaraviana\Comex\classes\pagamento;
use InvalidArgumentException;
use LogicException;

class Cliente {
    private $nome;
    private $email;
    private $celular;
    private $endereco;
    private $totalCompras;

    public function __construct($nome, $email, $celular, $endereco) {
        try {
            if (empty($nome)) {
                throw new InvalidArgumentException ("Nome não pode ser vazio");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new InvalidArgumentException ("E-mail inválido.");
            }
            if (!preg_match('/^\d{11}$/', $celular)) {
                throw new InvalidArgumentException ("Celulardeve ter 11 dígitos numéricos.");
            }

        $this->nome = $nome;
        $this->email = $email;
        $this->celular = $celular;
        $this->endereco = $endereco;
        $this->totalCompras = 0; // Inicializa o total de compras como 0
    } catch(InvalidArgumentException $e) {
        throw new  LogicException ("Erro ao criar cliente: ". $e->getMessage());
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

    //metodo para formatar celular
    
    public function formatarCelular($celular) {
        // Remove todos os caracteres que não são dígitos
        $celular = preg_replace('/\D/', '', $celular);

        // Aplica a máscara (XX) XXXXX-XXXX
        $numeroFormatado = preg_replace('/^(\d{2})(\d{5})(\d{4})$/', '($1) $2-$3', $celular);

        return $numeroFormatado;
    }


    // Método para adicionar compras
    public function adicionarCompra($valor) {
        try {
            if (!is_numeric($valor) || $valor < 0) {
                throw new InvalidArgumentException("O valor da compra deve ser numérico e maior ou igual a zero.");
            }
        $this->totalCompras += $valor;
     } catch (InvalidArgumentException $e) {
        throw new InvalidArgumentException("Erro ao adicionar compra: " . $e->getMessage());
     }
    }
}

try {
    // Criar um objeto Cliente
    $cliente1 = new Cliente("João Silva", "joao@email.com", "01234567890", "Rua A, 123");

    // Exibir os valores atribuídos à classe
    echo "Nome do cliente: " . $cliente1->getNome() . "\n";
    echo "E-mail do cliente: " . $cliente1->getEmail() . "\n";
    echo "Celular do cliente: " . $cliente1->getCelular() . "\n";
    echo "Endereço do cliente: " . $cliente1->getEndereco() . "\n";
    echo "Total de compras do cliente: R$" . $cliente1->getTotalCompras() . "\n";

    // Adicionar uma compra de R$100 ao cliente
    // $cliente1->adicionarCompra(100);

     // Adicionar uma compra de valor negativo ao cliente
     $cliente1->adicionarCompra(-100);

    // Exibir o novo total de compras
    echo "Novo total de compras do cliente: R$" . $cliente1->getTotalCompras() . "\n";
} catch (LogicException $e) {
    echo "Erro: " . $e->getMessage() ."\n";
}
?>
