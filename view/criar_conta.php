<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastro</h1>
    
    <form action="../control/controlCadastro.php" method="post">
        <label for="username">username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>
        
        <label for="email">Email (opcional):</label>
        <input type="email" id="email" name="email" pattern="[a-zA-Z0-9._%+-]+@gmail\.com$" title="Por favor, use um email do Gmail"><br><br>
        
        <input type="submit" value="Confirmar">
    </form>

    <form action="index.php" method="post">
        <input type="submit" value="Voltar">
    </form>
</body>
</html>
