<?php
//Entender melhor o uso do control no nosso código
//Talvez usaremos ele para gerenciar melhor como as páginas serão exibidas entre os visitantes e os usuários

require_once "../model/data.php";

    $data = new Data();
    $data->login($_POST['username'], $_POST['senha']);


function carregar_arts ($inicio,$limite_pag)
{

}
?>