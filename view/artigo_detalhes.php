<?php
include_once "../model/data.php";
session_start();

//Remover uso do data e usa-lo em um control 
//Mostrar comentário bem como a opção de criar comentários para visitante
//E adicionar botão para editar
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização do Artigo</title>
    <button onclick="location.href='/view/meus_artigos.php'">Voltar</button>
</head>
<body>

    <?php
        $data = new Data();
        $data_art = $data->dados_art($_GET['id_art']);
        $status = $data_art['status'];
        $texto = $data_art['texto'];
        $titulo = $data_art['titulo'];
    ?>

    <table border="1" width="80%" align="center">
        <tr>
            <td colspan="2">
                <?php echo " <center> ($status)</center> Titulo: $titulo "; ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <?php echo $texto; ?>
            </td>
        </tr>
    </table>

</body>
</html>
