<?php

namespace Barbaraviana\Comex\classes\pagamento;
use InvalidArgumentException;


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
        if ($quantidade < 0) {
            throw new InvalidArgumentException("A quantidade a ser adicionada não pode ser negativa.");
        }
         
        $this->quantidadeEstoque += $quantidade;
    }
    
    public function removerProduto($quantidade) {
        if ($quantidade < 0) {
            throw new InvalidArgumentException("A quantidade a ser removida não pode ser negativa.");
        }
        if ($quantidade > $this->quantidadeEstoque) {
            throw new InvalidArgumentException("Quantidade insuficiente em estoque");
            
        }
        // Remover a quantidade em estoque
            $this->quantidadeEstoque -= $quantidade;
                
    }
   
    public function calcularValorTotal() {
        return $this->preco * $this->quantidadeEstoque;
    }
}


?>