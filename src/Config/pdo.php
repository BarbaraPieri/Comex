<?php
$databaseFile = __DIR__ . "/../../db.sqlite";

try {
    $pdo = new PDO('sqlite:' . $databaseFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Tabela Clientes
    $sql = "CREATE TABLE IF NOT EXISTS clientes (
        id INTEGER PRIMARY KEY,
        nome TEXT,
        email TEXT,
        celular TEXT,
        endereco TEXT
    );";
    $pdo->exec($sql);

    // Tabela Produtos
    $sql = "CREATE TABLE IF NOT EXISTS produtos (
        id INTEGER PRIMARY KEY,
        nome TEXT,
        preco REAL,
        quantidade INTEGER 
    );";
    $pdo->exec($sql);

    // Tabela Pedidos
    $sql = "CREATE TABLE IF NOT EXISTS pedidos (
        id INTEGER PRIMARY KEY,
        cliente_id INTEGER,
        produto_id INTEGER,
        quantidade INTEGER,
        FOREIGN KEY (cliente_id) REFERENCES clientes(id),
        FOREIGN KEY (produto_id) REFERENCES produtos(id) 
    );";
    $pdo->exec($sql);

} catch (PDOException $e) {
    echo 'Erro de conexão: ' . $e->getMessage();
    die();
}


return $pdo;