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
    <title>Nova Senha</title>
    <?php
    if (isset($_SESSION['aviso'])) {
        echo '<div class="aviso">' . $_SESSION['aviso'] . '</div>';
        unset($_SESSION['aviso']);
    }
    ?>
</head>

<body>
    <h1>Nova senha</h1>

    <form action="../control/alterar_senha.php" method="post">
        <label for="senha">Insira a nova senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>

        <label for="senha2">Insira novamente:</label><br>
        <input type="password" id="senha2" name="senha2" required>

        <input type="submit" value="Confirmar">
        <br><br>
    </form>

    <form action="login.php" method="post"><br>
        <input type="submit" value="Cancelar">
    </form>
</body>

</html>
