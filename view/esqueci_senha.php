<?php
echo "Esqueci a Senha"; // Adicione a lógica de redefinição de senha aqui

$destinatario = "destinatario@gmail.com";
$assunto = "Recuperação de Senha";
$corpo = "Olá, você solicitou a recuperação de senha. Clique no link abaixo para redefinir sua senha.";

// Envia o e-mail
$resultado = mail($destinatario, $assunto, $corpo);

if ($resultado) {
    echo "E-mail enviado com sucesso!";
} else {
    echo "Erro ao enviar o e-mail.";
}

?>
