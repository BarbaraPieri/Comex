<?php

use Barbaraviana\Comex\classes\DAO\ClienteDAO;
use Barbaraviana\Comex\classes\pagamento\Cliente;


require_once __DIR__ . "/../../../vendor/autoload.php";

// Inicia o PDO para SQLite
$pdo = include __DIR__ . "/../../Config/pdo.php";

// Instancia o ClienteDAO
$clienteDAO = new ClienteDAO($pdo);

// Cria um novo cliente
$novoCliente = new Cliente('Fulano de Tal', 'FdeTal@email.com', '12345678900', 'Endereço qualquer, 232');

// Salva o cliente no banco de dados
try {
    $clienteDAO->salvar($novoCliente);
    echo "Cliente salvo com sucesso!\n";
} catch (\Exception $e) {
    echo "Erro ao salvar cliente: " . $e->getMessage() . "\n";
}

// Exibe todos os clientes
var_dump($clienteDAO->buscarTodos());
?>
