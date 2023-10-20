<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização do Artigo</title>
</head>
<body>

    <?php
        // Supondo que você tenha as variáveis $titulo, $status e $texto definidas com os dados do artigo
        //Fazer busca do artigo no banco de dados
    ?>

    <table border="1" width="80%" align="center">
        <tr>
            <td colspan="2">
                <?php echo "($status) $titulo"; ?>
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
