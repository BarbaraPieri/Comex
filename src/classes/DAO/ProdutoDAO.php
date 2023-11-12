<?php

namespace Barbaraviana\Comex\classes\DAO;

use Barbaraviana\Comex\classes\pagamento\Produto;
use PDO;

class ProdutoDAO
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function salvar(Produto $produto)
    {
        try {

            $sql = "INSERT INTO produtos (nome, preco, quantidade) VALUES (?, ?, ?)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $produto->getNome());
            $stmt->bindValue(2, $produto->getPreco());
            $stmt->bindValue(3, $produto->getQuantidadeEstoque());
            $stmt->execute();
            
        } catch (\PDOException $e) {
            // Trate o erro conforme necessário
            echo "Erro ao salvar produto: " . $e->getMessage();
        }
    }
}
