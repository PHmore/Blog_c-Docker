<?php
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
    } else {
        echo '<form action="login.php" method="post">';
        echo 'Bem-vindo, ' . $_SESSION['username'] . '! <br>';
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
        $data = new Data();
        $artigos = $data->HomeArts();

        if ($artigos == NULL)
            echo "<tr><td colspan='4'><center>Não há artigos disponíveis.</center></td></tr>";
        else {
            $artigosPorPagina = 19;
            $totalPaginas = ceil(count($artigos) / $artigosPorPagina);
            $paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            $artigosPagina = array_slice($artigos, ($paginaAtual - 1) * $artigosPorPagina, $artigosPorPagina);

            foreach ($artigosPagina as $artigo) {
                echo "<tr>";
                echo "<td><center><a href='artigo_detalhes.php?id_art=" . $artigo['id_art'] . "'>" . $artigo['titulo'] . "</a></center></td>";
                echo "<td><center>" . $artigo['username'] . "</center></td>";
                echo "<td><center>" . $artigo['data_atualizacao'] . "</center></td>";
                echo "<td>
                        <center>
                            <form method='post' action='/control/controlDetArt.php'>
                                <input type='hidden' name='id_art' value='" . $artigo['id_art'] . "'>
                                <input type='hidden' name='titulo' value='" . $artigo['titulo'] . "'>
                                <input type='hidden' name='texto' value='" . $artigo['texto'] . "'>
                                " . $artigo['qnt_coments'] . "
                            </form>
                        </center>
                      </td>";
                echo "</tr>";
            }

            echo "<tr><td colspan='4' align='center'>";
            for ($i = 1; $i <= $totalPaginas; $i++) {
                echo "<a href='?pagina=" . $i . "'>" . $i . "</a> ";
            }
            echo "</td></tr>";
        }
        ?>

    </table>

</body>
</html>
