<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $id_art = $_POST['id_art'];
} 
else
{
if(isset($_SESSION['texto'])) {
    $texto = $_SESSION['texto'];
    unset($_SESSION['texto']);
} else {
    $texto = "";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Artigo</title>
</head>

<?php
if (isset($_SESSION['aviso'])) {
    echo '<div class="aviso">' . $_SESSION['aviso'] . '</div>';
    unset($_SESSION['aviso']);
}
?>

<body>
<form method='post'>
        <table align="center" cellpadding="0">
            <tr>
                <td colspan="2" align="center">
                    <?php
                    if (isset($titulo) && isset($texto)) {
                        echo "<h1>Editar Artigo</h1>";
                    } else {
                        echo "<h1>Criar Artigo</h1>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan='2' align='center'>
                    <label for='titulo'>Título do Artigo:</label><br>
                    <input type='text' id='titulo' name='titulo' size='100' required value="<?php if(isset($titulo)) { echo $titulo; } ?>"><br><br>
                </td>
            </tr>
            <tr>
                <td colspan='2' align='center'>
                    <label for='texto'>Conteúdo do Artigo:</label><br>
                    <textarea id='texto' name='texto' cols='120' rows='28' required><?php  echo $texto;  ?></textarea><br><br>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <<a href="meus_artigos.php">Voltar</a>&emsp;
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        echo "<input type='hidden' name='id_art' value='" . $id_art . "'>
                        <input type='submit' value='Salvar edição' name='acao' formaction='/control/controlDetArt.php'>
                            <input type='submit' value='Publicar edição' name='acao' formaction='/control/controlDetArt.php'>";
                    }else{
                    
                    echo "<input type='submit' value='Salvar' name='acao' formaction='/control/controlDetArt.php'>
                         <input type='submit' value='Publicar' name='acao' formaction='/control/controlDetArt.php'>";}
                ?>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>