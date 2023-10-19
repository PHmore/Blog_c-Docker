<?php
require_once "../model/data.php";

    $data = new Data();
    $data->cadastro($_POST['username'], $_POST['senha'], $_POST['email']);
?>