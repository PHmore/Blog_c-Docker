<?php
include_once "../model/data.php";

session_start();
$data = new Data();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if($_POST['acao'] == "Salvar"){

$_SESSION['aviso'] = $data->upar_art($_POST['titulo'],$_POST['texto'],$_SESSION['id'],"Rascunho");

}else if($_POST['acao'] == "Publicar")
{
    $_SESSION['aviso'] = $data->upar_art($_POST['titulo'],$_POST['texto'],$_SESSION['id'],"Publicado");

}else if($_POST['acao'] == "Salvar edição"){

    $_SESSION['aviso'] = "Edição será salva";//$data->upar_art($_POST['titulo'],$_POST['texto'],$_SESSION['id'],"Rascunho");
    
    }else if($_POST['acao'] == "Publicar edição")
    {
        $_SESSION['aviso'] = "Edição será publicada";//$data->upar_art($_POST['titulo'],$_POST['texto'],$_SESSION['id'],"Publicado");
    
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    if ($_GET['acao']=="Excluir"){

        $_SESSION['aviso'] = $data->excluir_art($_GET['id_art']);

        }
}

if ($_SERVER['HTTP_REFERER']) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
} else {
    echo "Não foi possível determinar a página anterior.";
}

?>