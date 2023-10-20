<?php

class connection
{
    public static function Connect_db(){
        $host = "database_mysql";
        $dbname = "BLOG_DB";//Insira aqui nome do banco de dados 
        $user = "PHmore"; //Isira aqui seu nome de usuário;
        $password = '1919'; //Insira aqui sua senha;
        $conn = mysqli_connect($host, $user, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }else{
                return $conn;
            }
    }
}

?>