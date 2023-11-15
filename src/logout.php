
<?php
session_start();

// Encerra a sessão e redireciona para a página de login
session_unset();
session_destroy();
header('Location: index.php');
exit();
?>
