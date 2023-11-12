<?php
require_once __DIR__ . "/../vendor/autoload.php";

$pdo = include __DIR__ . "/../src/Config/pdo.php";
$produtoDAO = new Barbaraviana\Comex\classes\DAO\ProdutoDAO($pdo);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];

    try {
        $novoProduto = new Barbaraviana\Comex\classes\pagamento\Produto($nome, $preco, $quantidade);
        $produtoDAO->salvar($novoProduto);
        echo "Produto cadastrado com sucesso!\n";
    } catch (\Exception $e) {
        echo "Erro ao cadastrar produto: " . $e->getMessage() . "\n";
    }
}
?>
    <button onclick="window.location.href='index.html'">Voltar à Página Inicial</button>
