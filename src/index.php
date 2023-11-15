<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <header>
        <h1 class="titulo">Bem-vindo à Papelaria Criativa</h1>
    </header>

    <main class="apresentacao">
        <section class="imagem">
            <img class="imagem_de_apresentacao" src="imagens/capa.jpg" alt="Papelaria">
        </section>

        <section class="conteudo">
            <div class="login">
                <form action="login.php" method="post">
                <label for="username">Usuário:</label>
                <input type="text" name="username" required>
                <br>
                <label for="password">Senha:</label>
                <input type="password" name="password" required>
                <br>
                <button type="submit">Cadastre-se</button>
                <button type="submit">Acesse</button>
                <button type="submit">Esqueceu a senha</button>
            </form>
            </div>
            <div class="botoes">
                <button onclick="window.location.href='form_cadastro_produto.html'" class="blue">Cadastrar Produto</button>
                <button onclick="window.location.href='form_cadastro_cliente.html'" class="pink">Cadastrar Cliente</button>
                <button onclick="window.location.href='lista_produtos.php'" class="yellow">Catálogo de Produtos</button>
            </div>
        </section>
    </main>
</body>
</html>
