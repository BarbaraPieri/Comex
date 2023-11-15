<?php
namespace Barbaraviana\Comex\classes\pagamento;

use Barbaraviana\Comex\classes\pagamento\Cliente;
use Barbaraviana\Comex\classes\pagamento\Produto; 

class Pedido {
  
    private $cliente;
    private $produtos;

    public function __construct($cliente) {
        $this->cliente = $cliente;
        $this->produtos = array();
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getProdutos() {
        return $this->produtos;
    }

    public function adicionarProduto($produto, $quantidade): void {
        $this->produtos[] = array('produto' => $produto, 'quantidade' => $quantidade);
    }

    public function removerProduto($produto, $quantidade) {
        $quantidadeTotalRemovida = 0;
    
        foreach ($this->produtos as $chave => $item) {
            if ($item['produto'] === $produto) {
                if ($item['quantidade'] <= $quantidade) {
                    // Se a quantidade a ser removida for maior ou igual à quantidade no pedido, remove o item inteiro
                    $quantidadeTotalRemovida += $item['quantidade'];
                    unset($this->produtos[$chave]);
                } else {
                    // Caso contrário, apenas decrementa a quantidade do item
                    $quantidadeTotalRemovida += $quantidade;
                    $this->produtos[$chave]['quantidade'] -= $quantidade;
                }
            }
        }
    
        if ($quantidadeTotalRemovida < $quantidade) {
            $mensagem = "Não foi possível remover toda a quantidade solicitada. Foram removidas {$quantidadeTotalRemovida} das {$quantidade} solicitadas.";
            throw new \RuntimeException($mensagem);
        }
    }
}

//Exemplo de uso
/* try {
    // Criar um objeto Cliente
    $cliente1 = new Cliente("João Silva", "joao@email.com", "12345678911", "Rua A, 123");

    // Criar um objeto Pedido
    $pedido1 = new Pedido($cliente1);

    // Adicionar produtos ao pedido
    $produto1 = new Produto("Produto A", 10.0, 2);
    $pedido1->adicionarProduto($produto1, 2);

    $produto2 = new Produto("Produto B", 20.0, 2);
    $pedido1->adicionarProduto($produto2, 1);

  
    // Exibir informações do pedido
    echo "Clientedo pedido: " . $cliente1->getNome() . "\n";
    echo "Produtos no pedido:\n";
    foreach ($pedido1->getProdutos() as $item) {
        echo " - Produto: " . $item['produto']->getNome() . ", Quantidade: " . $item['quantidade'] . "\n";
    }

} catch (\RuntimeException $e) {
    echo "Erro: " . $e->getMessage() . "\n";
} */
?>


