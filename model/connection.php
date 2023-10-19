<?php
//These are the defined authentication environment in the db service

// The MySQL service named in the docker-compose.yml.

class connection_db
{
    public static function Connect(){
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