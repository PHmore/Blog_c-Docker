<?php
session_start();
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
<form method = "post" >
    <table align="center" cellpadding="10">
        <tr>
            <td colspan="2" align="center">
                <h1>Criar Artigo</h1>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <label for="titulo">Título do Artigo:</label><br>
                <input type="text" id="titulo" name="titulo" size="100" required><br><br> <!-- Aumentei o tamanho para 70 -->
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <label for="texto">Conteúdo do Artigo:</label><br>
                <textarea id="texto" name="texto" cols="120" rows="30" required></textarea><br><br> <!-- Aumentei o tamanho para 70 colunas e 15 linhas -->
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <button onclick="location.href='/view/meus_artigos.php'">Voltar</button>&emsp;
                <input type="submit" value="Salvar" name="acao" formaction="/control/controlDetArt.php">
                <input type="submit" value="Publicar" name="acao" formaction="/control/controlDetArt.php">
            </td>
        </tr>
    </table>
    </form>
</body>
</html>
