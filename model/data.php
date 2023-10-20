<?php
//Esse arquivo será o responsável por conversar diretamente com o banco de dados
require_once "../model/connection.php";

class Data{

public static function login($username, $senha){
    $conn = new connection();
    $conn = $conn->Connect_db();

    $sql = "SELECT id, username, senha FROM users WHERE username = '$username' and senha = '$senha'";
    $result = mysqli_query($conn, $sql);
    //$result = $conn->query($sql);

    if(empty($result) || mysqli_num_rows($result) != 1){
        return null;
    }
    else
    {
        
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        return true;
    }

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
        return "username indisponível";
    }
    
    $sql = "INSERT INTO users (id, username, senha, email) VALUES (NULL, '$username', '$senha', '$email')";
    $result = mysqli_query($conn, $sql);


    if($result)
    {
        $sql = "SELECT id FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        return 1;
    }
    else
    {
        return "Verifique se as entradas foram válidas.<br> 
        Erro ao cadastrar o usuário: " . mysqli_error($conn);
    }

    $conn->close();
}

public static function alt_senha ($username, $nova_senha)
{
    $conn = new connection();
    $conn = $conn->Connect_db();

    $sql = "UPDATE users SET senha = '$nova_senha' WHERE users.username = '$username' ";
    $result = mysqli_query($conn, $sql);

    if ($result)
    {
        return true;
    }else{
        return mysqli_error($conn);
    }
    mysqli_free_result($result); 
}

public static function busca_username ($username)
{
    $conn = new connection();
    $conn = $conn->Connect_db();

    $sql = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    //$result = $conn->query($sql);

    if(empty($result) || mysqli_num_rows($result) != 1){
        // Não há resultados ou há mais de um resultado
        // Trate esse caso aqui se necessário
        return null;
    }

    $sql = "SELECT email FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //var_dump($row);
        $email = $row['email'];
    } else {
        $email = null; // Ou alguma outra ação caso não haja resultado
    }
    return $email;
    mysqli_free_result($result); // Libera o resultado da consulta

    // Fechar a conexão
    $conn->close();
    
}

public static function MeusArts($username)
{
    $conn = new connection();
    $conn = $conn->Connect_db();

    $id_user = $_SESSION['id'];

    $sql = "SELECT *
    FROM artigos where artigos.id_user = '$id_user';
    ";
    $result = mysqli_query($conn, $sql);
    //$result = $conn->query($sql);

    if(empty($result)){
        echo "não há artigos";
        return null;
    }

    $row = mysqli_fetch_assoc($result);
    var_dump($row);
    mysqli_free_result($result); // Libera o resultado da consulta

    // Fechar a conexão
    $conn->close();
}




//Pensar melhor se vai ser necessário guardar o token no banco de dados
public static function db_Token ($token, $status)
{
    
    if($status == true)
    {
        //guardará o token
    }else{
        //apagará o token
    }
}

public static function validar_token ($token,)
{

}

}

?>