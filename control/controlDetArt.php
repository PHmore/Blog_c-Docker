<?php
include_once "../model/data.php";

session_start();
$data = new Data();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_SESSION['texto'] = $_POST['texto'];

if($_POST['acao'] == "Salvar"){

$_SESSION['aviso'] = $data->upar_art($_POST['titulo'],$_POST['texto'],$_SESSION['id'],"Rascunho");

}else if($_POST['acao'] == "Publicar")
{
    $_SESSION['aviso'] = $data->upar_art($_POST['titulo'],$_POST['texto'],$_SESSION['id'],"Publicado");

}else if($_POST['acao'] == "Salvar edição"){

    $_SESSION['aviso'] = $data->upar_art_edit($_POST['titulo'],$_POST['texto'],$_POST['id_art'],"Rascunho");
    
    }else if($_POST['acao'] == "Publicar edição")
    {
        $_SESSION['aviso'] = $data->upar_art_edit($_POST['titulo'],$_POST['texto'],$_POST['id_art'],"Publicado");
    
    } else if ($_POST['acao']=="Excluir"){

        $_SESSION['aviso'] = $data->excluir_art($_POST['id_art']);
    }
}

if ($_SERVER['HTTP_REFERER']) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
} else {
    echo "Não foi possível determinar a página anterior.";
}

?>