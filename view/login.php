<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php
    if (isset($_SESSION['aviso'])) {
        echo '<div class="aviso">' . $_SESSION['aviso'] . '</div>';
        unset($_SESSION['aviso']); // Remove o aviso da sessão após exibição
    }
    ?>
</head>
<body>
    <h1>Login</h1>
    
    <form action="../control/controlLogin.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        
        <input type="submit" value="Confirmar">
        <br><br>
    </form>

    <form action="esqueci_senha.php" method="post">
        <input type="submit" value="Esqueci a Senha">
    </form>
    <br>
    <form action="./modo_visitante.php" method="post">
        <input type="submit" value="Modo Visitante">
    </form>

    <form action="criar_conta.php" method="post">
        <input type="submit" value="Criar Conta">
    </form>

</body>
</html>
