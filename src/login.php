<?php
session_start();

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica o nome de usuário e senha (substitua por um banco de dados real)
    $username = 'user';
    $passwordHash = password_hash('password', PASSWORD_DEFAULT);

    if ($_POST['username'] === $username && password_verify($_POST['password'], $passwordHash)) {
        // Autenticação bem-sucedida, salva informações na sessão
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;

        header('Location: comprar.php'); // Redireciona para a página de compra
        exit();
    } else {
        echo '<p>Usuário ou senha inválidos.</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <p>Erro no login. <a href="index.php">Tente novamente</a></p>
</body>
</html>
