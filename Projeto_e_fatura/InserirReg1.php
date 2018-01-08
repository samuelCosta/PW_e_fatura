<?php
include "Funcoes.php";
include "Conexao.php";
include "templatemo_372_titanium/topopagina.php";
include "templatemo_372_titanium/Menu_anonimo.php";


Registar_Utilizador();


require_once('class.phpmailer.php');
include("class.smtp.php");


// Definir variáveis
if($_POST) {
        $destinatario_nome = $_POST['Nome'];
        $destinatario_email = $_POST['email'];
        $Pass=$_POST['pass'];
        $assunto = 'Recebeu a sua Password! Bem-Vindo ao E-fatura!';
        $mensagem ='Ola ' .$destinatario_nome. '. A sua password para aceder aos nossos servicos e:' .$Pass;
        
        
        $mail = new PHPMailer(true);   // true - Retorna excepcões
        
       $mail->Mailer = "smtp";   // Utilização de SMTP
        
        try {
            $mail -> SMTPSecure  =  'ssl' ;
                $mail->Host       = "smtp.gmail.com";  // Servidor SMTP
                $mail->Port = 465;
                $mail->SMTPAuth   = true;                   // Activar autenticação SMTP
                $mail->Username   = 'e.fatura.uminho@gmail.com';  // Utilizador do servidor SMTP
                $mail->Password   = 'andre1992';         // Password do utilizador do SMTP
                
                $mail->AddReplyTo('e.fatura.uminho@gmail.com', 'E-Fatura-Universidade do Minho');       // Email e nome para onde será enviada a resposta (opcional)
                $mail->SetFrom('e.fatura.uminho@gmail.com', 'E-Fatura-Universidade do Minho');          // Email e nome de envio

                $mail->AddAddress($destinatario_email, $destinatario_nome);   // Email e nome do destinatário
                
                $mail->Subject = $assunto;                                    // Assunto da mensagem
                
                $mail->IsHTML(false);                                         // false - O conteúdo da mensagem será enviado como texto e não HTML
                $mail->Body = $mensagem;                                      // Conteúdo da mensagem em si
                
                //$mail->AddAttachment('anexo.jpg');                            // Anexo (opcional)
        
                $mail->Send();
                echo "<p><font face='Arial'>Password enviada com sucesso!</font></p>\n";   // Mensagem enviada!
				echo "<br><a href=\"index.php\"><h1>Voltar ao Inicio</h1></a>";
        } catch (phpmailerException $e) {
                echo $e->errorMessage();                      // Erros provenientes do PHPMailer
        } catch (Exception $e) {
                echo $e->getMessage();                        // Outros erros
        }
} else {
        header('Location:index.php');
        exit();
}
?>










