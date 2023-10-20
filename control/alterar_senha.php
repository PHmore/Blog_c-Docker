<?php

require_once "../model/data.php";
session_start();

    if($_POST['senha'] == $_POST['senha2'])
    {
        if (strpos($_POST['senha'], ' ') !== false) {
            $aux = "Os dados não podem conter espaços vazios";
            }else{
            

        $data = new Data();
        if($data->alt_senha($_SESSION['username'], $_POST['senha'])) 
        {
        header("location: ../view/login.php");
        exit();
        }
        else{
            echo "Ocorreu algum erro ao alterar a senha";
        }
    }
}
    else{
            $aux = "As senhas não coicidem, tente novamente";
       
    }
 if ($_SERVER['HTTP_REFERER']) {
            $_SESSION['aviso'] = $aux;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            echo "Não foi possível determinar a página anterior.";
        }
?>