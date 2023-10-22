<?php
//Talvez implementar um perfil de usuário para cada user com seus artigos publicados
//e referenciar no nome do autor

include_once "../model/data.php";
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
    <?php
    if (isset($_SESSION['aviso'])) {
        echo '<div class="aviso">' . $_SESSION['aviso'] . '</div>';
        unset($_SESSION['aviso']);
    }
    ?>
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

     <!-- Tabela de Artigos -->
     <table border="1" width="80%" align="center">
        <tr>
            <th>Título do Artigo</th>
            <th>Autor</th>
            <th>Data</th>
            <th>Qntd Coments</th>
        </tr>

        <?php
            // Supondo que $artigos seja um array com os dados dos artigos
            $data = new Data();
            $artigos = $data->HomeArts();
            if($artigos == NULL)
            echo "<tr><td colspan='4'><center>Não há artigos disponíveis.</center></td></tr>";
            else{
            // Define quantos artigos serão exibidos por página
$artigosPorPagina = 19;

// Obtém o número total de páginas
$totalPaginas = ceil(count($artigos) / $artigosPorPagina);

// Obtém o número da página atual (por padrão, exibe a primeira página)
$paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Obtém os artigos a serem exibidos nesta página
$artigosPagina = array_slice($artigos, ($paginaAtual - 1) * $artigosPorPagina, $artigosPorPagina);

foreach ($artigosPagina as $artigo) {
    echo "<tr>";
    echo "<td><center><a href='artigo_detalhes.php?id_art=".$artigo['id_art']."'>".$artigo['titulo']."</a></center></td>";
    echo "<td><center>".$artigo['username']."</center></td>";
    echo "<td><center>".$artigo['data_atualizacao']."</center></td>"; 
    echo "<td>
            <center>
                <form method='post' action='/control/controlDetArt.php'>
                    <input type='hidden' name='id_art' value='" . $artigo['id_art'] . "'>
                    <input type='hidden' name='titulo' value='" . $artigo['titulo'] . "'>
                    <input type='hidden' name='texto' value='" . $artigo['texto'] . "'>
                    ".$artigo['qnt_coments']."
                </form>
            </center>
          </td>";
    echo "</tr>";
}

// Adiciona os links de navegação entre páginas
echo "<tr><td colspan='4' align='center'>";
for ($i = 1; $i <= $totalPaginas; $i++) {
    echo "<a href='?pagina=".$i."'>".$i."</a> ";
}
echo "</td></tr>";

        }
        ?>

    </table>

</body>
</body>
</html>
