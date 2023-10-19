<?php

require_once(__DIR__ . '/objetoCliente.php');
require_once(__DIR__ . '/objetoProduto.php');

class Pedido {
    private $id;
    private $cliente;
    private $produtos;

    public function __construct($id, $cliente) {
        $this->id = $id;
        $this->cliente = $cliente;
        $this->produtos = array();
    }

    public function getId() {
        return $this->id;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getProdutos() {
        return $this->produtos;
    }

    public function adicionarProduto($produto, $quantidade) {
        $this->produtos[] = array('produto' => $produto, 'quantidade' => $quantidade);
    }
}
/// Criar um objeto Cliente
$cliente1 = new Cliente("João Silva", "joao@email.com", "123456789", "Rua A, 123");

// Criar um objeto Pedido
$pedido1 = new Pedido(1, $cliente1);

// Adicionar produtos ao pedido
$produto1 = new Produto("Produto A", 10.0, 5);
$pedido1->adicionarProduto($produto1, 2);

$produto2 = new Produto("Produto B", 20.0, 3);
$pedido1->adicionarProduto($produto2, 1);

// Exibir informações do pedido
echo "ID do pedido: " . $pedido1->getId() . "\n";
echo "Cliente do pedido: " . $pedido1->getCliente()->getNome() . "\n";
echo "Produtos no pedido:\n";
foreach ($pedido1->getProdutos() as $item) {
    echo " - Produto: " . $item['produto']->getNome() . ", Quantidade: " . $item['quantidade'] . "\n";
}
?>

