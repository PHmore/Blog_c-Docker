<?php
include_once "../model/data.php";
session_start();

if (isset($_SESSION['username'])) {
    $usuarioLogado = true;
} else {
    $usuarioLogado = false;
    $_SESSION['id'] = null;
} 

$data = new Data();
$data_art = $data->dados_art($_SESSION['id'], $_GET['id_art']);
$id_art = $_GET['id_art'];
$status = $data_art['status'];
$texto = $data_art['texto'];
$titulo = $data_art['titulo'];
$art_my = $data_art['meu'];

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
    <button onclick="location.href='/view/homepage.php'">Voltar</button>
</head>

<?php
if (isset($_SESSION['aviso'])) {
    echo '<div class="aviso">' . $_SESSION['aviso'] . '</div>';
    unset($_SESSION['aviso']);
}
?>

<body>

<?php
if ($art_my) {
    echo "<form action='Criar_artigo.php' method='post'>
            <input type='hidden' name='id_art' id='id_art' value= '" . $id_art . "'>
            <input type='hidden' name='titulo' id='titulo' value= '" . $titulo . "'>
            <input type='hidden' name='texto' id='texto' value= '" . $texto . "'>
            <button type='submit' name='editar'>Editar</button>
        </form>";
}
?>

<table border="1" width="80%" align="center">
    <tr>
        <td colspan="2">
            <?php echo "<center> ($status)</center> <center>Título: " . htmlspecialchars($titulo) . "</center>"; ?> 
        <br></td>
    </tr>
    <tr>
        <td colspan="2"><br>
            <div style="height: 500px; overflow-y: scroll;">
                <?php echo nl2br(htmlspecialchars($texto)); ?>
            </div>
        </td>
    </tr>
</table>

<center><h4>COMENTÁRIOS</h4></center>

<?php
if (!$usuarioLogado) {
    echo '<form action="login.php" method="post">';
    echo '<center>OBS: Somente usuários logados podem comentar.  ';
    echo '<input type="submit" value="Fazer login"></center>';
    echo '</form>';
} else {
    $comentario_user = $data->coment_user($_SESSION['id'], $_GET['id_art']);
    if (isset($comentario_user['conteudo'])) {
        $coment = $comentario_user['conteudo'];
        $comented = true;
    } else {
        $coment = "";
        $comented = false;
    }

    if (!$art_my) {
        echo "<center>OBS: só é possível fazer 1 comentário</center>
                <form action='../control/controlComents.php' method='post'>
                    <table align='center' cellpadding='0'>
                        <tr>
                            <td>
                                <textarea id='comentario' name='comentario' cols='80' rows='5' required>" . $coment . "</textarea><br><br>
                                <input type='hidden' name='id_art' value= '" . $id_art . "'>
                                <input type='hidden' name='comented' value= '" . $comented . "'>
                                <input type='submit' name='acao' value='Salvar Comentário'>";
        if ($comented)
            echo "<input type='submit' name='acao' value='Excluir Comentário'>";
        echo "
                            </td>
                        </tr>
                    </table>
                </form>";
    } else {
        echo "<center>OBS: Não é possível comentar o próprio artigo</center>";
    }
}
?>

<br>

<table border="1" width="80%" align="center">
    <tr>
        <th>Comentário</th>
        <th>Data</th>
    </tr>

    <?php foreach ($comentariosPagina as $comentario) : ?>
        <tr>
            <td>
                <div style="height: 50px; overflow-y: scroll;">
                    <?php echo "<b>" . $comentario['autor'] . "</b>: " . $comentario['conteudo']; ?>
                </div>
            </td>
            <td align="center"><?php echo $comentario['data_criado']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<table border="1" width="80%" align="center">
    <?php
    echo "<tr><td colspan='4' align='center'>";
    for ($i = 1; $i <= $totalPaginas; $i++) {
        echo "<a href='?pagina=" . $i . "'>" . $i . "</a> ";
    }
    echo "</td></tr>";
    ?>
</table>

</body>
</html>