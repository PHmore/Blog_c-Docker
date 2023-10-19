<?php
session_start();
$_SESSION["username"] = NULL;
header("Location: homepage.php"); // Redireciona para a página após o login
exit();
?>
