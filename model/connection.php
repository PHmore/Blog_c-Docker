<?php

class Connection
{
    public static function Connect_db()
    {
        $host = "database_mysql";
        $dbname = "BLOG_DB"; // Insira aqui o nome do banco de dados 
        $user = "PHmore"; // Insira aqui seu nome de usuário;
        $password = '1919'; // Insira aqui sua senha;

        $conn = mysqli_connect($host, $user, $password, $dbname);

        // Verificar conexão
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            return $conn;
        }
    }
}

?>
