<?php
require_once __DIR__ . "/../vendor/autoload.php";

$pdo = include __DIR__ . "/../src/Config/pdo.php";
$clienteDAO = new Barbaraviana\Comex\classes\DAO\ClienteDAO($pdo);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $celular = $_POST["celular"];
    $endereco = $_POST["endereco"];

    try {
        $novoCliente = new Barbaraviana\Comex\classes\pagamento\Cliente($nome, $email, $celular, $endereco);
        $clienteDAO->salvar($novoCliente);
        echo "Cliente cadastrado com sucesso!\n";
    } catch (\Exception $e) {
        echo "Erro ao cadastrar cliente: " . $e->getMessage() . "\n";
    }
}
?>

    <button onclick="window.location.href='index.html'"class="blue">Voltar à Página Inicial</button>
