<?php

$databaseFile  = __DIR__ ."/../../db.sqlite";


$pdo = new \PDO('sqlite:' . $databaseFile);

/**
 * Cliente:
 * ID
 * nome
 * email
 * celular
 * endereço
 */

 $sql = "CREATE TABLE  IF NOT EXISTS clientes (
    id INTEGER PRIMARY KEY,
    nome TEXT,
    email TEXT,
    celular TEXT,
    endereço TEXT
    );";

$pdo->exec($sql);
/**
 * Produto:
 * ID
 * nome
 * preço
 * Quantidade em estoque

 */

 $sql = "CREATE TABLE  IF NOT EXISTS Produtos (
    id INTEGER PRIMARY KEY,
    nome TEXT,
    Preço REAL,
    Quantidade INTEGER
    );";

$pdo->exec($sql);

/**
 * Pedido:
 * ID
 * cliente - chave estrangeira
 * produto - chave estrangeira
 */

$sql = "CREATE TABLE  IF NOT EXISTS Pedidos (
    id INTEGER PRIMARY KEY,
    cliente_id INTEGER,
    produto_id REAL,
    Quantidade INTEGER,

    FOREIGN KEY (cliente_id) REFERENCES clientes(id) 
    FOREIGN KEY (produto_id) REFERENCES Produtos(id)
    );";

$pdo->exec($sql);
