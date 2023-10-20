<?php
require_once "../model/data.php";
require_once "../Enviar_email/mensagem_email.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $data = new Data();
    $send_email = new Email();
    $email = $data->busca_username($username);
    if($email == null)
    {

        session_start();

        if ($_SERVER['HTTP_REFERER']) {
            $_SESSION['aviso'] = "Usuário não encontrado!";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            echo "Não foi possível determinar a página anterior.";
        }

    }
    //echo "em breve chamaremos função de enviar email para o email " . $email ."Do usuário: ". $username;
    
    //implementar criação de token automática
    //e após o usuário sair, confirmar ou voltar o token é apagado do banco de dados
    
    //função que cria uma string aleatória
    $token = bin2hex(random_bytes(4));
    
    //dps restringir para se enviar o email
    if($send_email->send_email($token,$email,$username))
    {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['token'] = $token;
        $_SESSION['email'] = $email;
        header("Location: ../view/redefinir_senha_page.php");
        exit();
    }
    
}

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    session_start();
    $codigo = $_GET['codigo'];
    //echo $codigo . "Token :";
    //echo $_SESSION['token'];
    if($codigo == $_SESSION['token'])
    {
        header("Location: ../view/processo_rec_senha.php");
        exit();
    }

    //Remover dps esse token só está para testes sem ter que ficar enviando email
    $aviso = $_SESSION['token'];
    
    if ($_SERVER['HTTP_REFERER']) {
        $_SESSION['aviso'] = $aviso;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }else {
        echo "Não foi possível determinar a página anterior.";
    }
}
?>
