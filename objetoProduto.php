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

try{
    // Criar um objeto Produto
    $produto1 = new Produto("Produto A", 10.0, 5);

    // Exibir informações iniciais do produto
    echo "Nome do produto: " . $produto1->getNome() . "\n";
    echo "Preço do produto: $" . $produto1->getPreco() . "\n";
    echo "Quantidade em estoque: " . $produto1->getQuantidadeEstoque() . "\n";

    // Adicionar 10 unidades do produto
    $produto1->adicionarProduto(10);

    echo "Quantidade total em estoque após adicionar produtos: " . $produto1->getQuantidadeEstoque(). "\n";

    // Adicionar -8 unidades do produto
    $produto1->adicionarProduto(-8);

    // Remover -5 unidades do produto (deve lançar  uma exceção)
    $produto1->removerProduto(-5);

    //Remover 600 unidades (deve lançar uma exceção)
    $produto1->removerProduto(600);
    
    
} catch (InvalidArgumentException  $e){
    echo "Erro ". $e->getMessage() ."\n";
}
// Exibir valor total em estoque
echo "Valor total em estoque: $" . $produto1->calcularValorTotal() . "\n";

?>