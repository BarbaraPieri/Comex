<?php
class Produto {
    private $nome;
    private $preco;
    private $quantidadeEstoque;

    public function __construct($nome, $preco, $quantidadeEstoque) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidadeEstoque = $quantidadeEstoque;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getQuantidadeEstoque() {
        return $this->quantidadeEstoque;
    }

    public function adicionarProduto($quantidade) {
        $this->quantidadeEstoque += $quantidade;
    }

    public function removerProduto($quantidade) {
        if ($quantidade <= $this->quantidadeEstoque) {
            $this->quantidadeEstoque -= $quantidade;
        } else {
            echo "Quantidade insuficiente em estoque.\n";
        }
    }

    public function calcularValorTotal() {
        return $this->preco * $this->quantidadeEstoque;
    }
}

// Criar um objeto Produto
$produto1 = new Produto("Produto A", 10.0, 50);

// Exibir informações iniciais do produto
echo "Nome do produto: " . $produto1->getNome() . "\n";
echo "Preço do produto: $" . $produto1->getPreco() . "\n";
echo "Quantidade em estoque: " . $produto1->getQuantidadeEstoque() . "\n";

// Adicionar 10 unidades do produto
$produto1->adicionarProduto(10);

// Remover 5 unidades do produto
$produto1->removerProduto(5);

// Exibir valor total em estoque
echo "Valor total em estoque: $" . $produto1->calcularValorTotal() . "\n";



?>