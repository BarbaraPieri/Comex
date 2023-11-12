<?php

namespace Barbaraviana\Comex\classes\DAO;

use Barbaraviana\Comex\classes\pagamento\Cliente;

use PDO;

class ClienteDAO
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function salvar(Cliente $cliente)
    {
        try {
            $sql = "INSERT INTO clientes (nome, email, celular, endereço) VALUES (?, ?, ?, ?)";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $cliente->getNome());
            $stmt->bindValue(2, $cliente->getEmail());
            $stmt->bindValue(3, $cliente->getCelular());
            $stmt->bindValue(4, $cliente->getEndereco());
            $stmt->execute();

           
        } catch (\PDOException $e) {
            echo "Erro ao salvar o cliente: " . $e->getMessage();
        }
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM clientes WHERE id = ?";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna os dados do cliente como um array associativo
    }

    public function buscarTodos()
    {
        $sql = "SELECT * FROM clientes";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos os clientes como um array associativo
    }
}
