<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    
    <form action="../control/controlLogin.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>
        
        <input type="submit" value="Confirmar">
    </form>

    <form action="./modo_visitante.php" method="post">
        <input type="submit" value="Modo Visitante">
    </form>

    <form action="esqueci_senha.php" method="post">
        <input type="submit" value="Esqueci a Senha">
    </form>

    <form action="criar_conta.php" method="post">
        <input type="submit" value="Criar Conta">
    </form>

</body>
</html>
