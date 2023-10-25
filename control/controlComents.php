<?php
include_once "../model/data.php";

session_start();
$data = new Data();

$_SESSION['aviso'] = $data->edit_coment($_SESSION['id'], $_POST['id_art'], $_POST['comentario'], $_POST['acao'], $_POST['comented']);

if ($_SERVER['HTTP_REFERER']) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
} else {
    echo "Não foi possível determinar a página anterior.";
}
?>
