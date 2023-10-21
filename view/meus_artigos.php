<?php
include_once "../model/data.php";
session_start();
//Página de artigos pessoais 
//onde o usuário pode criar excluir e apagar seus artigos
//Ver quem e o que foi comentado sobre ele de forma páginada

//Colocar o não há artigos dentro da tabela

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Artigos</title>
</head>
<?php
    if (isset($_SESSION['aviso'])) {
        echo '<div class="aviso">' . $_SESSION['aviso'] . '</div>';
        unset($_SESSION['aviso']);
    }
    ?>
<body>

    <!-- Botão de Criar Artigo -->
    <div>
        <a href="Criar_artigo.php"><button>Criar Artigo</button></a>
    </div>

    <!-- Tabela de Artigos -->
    <table border="1" width="80%" align="center">
        <tr>
            <th>Título do Artigo</th>
            <th>Status</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>

        <?php
            // Supondo que $artigos seja um array com os dados dos artigos
            $data = new Data();
            $artigos = $data->MeusArts($_SESSION['id']);
            if($artigos == NULL)
            echo 'não há artigos';
            else{
            // Define quantos artigos serão exibidos por página
$artigosPorPagina = 10;

// Obtém o número total de páginas
$totalPaginas = ceil(count($artigos) / $artigosPorPagina);

// Obtém o número da página atual (por padrão, exibe a primeira página)
$paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Obtém os artigos a serem exibidos nesta página
$artigosPagina = array_slice($artigos, ($paginaAtual - 1) * $artigosPorPagina, $artigosPorPagina);

foreach ($artigosPagina as $artigo) {
    echo "<tr>";
    echo "<td><center><a href='artigo_detalhes.php?id_art=".$artigo['id_art']."'>".$artigo['titulo']."</a></center></td>";
    echo "<td><center>".$artigo['status']."</center></td>";
    echo "<td><center>".$artigo['data_atualizacao']."</center></td>"; 
    echo "<td>
            <center>
                <form method='get' action='/control/controlDetArt.php'>
                    <input type='hidden' name='id_art' value='" . $artigo['id_art'] . "'>
                    <input type='submit' value='Editar' name='acao'>
                    <input type='submit' value='Excluir' name='acao'>
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

    <form action="homepage.php" method="post">
        <input type="submit" value="voltar"></form>
</body>
</body>
</html>
