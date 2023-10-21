<?php
include_once "../model/data.php";
session_start();

$data = new Data();
$data_art = $data->dados_art($_GET['id_art']);
$status = $data_art['status'];
$texto = $data_art['texto'];
$titulo = $data_art['titulo'];

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

<form action="Criar_artigo.php" method="post">
    <input type="hidden" name="titulo" id="titulo" value="<?php echo $titulo; ?>">
    <input type="hidden" name="texto" id="texto" value="<?php echo $texto; ?>">
    <button type="submit" name="editar">Editar</button>
</form>

<table border="1" width="80%" align="center">
    <tr>
        <td colspan="2">
            <?php echo "<center> ($status)</center> Título: " . htmlspecialchars($titulo); ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <?php echo nl2br(htmlspecialchars($texto)); ?>
        </td>
    </tr>
</table>

</body>
</html>
