<?php
session_start();
if (isset($_SESSION['aviso'])) {
    $verificado = true;
} else {
    $verificado = false;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Email</title>
    <?php
    if (isset($_SESSION['aviso'])) {
        echo $_SESSION['aviso'];
        echo '<div class="aviso"> Codigo incorreto, tente novamente</div>';
        unset($_SESSION['aviso']);
    }
    ?>
</head>

<body>
    <h1>Confirmar Email</h1>

    <form action="../control/redefinir_senha.php" method="get">
        <label for="CODIGO">Digite o código enviado para: <?php echo $_SESSION['email'];?></label><br><br>
        <input type="text" id="codigo" name="codigo" required>
        <input type="submit" value="confirmar">
    </form>

    <form action="login.php" method="post">
        <input type="submit" value="Voltar">
    </form>
</body>

</html>
