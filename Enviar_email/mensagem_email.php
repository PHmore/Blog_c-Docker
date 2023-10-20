<?php
//DEVIDO A ATUALIZAÇÃO DAS POLÍTICAS DO GOOGLE
//É NECESSÁRIO ATIVAR A AUTENTICAÇÃO DE DUAS ETAPAS E A SENHA DE APP PARA FUNCIONAR

//Será implementado tokens e temporizador no banco de dados
//DELETE FROM NOME_TABELA WHERE NOME_COLUNA < DATE_SUB(NOW(), INTERVAL 1 DAY);

//A confirmação para que seja mais prático será feita por código invés de link

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class Email{
        public static function send_email($token ,$email_user,$username){
            
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'fire80485@gmail.com';                     //SMTP username
                $mail->Password   = 'qgxl wsid zlve soyh';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('fire80485@gmail.com','BLOG_ES');
                $mail->addAddress($email_user, $username);     //Add a recipient
        
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Redefinir senha : BLOG_ES';
                $mail->Body    = '

                        <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Recuperação de Senha</title>
                </head>
                <body>
                    <div>
                        <h1 align="center">Recuperação de Senha</h1>
                        <p align="center">Olá,</p>
                        <p align="center">Recebemos uma solicitação de recuperação de senha para a sua conta. Abaixo está o código de verificação:</p>
                        <div align="center"><font size="6">' . $token . '</font></div>
                        <p align="center">Por favor, utilize este código para redefinir sua senha.</p>
                    </div>
                </body>
                </html>
                ';
                $mail->AltBody = 'Código de recuperação da senha : $token';

                $mail->send();
                return true;
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            return false;
            }
}