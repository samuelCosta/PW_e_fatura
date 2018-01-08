<?php
require_once('class.phpmailer.php');
include("class.smtp.php");
include "Registar1.php";

// Definir variáveis
if($_POST) {
        $destinatario_nome = $_POST['Nome'];
        $destinatario_email = $_POST['email'];
        $assunto = 'Recebeu a sua Password! Bem-Vindo ao E-fatura!';
        $mensagem = print 'Bem Vindo ao E-fatura! Agora pode registar as suas faturas mais comodamente.<br>'
                . '<br>A sua password para que possa usufruir dos nossos serviçoes é:' .$pass.'<br>'
                . 'No seu primeiro Login deverá fazer a alteração da mesma!<br>'
                . '<br> E_FATURA UMINHO 2014! <br>'
                . 'O pais Agradece!'
                ;
        
        
        $mail = new PHPMailer(true);   // true - Retorna excepcões
        
       $mail->Mailer = "smtp";   // Utilização de SMTP
        
        try {
            $mail -> SMTPSecure  =  'ssl' ;
                $mail->Host       = "smtp.gmail.com";  // Servidor SMTP
                $mail->Port = 465;
                $mail->SMTPAuth   = true;                   // Activar autenticação SMTP
                $mail->Username   = 'e.fatura.uminho@gmail.com';  // Utilizador do servidor SMTP
                $mail->Password   = 'andre1992';         // Password do utilizador do SMTP
                
                $mail->AddReplyTo('e.fatura.uminho@gmail.com', 'Joao Teixeira');       // Email e nome para onde será enviada a resposta (opcional)
                $mail->SetFrom('e.fatura.uminho@gmail.com', 'Joao Teixeira');          // Email e nome de envio

                $mail->AddAddress($destinatario_email, $destinatario_nome);   // Email e nome do destinatário
                
                $mail->Subject = $assunto;                                    // Assunto da mensagem
                
                $mail->IsHTML(false);                                         // false - O conteúdo da mensagem será enviado como texto e não HTML
                $mail->Body = $mensagem;                                      // Conteúdo da mensagem em si
                
                //$mail->AddAttachment('anexo.jpg');                            // Anexo (opcional)
        
                $mail->Send();
                echo "<p><font face='Arial'>Password enviada com sucesso!</font></p>\n";   // Mensagem enviada!
				echo "<br><a href=\"../index.php\">voltar</a>";
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