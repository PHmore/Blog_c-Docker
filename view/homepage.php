<?php
session_start();
if (isset($_SESSION['username'])) {
    $usuarioLogado = true;
} else {
    $usuarioLogado = false;
} 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
</head>
<body>

<?php
if (!$usuarioLogado) {
        
        echo '<form action="login.php" method="post">';
        echo 'Você não está logado.  ';
        echo '<input type="submit" value="Fazer login">';
        echo '</form>';
    }
    else
    {
        echo '<form action="login.php" method="post">';
        echo 'Bem-vindo, ' . $_SESSION['username'] . '! com id = ' . $_SESSION['id'] . '<br>';
        echo '<input type="submit" value="Sair">';
        echo '</form>';
        echo '<form action="meus_artigos.php" method="post">';
        echo '<br>';
        echo '<input type="submit" value="Meus artigos">';
        echo '</form>';
    }
?>

    <table align="center">
    <tr>
        <td>
            <!-- Tabela Paginada -->
            

    <!-- Tabela Paginada -->
    <?php
    // Simulação de dados
    $dados = array(
        array('Nome 1', 'Email 1'),
        array('Nome 2', 'Email 2'),
        array('Nome 3', 'Email 3'),
        // Adicione mais dados conforme necessário
    );

    // Número de registros por página
    $registrosPorPagina = 5;

    // Página atual (inicializada como 1)
    $paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

    // Calcula o índice de início da página
    $indiceInicio = ($paginaAtual - 1) * $registrosPorPagina;

    // Calcula o índice de fim da página
    $indiceFim = $indiceInicio + $registrosPorPagina;

    // Exibe a tabela
    echo '<table border="1">';
    echo '<tr><th>Autor</th><th>Título</th></tr>';

    for ($i = $indiceInicio; $i < $indiceFim && $i < count($dados); $i++) {
        echo '<tr>';
        foreach ($dados[$i] as $valor) {
            echo '<td>' . $valor . '</td>';
        }
        echo '</tr>';
    }

    echo '</table>';
    ?>
        </td>
    </tr>
    <tr>
        <td align="center">
            <!-- Paginação -->
            <?php
    // Calcula o número total de páginas
    $numPaginas = ceil(count($dados) / $registrosPorPagina);

    // Exibe os links de paginação
    for ($i = 1; $i <= $numPaginas; $i++) {
        echo '<a href="?pagina=' . $i . '">' . $i . '</a> ';
    }
    ?>
        </td>
    </tr>
</table>

</body>
</html>




