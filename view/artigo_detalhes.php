<?php
include_once "../model/data.php";
session_start();

$data = new Data();
$data_art = $data->dados_art($_GET['id_art']);
$id_art = $_GET['id_art'];
$status = $data_art['status'];
$texto = $data_art['texto'];
$titulo = $data_art['titulo'];

// Simulemos os comentários
$comentarios = $data->coments_art($_GET['id_art']);

$comentariosPorPagina = 10;
$totalComentarios = count($comentarios);
$totalPaginas = ceil($totalComentarios / $comentariosPorPagina);

$paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$comentariosPagina = array_slice($comentarios, ($paginaAtual - 1) * $comentariosPorPagina, $comentariosPorPagina);

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
<input type="hidden" name="id_art" id="id_art" value="<?php echo $id_art; ?>">
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
            <div style="height: 500px; overflow-y: scroll;">
                <?php echo nl2br(htmlspecialchars($texto)); ?>
            </div>
        </td>
    </tr>
</table>

<center><h4>COMENTÁRIOS</h4></center>

       
<table border="1" width="80%" align="center">
<tr>
            <th>Comentário</th>
            <th>Data</th>
        </tr>
    <?php foreach ($comentariosPagina as $comentario) : ?>
        <tr>
            <td>
            <div style="height: 50px; overflow-y: scroll;">
                <?php echo "<b>".$comentario['autor']."</b>: ".$comentario['conteudo']; ?>
            </div></td>
            <td align="center"><?php echo $comentario['data_criado']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>


<table border="1" width="80%" align="center">
            <?php
            echo "<tr><td colspan='4' align='center'>";
for ($i = 1; $i <= $totalPaginas; $i++) {
    echo "<a href='?pagina=".$i."'>".$i."</a> ";
}
echo "</td></tr>";
            ?>
</table>

</body>
</html>
