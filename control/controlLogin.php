<?php
// Entender melhor o uso do control no nosso código
// Talvez usaremos ele para gerenciar melhor como as páginas serão exibidas entre os visitantes e os usuários

require_once "../model/data.php";
session_start();

$data = new Data();
if ($data->login($_POST['username'], $_POST['senha'])) {
    $_SESSION['username'] = $_POST['username'];
    header("location: ../view/homepage.php");
    exit();
} else {
    if ($_SERVER['HTTP_REFERER']) {
        $_SESSION['aviso'] = "Credenciais erradas ou usuário inexistente!";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Não foi possível determinar a página anterior.";
    }
}
?>
