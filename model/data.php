<?php
//Esse arquivo será o responsável por conversar diretamente com o banco de dados
require_once "../model/connection.php";

class Data{

public static function login($username, $senha){
    $conn = new connection();
    $conn = $conn->Connect_db();

    $username= mysqli_escape_string($conn,$username);
    $senha = mysqli_escape_string($conn,$senha);

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

    $username= mysqli_escape_string($conn,$username);
    $senha = mysqli_escape_string($conn,$senha);
    $email = mysqli_escape_string($conn,$email);

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

    $username= mysqli_escape_string($conn,$username);
    $nova_senha = mysqli_escape_string($conn,$nova_senha);

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

    $username= mysqli_escape_string($conn,$username);

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

public static function MeusArts($id_user)
{
    $conn = new connection();
    $conn = $conn->Connect_db();

    $sql = "SELECT *
    FROM artigos where artigos.id_user = '$id_user';
    ";
    $result = mysqli_query($conn, $sql);
    //$result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Inicializa um array para armazenar os resultados
        $artigos = array();
        
        // Loop através das linhas da consulta
        while($row = $result->fetch_assoc()) {
            // Adiciona a linha ao array de artigos
            $artigos[] = $row;
        }
    } else {
        $artigos = array(); // Se não houver resultados, inicializa um array vazio caso não haja artigos
    }

    //$row = mysqli_fetch_assoc($result);
    //var_dump($row);
    return $artigos;
    mysqli_free_result($result); // Libera o resultado da consulta

    // Fechar a conexão
    $conn->close();
}

public static function HomeArts()
{
    $conn = new connection();
    $conn = $conn->Connect_db();

    $sql = "SELECT artigos.id_art, artigos.titulo, artigos.texto,artigos.data_atualizacao, 
    users.username,
    COALESCE(COUNT(comentarios.id_art), 0) as qnt_coments
    FROM 
        artigos 
    JOIN 
        users ON artigos.id_user = users.id
    LEFT JOIN 
        comentarios ON artigos.id_art = comentarios.id_art
    where 
        artigos.status = 'Publicado'
    GROUP BY 
        artigos.id_art
    ";
    $result = mysqli_query($conn, $sql);
    //$result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Inicializa um array para armazenar os resultados
        $artigos = array();
        
        // Loop através das linhas da consulta
        while($row = $result->fetch_assoc()) {
            // Adiciona a linha ao array de artigos
            $artigos[] = $row;
        }
    } else {
        $artigos = array(); // Se não houver resultados, inicializa um array vazio
    }

    //$row = mysqli_fetch_assoc($result);
    //var_dump($row);
    return $artigos;
    mysqli_free_result($result); // Libera o resultado da consulta

    // Fechar a conexão
    $conn->close();
}

//Passar um array de comentários
public static function dados_art($id_art)
{
    $conn = new connection();
    $conn = $conn->Connect_db();

    $sql = "SELECT artigos.status, artigos.id_art, artigos.titulo, artigos.texto,artigos.data_atualizacao
    FROM artigos 
        where artigos.id_art = '$id_art'
    ";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        $aux = "Houve algum erro em ao buscar o artigo";
    }
    return $aux;
}

public static function coments_art ($id_art)
{
    
    $conn = new connection();
    $conn = $conn->Connect_db();

    $sql = "SELECT comentarios.comentario as conteudo,
    comentarios.data_criado,
                    users.username as autor
    FROM comentarios 
    JOIN 
        users ON comentarios.id_user = users.id
    where comentarios.id_art = '$id_art'
    ";
    $result = mysqli_query($conn, $sql);
    //$result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Inicializa um array para armazenar os resultados
        $comentarios = array();
        
        // Loop através das linhas da consulta
        while($row = $result->fetch_assoc()) {
            // Adiciona a linha ao array de artigos
            $comentarios[] = $row;
        }
    } else {
        $comentarios = array(); // Se não houver resultados, inicializa um array vazio caso não haja artigos
    }

    //$row = mysqli_fetch_assoc($result);
    //var_dump($row);
    return $comentarios;
    mysqli_free_result($result); // Libera o resultado da consulta

    // Fechar a conexão
    $conn->close();
}

public static function upar_art($titulo,$texto,$id_user,$status)
{
    //Primeiro pesquisar se existe algum artigo com o titulo

    $conn = new connection();
    $conn = $conn->Connect_db();
    
    //Permite que trecho de códigos sejam armazenados
    $titulo= mysqli_escape_string($conn,$titulo);
    $status = mysqli_escape_string($conn,$status);
    $texto = mysqli_escape_string($conn,$texto);

    $sql = "SELECT *
    FROM artigos where artigos.id_user = '$id_user' AND artigos.titulo = '$titulo'
    ";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $aux = "Titulo Indisponível";
    }else{

        $sql = "INSERT INTO artigos 
        (id_art, id_user, status, titulo, texto, data_criado, data_atualizacao) 
        VALUES (NULL, '$id_user', '$status', '$titulo', '$texto', CURRENT_TIMESTAMP, NOW()) ";    
        $result = mysqli_query($conn, $sql);

        if ($result)
        {
            $aux = "Arquivado com sucesso";
        }
        else
        {
            $aux = "Ocorreu algum erro". mysqli_error($conn);
        }
    }
return $aux;
}

public static function excluir_art($id_art)
{
    $conn = new connection();
    $conn = $conn->Connect_db();

    $sql = "DELETE FROM artigos WHERE artigos.id_art = $id_art";
    $result = mysqli_query($conn, $sql);

    if ($result)
        {
            $aux = "Excluido com sucesso";
        }
        else
        {
            $aux = "Ocorreu algum erro". mysqli_error($conn);
        }
    return $aux;
}

public static function upar_art_edit($titulo,$texto,$id_art,$status)
{
    //Primeiro pesquisar se existe algum artigo com o titulo

    $conn = new connection();
    $conn = $conn->Connect_db();

    $titulo= mysqli_escape_string($conn,$titulo);
    $status = mysqli_escape_string($conn,$status);
    $texto = mysqli_escape_string($conn,$texto);


    $sql = "SELECT *
    FROM artigos where artigos.id_art != '$id_art' AND artigos.titulo = '$titulo'
    ";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $aux = "Titulo Indisponível";
    }else{

        $sql = "UPDATE artigos 
        SET artigos.status = '$status', artigos.titulo = '$titulo', artigos.texto = '$texto', 
        artigos.data_atualizacao = NOW() WHERE artigos.id_art = '$id_art' ";    
        $result = mysqli_query($conn, $sql);

        if ($result)
        {
            $aux = "Arquivado com sucesso";
        }
        else
        {
            $aux = "Ocorreu algum erro". mysqli_error($conn);
        }
    }
return $aux;
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