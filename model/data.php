<?php
//Esse arquivo será o responsável por conversar diretamente com o banco de dados
require_once "../model/connection.php";


class Data{

public static function login($username, $senha){
    $conn = new connection();
    $conn = $conn->Connect_db();

    $sql = "SELECT username, senha FROM users WHERE username = '$username' and senha = '$senha'";
    $result = mysqli_query($conn, $sql);
    //$result = $conn->query($sql);

    if(empty($result) || mysqli_num_rows($result) != 1){
        echo "credenciais erradas ou usuário inexistente";
        return 0;
    }
    else
    {
        //Talvez colocar tudo em control posteriomente
        session_start();
        $_SESSION['username'] = $username;
        header("location: ../view/homepage.php");

        return 1;
    }

    // Fechar a conexão
    $conn->close();
}

public static function cadastro ($username, $senha, $email)
{
    $conn = new connection();
    $conn = $conn->Connect_db();

    $sql = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        echo "nome de usuário indisponível";
        return 0;
    }

    if (empty($email)) {
        $email = "NULL";
    }

    if (empty($senha)) {
        $senha = "NULL";
    }
    
    $sql = "INSERT INTO users (id, username, senha, email) VALUES (NULL, '$username', '$senha', '$email')";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        session_start();
        $_SESSION['username'] = $username;
        header("location: ../view/homepage.php");
    }
    else
    {
        echo "Verifique se as entradas forma válidas.<br>";
        echo "Erro ao cadastrar o usuário: " . mysqli_error($conn);
    }

    $conn->close();
}

}

?>