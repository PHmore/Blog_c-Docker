<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar senha</title>
    <?php
    if (isset($_SESSION['aviso'])) {
        echo '<div class="aviso">' . $_SESSION['aviso'] . '</div>';
        unset($_SESSION['aviso']); // Remove o aviso da sessão após exibição
    }
    ?>
</head>

<body>
    <h1>Recuperar senha</h1>

    <form action="../control/redefinir_senha.php" method="post">
        <a>Por favor insira o seu username</a><br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <input type="submit" value="Confirmar">
    </form>

    <form action="login.php" method="post">
        <input type="submit" value="voltar">
    </form>

</body>

</html>
