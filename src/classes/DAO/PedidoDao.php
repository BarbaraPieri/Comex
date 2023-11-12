<?php

namespace Barbaraviana\Comex\classes\DAO;

use Barbaraviana\Comex\classes\pagamento\Pedido;
use PDO;

class PedidoDAO
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function salvar(Pedido $pedido)
    {
        $sql = "INSERT INTO pedidos (cliente_id, produto_id, quantidade) VALUES (:clienteId, :produtoId, :quantidade)";
        $stmt = $this->pdo->prepare($sql);

       
        $clienteId = $pedido->getCliente()->getId();  
        $produtoId = $pedido->getProdutos()[0]['produto']->getId();  
        $quantidade = $pedido->getProdutos()[0]['quantidade']; 

        $stmt->bindValue(':clienteId', $clienteId);
        $stmt->bindValue(':produtoId', $produtoId);
        $stmt->bindValue(':quantidade', $quantidade);

        $stmt->execute();
    }
}
