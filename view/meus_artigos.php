<?php

//Página de artigos pessoais 
//onde o usuário pode criar excluir e apagar seus artigos
//Ver quem e o que foi comentado sobre ele de forma páginada

echo "Em breve mostraremos seus artigos feitos e opção para criar um novo";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Artigos</title>
</head>
<body>

    <!-- Botão de Criar Artigo -->
    <div>
        <a href="criar_artigo.php"><button>Criar Artigo</button></a>
    </div>

    <!-- Tabela de Artigos -->
    <table border="1" width="80%" align="center">
        <tr>
            <th>Título do Artigo</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>

        <?php
            // Supondo que $artigos seja um array com os dados dos artigos
            foreach ($artigos as $artigo) {
                echo "<tr>";
                echo "<td><a href='ver_artigo.php?id=".$artigo['id']."'>".$artigo['titulo']."</a></td>";
                echo "<td>".$artigo['status']."</td>";
                echo "<td>
                        <a href='editar_artigo.php?id=".$artigo['id']."'>Editar</a> |
                        <a href='excluir_artigo.php?id=".$artigo['id']."'>Excluir</a>
                      </td>";
                echo "</tr>";
            }
        ?>

    </table>

</body>
</html>
