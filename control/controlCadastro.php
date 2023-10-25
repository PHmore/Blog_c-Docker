<?php
require_once "../model/data.php";
// Se usar o session_reset aqui ele deixa sem sessão
session_start();

$senha = $_POST['senha'];
$username = $_POST['username'];
$email = $_POST['email'];

if (strpos($username, ' ') !== false || strpos($email, ' ') !== false || strpos($senha, ' ') !== false) {
    $aux = "Os dados não podem conter espaços vazios";
} else {
    $data = new Data();
    $aux = $data->cadastro($username, $senha, $email);
    if ($aux == 1) {
        $_SESSION['username'] = $_POST['username'];
        header('Location: ../view/homepage.php');
        // Exit() é necessário para terminar a execução do PHP
        exit();
    }
}

if ($_SERVER['HTTP_REFERER']) {
    $_SESSION['aviso'] = $aux;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
} else {
    echo "Não foi possível determinar a página anterior.";
}
?>
