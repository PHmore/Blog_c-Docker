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
    <title>Cadastro</title>
    <?php
    if (isset($_SESSION['aviso'])) {
        echo '<div class="aviso">' . $_SESSION['aviso'] . '</div>';
        unset($_SESSION['aviso']);
    }
    ?>
</head>
<body>
    <h1>Cadastro</h1>
    <form action="../control/controlCadastro.php" method="post">
        <label for="username">username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" pattern="[a-zA-Z0-9._%+-]+@gmail\.com$" title="Por favor, use um email do Gmail" require><br><br>
        
        <input type="submit" value="Confirmar">
    </form>

    <form action="login.php" method="post">
        <input type="submit" value="Voltar">
    </form>
</body>
</html>
