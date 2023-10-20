<?php

//Chamada do php mailer que está na pasta src
require_once('../src/PHPMailer.php');
require_once('../src/SMTP.php');
require_once('../src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\PSMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//These are the defined authentication environment in the db service

// The MySQL service named in the docker-compose.yml.

class connection
{
    public static function Connect_db(){
        $host = "database_mysql";
        $dbname = "BLOG_DB";//Insira aqui nome do banco de dados 
        $user = "PHmore"; //Isira aqui seu nome de usuário;
        $password = '1919'; //Insira aqui sua senha;
        $conn = mysqli_connect($host, $user, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }else{
                return $conn;
            }
    }

    public static function Connect_gmail()
    {
    require_once('class.phpmailer.php');

    $mailer = new PHPMailer();
    $mailer->IsSMTP();
    $mailer->SMTPDebug = 1;
    $mailer->Port = 587; //Indica a porta de conexão 
    $mailer->Host = 'smtplw.com.br';//Endereço do Host do SMTP 
    $mailer->SMTPAuth = true; //define se haverá ou não autenticação 
    $mailer->Username = 'smtplocaweb'; //Login de autenticação do SMTP
    $mailer->Password = 'Gwb9etA323'; //Senha de autenticação do SMTP
    $mailer->FromName = 'Bart S. Locaweb'; //Nome que será exibido
    $mailer->From = 'remetente@email.com.br'; //Obrigatório ser a mesma caixa postal configurada no remetente do SMTP
    $mailer->AddAddress('destinatario@email.com','Nome do 
    destinatário');
    //Destinatários
    $mailer->Subject = 'Teste enviado através do PHP Mailer 
    SMTPLW';
    $mailer->Body = 'Este é um teste realizado com o PHP Mailer 
    SMTPLW';
    if(!$mailer->Send())
    {
    echo "Message was not sent";
    echo "Mailer Error: " . $mailer->ErrorInfo; exit; }
    print "E-mail enviado!";

    }

    public static function Connect_gmail2()
    {
        //true habilita o modo debug
        $mail = new PHPMailer(true);

        try{
            //aqui é feita a configuração do email que enviará os links
            $mail->Debugoutput;
            $mail->isSMTP();
            $mail->Host = 'smtp@gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'fire80485@gmail.com';
            $mail->Password = 'freefire4';
            $mail->Port = 587;
            
            //teste
            $mail->setFrom('fire80485@gmail.com');
            
            //destinatários
            $mail->addAddress('cs573104@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = "Assunto é esse mesmo";
            $mail->Body = "Aqui o corpo o texto e a seguir uma tag html então toma <strong>HTML</strong>";

        }catch (Exception $e){
            echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
        }
    }

}

?>