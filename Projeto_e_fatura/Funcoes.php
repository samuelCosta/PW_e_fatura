<?php
include "conexao.php";
session_start();


function PassNova(){
    
    
    global $con;
     $PA= $_POST['PA'];
     $PN= $_POST['PN'];
     $PN1= $_POST['PN1'];
    
    $verifica= mysqli_query($con, "Select * from utilizador where Nif={$_SESSION ['username']} and Password='$PA'");
    
    
    
  
    
    if($verifica && $PN==$PN1){
        
        mysqli_query($con,"UPDATE utilizador SET Nova_Pass ='$PN1' where Nif={$_SESSION ['username']}");
         echo "<script language='javascript'>";
	echo "alert('Bem-Vindo! A sua Password foi alterada com sucesso! Efectue o Login novamente para sua segurança!')";
        echo "</script>";
         echo('<meta http-equiv="refresh" content="0;URL= Login.php ">');
        
        
        }else {
        
    
     echo "<script language='javascript'>";
	echo "alert('Dados introduzidos incorrectamente, tente novamente!')";
        echo "</script>";
         echo('<meta http-equiv="refresh" content="0;URL= Login.php ">');
    
    
}}
    



function encerrar (){
    global $con;
     $nif= $_POST['nif'];
     $encerrar= $_POST['encerrar'];
     $verifica= mysqli_query($con, "Select * from previlegios where NifB=  {$_SESSION ['username']} and NifB=$nif");
     $row=  mysqli_num_rows($verifica);
     $voltar="<a href='Encerrar_form.php'> tente outra vez</a>";
             
             
     if ($row>0){

     
      mysqli_query($con,"UPDATE previlegios SET cod_previlegio =$encerrar where NifB= $nif");
      echo "<br><br><br> Alteração efectuada com sucesso! ";
 
}    else
{ echo "<br><br><br> O seu Nif não está correto, $voltar!" ;}};
    
    
    





function recuperar_pass(){
    
    require_once('class.phpmailer.php');
     include("class.smtp.php");
    global $con;
    
    if($_POST) {
        
           
     
        
        
        $destinatario_nome = $_POST['nif'];
        $destinatario_email = $_POST['email'];
        
         $Aceitar= mysqli_query($con, "Select Nova_Pass, Nif, utilizador_Nif, email From utilizador, consumirdo_comer where utilizador_Nif=  $destinatario_nome and Nif=  $destinatario_nome and email='$destinatario_email' ")
    or die("Error: ".mysqli_error($con));
      $row= mysqli_num_rows($Aceitar);
      if($row>0){
     
      $exibir = mysqli_fetch_array($Aceitar);
        $assunto = 'Pedido de recuperacao de password E-Fatura!';
        $mensagem = 'Ola utilizador com Nif n: ' .$destinatario_nome. '. A sua password para aceder aos nossos servicos e:' .$exibir['Nova_Pass'];
        
     
        
        $mail = new PHPMailer(true);   // true - Retorna excepcões
        
       $mail->Mailer = "smtp";   // Utilização de SMTP
        
        try {
            $mail -> SMTPSecure  =  'ssl' ;
                $mail->Host       = "smtp.gmail.com";  // Servidor SMTP
                $mail->Port = 465;
                $mail->SMTPAuth   = true;                   // Activar autenticação SMTP
                $mail->Username   = 'e.fatura.uminho@gmail.com';  // Utilizador do servidor SMTP
                $mail->Password   = 'andre1992';         // Password do utilizador do SMTP
                
                $mail->AddReplyTo('e.fatura.uminho@gmail.com', 'E-Fatura');       // Email e nome para onde será enviada a resposta (opcional)
                $mail->SetFrom('e.fatura.uminho@gmail.com', 'E-Fatura');          // Email e nome de envio

                $mail->AddAddress($destinatario_email, $destinatario_nome);   // Email e nome do destinatário
                
                $mail->Subject = $assunto;                                    // Assunto da mensagem
                
                $mail->IsHTML(false);                                         // false - O conteúdo da mensagem será enviado como texto e não HTML
                $mail->Body = $mensagem;                                      // Conteúdo da mensagem em si
                
                //$mail->AddAttachment('anexo.jpg');                            // Anexo (opcional)
        
                $mail->Send();
                echo "<p><font face='Arial'>Password enviada com sucesso!</font></p>\n";   // Mensagem enviada!
				echo "<br><a href=\"index.php\">voltar</a>";
        } catch (phpmailerException $e) {
                echo $e->errorMessage();                      // Erros provenientes do PHPMailer
        } catch (Exception $e) {
                echo $e->getMessage();                        // Outros erros
        }
} else {
        header('Location:index.php');
        exit();
}}else{
    
    
    
    
    echo "<script language='javascript'> alert(Os Dados que introduziu não constam na nossa Base de Dados!)</script>";
    
    
    
}}

    
    
    
    

    
 
    
  
     

    
    
    
 





function esta_logado(){
    
    return isset($_SESSION['username']);}
    
    
 
    
    function notificacao() {
     
     global $con;
     
     $Nif= $_POST['nif'];
     $mensagem= $_POST['sms'];
      $numero= $_POST['numero'];
     
     
     $insere= "INSERT INTO Mensagem (Nif, Mensagem, Numero)
                VALUES ('$Nif', '$mensagem', '$numero')";
     mysqli_query($con, $insere);
     
   }
   
   
   function apagasms(){
       
       
        global $con;
    
    $Numero= $_POST['numero'];
    
   

    mysqli_query($con, "DELETE FROM Mensagem WHERE Nif ={$_SESSION ['username']} and Numero=$Numero");
    
   
    
        echo "<br><br><br> Mensagem apagada com sucesso!";
       
       
   }
   
   
   function bloquear (){
       
       global $con;
       
      
   echo " <br> <table border rules=all width='75%'>";
   echo "<tr>";

   echo "<td>Nome</td>";
   
   echo "<td>Nif</td>";

    echo "<td>Tipo de Utilizador</td>";
    
    echo "<td>Bloqueado</td>";
    
   
$Aceitar= mysqli_query($con, "Select Tipo_utilizador, Nome, utilizador_Nif, Bloqueado From consumirdo_comer where Bloqueado=1")
    or die("Error: ".mysqli_error($con));
while( $exibir = mysqli_fetch_array($Aceitar)){ 

    echo "</tr>";


     echo "<td>" .$exibir['Nome']."</td>";
     
      echo "<td>" .$exibir['utilizador_Nif']."</td>";
   
    echo "<td>" .$exibir['Tipo_utilizador']."</td>";

   echo "<td>" .$exibir['Bloqueado']."</td>";
    
    
   } echo "</table>";
   
   
   
   
   
   echo " <br> <table border rules=all width='75%'>";
   echo "<tr>";

   echo "<td>Nome</td>";
   
   echo "<td>Nif</td>";

    echo "<td>Tipo de Utilizador</td>";
    
    echo "<td>Não Bloqueado</td>";
    
   
$Aceitar= mysqli_query($con, "Select Tipo_utilizador, Nome, utilizador_Nif, Bloqueado From consumirdo_comer where Bloqueado=0")
    or die("Error: ".mysqli_error($con));
while( $exibir = mysqli_fetch_array($Aceitar)){ 

    echo "</tr>";


     echo "<td>" .$exibir['Nome']."</td>";
     
      echo "<td>" .$exibir['utilizador_Nif']."</td>";
   
    echo "<td>" .$exibir['Tipo_utilizador']."</td>";

   echo "<td>" .$exibir['Bloqueado']."</td>";
    
    
   } echo "</table>";
   
   
   
  
   
   
   
   
   
   
}
   

function dados(){
    global $con;
   $dados=  mysqli_query($con, "Select * from consumirdo_comer where utilizador_Nif= {$_SESSION ['username']}");
   $valores= mysqli_fetch_array($dados);
    $dados1=  mysqli_query($con, "Select * from utilizador where Nif= {$_SESSION ['username']}");
   $valores1= mysqli_fetch_array($dados1);
   
   $numfat=mysqli_query($con, "Select * from fatura where Nif= {$_SESSION ['username']}");
   $linha= mysqli_num_rows($numfat);
   $beneficio=  mysqli_fetch_array($numfat);
   
   $Link= mysqli_query($con, "select Link from utilizador where Nif={$_SESSION['username']}");
$exibir = mysqli_fetch_array($Link);
$exibirlink= $exibir['Link'];
   
   ?>

   

   
        <html><head>
		<title></title>
                 
	
		<!-- Inclus�o do Jquery -->
		<script type="text/javascript" src="jquery.min.js" ></script>
		<!-- Inclus�o do Jquery Validate -->
		<script type="text/javascript" src="jquery.validate.js" ></script>
                
                
              
		
		<!-- Valida��o do foruml�rio -->
		<script type="text/javascript">
			$(document).ready(function(){
                             
				$('#form2').validate({
					rules:{ 
						 ValidaNif:{ required: true, digits:true ,rangelength:9},
                                                email:{ remote: 'verifica_email.php' }
                                                 },
					messages:{
						email:{ remote: '✖ O E-mail inserido já existe!' },
                                               
                                                ValidaNif:{ required: '⌦ Este campo é de preenchimento obrigatório!', digits:"✖ Apenas podem ser inseridos digitos de 0-9!",rangelength:"✖ O seu Nif terá de conter 9 digitos!"}}
//					email:{ required: 'Este campo é de preenchimento obrigatório!', remote: 'O E-mail inserido já existe!' },
//                                                 Nif:{ required: 'Este campo é de preenchimento obrigatório' remote: 'O E-mail inserido já existe!' }},
				});
			});
            	</script>
               
                
           

            
            
            
            </head><body>
    
                
                <br><br> 
<form action="Altera_Dados.php" method="post" id="form2">
    
    
<fieldset>
<legend>Meus dados</legend>

 <?print "<a href='Alterafotoform.php'>
<img src='$exibirlink' width='100' height='100' align='right'> </a></p>"?>

Nif:<br>
 <input type="text"  value=" <? print $valores['utilizador_Nif']?>" disabled="disabled" /><br>

Nome:<br>
<input type="text"  value=" <? print $valores['Nome']?>" disabled="disabled" /><br>
 
Data de Nascimento:<br>
 <input type="text"  value=" <? print $valores['Data_nasc']?>" disabled="disabled"/>
 <br />
 
 Localidade:<br>
 <input type="text" name="AlteraLocalidade" value=" <? print $valores['Localidade']?>" />
 <br />
 Email:<br>
 <input type="email" name="email" value=" <? print $valores['email']?>" /><br>
 Tipo de Utilizador:<br>
 <input type="text" name="AlteraTipo" value=" <? print $valores['Tipo_utilizador']?>" disabled="disabled"/><br>
 Nome de Negocio:<br>
 <input type="text" name="AlteraNegocio" value=" <? print $valores['utilizador_Nif']?>" /><br>
 Password:<br>
 <input type="text"  value=" <? print $valores1['Password']?>" disabled="disabled"/><br>
 <hr>
 
 Numero Total de faturas:
 <input type="text"  value=" <? print $linha?>" disabled="disabled" />
 
                Beneficio actual:
                <input type="text"  value=" <? print $beneficio['Beneficio']?>€" disabled="disabled" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Alterar Dados"><br>
 
 
 


</fieldset>
    


</form>   
                
                
                
                
                
    </body></html><?
    
    
    
    
    
    
    
}

   
   function Bloq(){
   global $con;
   
  $Bloquear= $_POST['bloquear'];
  $Nif=$_POST['nif'];  
    
   mysqli_query($con,"UPDATE consumirdo_comer SET Bloqueado = '$Bloquear' where utilizador_Nif= $Nif");
    
}
    
     

    function irregularidade (){
        
        global $con;
       $data= date("Y/m/d");
        
    
    
    $datafim= mysqli_query($con, "Select Nif, valor_coima, Data_pagamento from coima where Data_pagamento < '$data'");
   
     
     echo " <br> <table border rules=all width='75%'>";
echo "<tr>";

   
    echo "<td>Nif</td>";

    echo "<td>Valor da Coima</td>";

    echo "<td>Data Limite de Pagamento</td>";
   
    
    
    while( $exibir = mysqli_fetch_array($datafim)){ 
        
        
        echo "</tr>";


    echo "<td>" .$exibir['Nif']."</td>";
   
    echo "<td>" .$exibir['valor_coima']."€</td>";
    
    echo "<td>" .$exibir['Data_pagamento']."</td>";

    
    
    
    
   
    } echo "</table>";}   
       
       
      
   
   
   
   function upload () {
       
    global $con;   
       

  $file= $_FILES['arquivo']['tmp_name'];
  
  $fp = fopen($file,'r');
  
  while (!feof($fp)){
      
      
      $conteudo= fgets($fp);
      
      $linha= explode (",", $conteudo);
   
  
      $insere= "INSERT INTO fatura (Nif, Nome, Tipo_fatura, Numero_fatura, cod_sector, Data_emissao, Nifid)
VALUES ('$linha[0]', '$linha[1]', '$linha[2]', '$linha[3]', '$linha[4]', '$linha[5]', '$linha[0]')";
mysqli_query($con, $insere);

$Beneficiotot= mysqli_query($con, "Select sum(Beneficio) from fatura where Nif = '$linha[0]'");
while($valor = mysqli_fetch_array($Beneficiotot)){
	$valorbenificio = $valor['sum(Beneficio)'];
	}
        
   $inserirc= "Update consumirdo_comer, fatura Set Beneficio_Total=$valorbenificio Where utilizador_Nif = Nif";
     mysqli_query($con, $inserirc);
     
     
 $iva= $linha[6] * ($linha[7] / 100);
$Base= $linha[6] - $iva;

$valben= mysqli_query($con, "select Valor_beneficio from valor_beneficio");
 while($valor = mysqli_fetch_array($valben)){
	$valorbenificio = $valor['Valor_beneficio'];
	}
        
        $Beneficio = $iva * $valorbenificio;
	



$linhaf= "INSERT INTO linha_fatura (idLinha_fatura, Total, Taxa, Iva, numerofatura, Base_tributavel, Beneficio)
VALUES ('$linha[3]', '$linha[6]', '$$linha[7]', '$iva', '$linha[3]', '$Base', '$Beneficio')";
 mysqli_query($con, $linhaf);
 
 $in= "Update fatura Set Beneficio=$Beneficio Where Numero_fatura = $linha[3]";
     mysqli_query($con, $in);
      
     
    
      
      
      
  }
  }
	


   
       
       
       
       
   
   
   
   
   
 function mensagem () {
     
global $con;     
     $teste= "<form action ='Apaga_sms_Form.php' method=POST >
<input type=submit name=botao value=Apagar>
</form>"; 

  
    
    
     
     
       echo " <br> <table border rules=all width='75%'>";
        echo "<td>Numero</td>";
        echo "<td>Descrição</td>";
        echo "<td>Apagar</td>";
       
       echo "<tr>";
      $Aceitar= mysqli_query($con, "Select * From Mensagem where Nif= {$_SESSION['username']} ")
    or die("Error: ".mysqli_error($con));
while( $exibir = mysqli_fetch_array($Aceitar)){ 

    echo "</tr>";
  
   echo "<td>" .$exibir['Numero']."</td>";
    echo "<td>" .$exibir['Mensagem']."</td>";
    echo "<td> $teste </td>";
    
     
}   echo "</table>";
     
    
    $BeneficioMax= mysqli_query($con, "Select Beneficio_Total from consumirdo_comer where utilizador_Nif={$_SESSION['username']} and Beneficio_Total= 250");
    $row= mysqli_num_rows($BeneficioMax);
    
    if( $row > 0){
        
        echo "<hr> Parabéns! Já atingiu o Beneficio Máximo";
        
 }else {echo "<hr> Ainda não atingiu o seu Beneficio Máximo. Continue a registar as suas faturas, você e o Pais ganham!";}}
     
    
    
  


function login_Admin(){
    
   include "conexao.php";
    global $con;
    $conetado = $con;
    $Nif3= $_POST['numero'];
    $Pass3=$_POST ['senha'];
   

    $sqli= "Select Nif, Password, Tipo_utilizador From utilizador, consumirdo_comer Where Nif= '$Nif3' and Nova_Pass = '$Pass3'" ;
    
    $sqlis= mysqli_query($conetado, $sqli);
    $rowes= mysqli_num_rows($sqlis);
    $Tipo= mysqli_query($con, "Select Tipo_utilizador from consumirdo_comer where utilizador_Nif= $Nif3 and Tipo_utilizador= 'Admin'");    
    $row= mysqli_num_rows($Tipo);
   
   
 
   if ($rowes >0 && $row > 0){
        
    
        $_SESSION ['numero'] = $_POST ['numero'];
        $_SESSION ['senha'] = $_POST ['senha'];
        
     
        echo "<br><br>Bem Vindo Administrador numero  " .$_SESSION ['numero'];
     
      
        
        
    }else{    
   
        
        
        echo "<script language='javascript'>";
	echo "alert('Dados incorretos!')";
        echo "</script>";
         echo('<meta http-equiv="refresh" content="0;URL= Login_Administrador.php ">');
     
}}



 
 
function login(){
    

   global $con;
   
   


    $Nif2= $_POST['username'];
    $Pass2=$_POST ['password'];
    $Tipo2=$_POST['select'];
    
    $sql= "Select * From utilizador,consumirdo_comer Where Bloqueado=0 and Nif= '$Nif2' and Nova_Pass = '$Pass2' and Tipo_utilizador= '$Tipo2' and Aprovacao=1 and Tipo_utilizador= 'Comerciante'" ;
    $sqli= mysqli_query($con, $sql);
    $row= mysqli_num_rows($sqli);
    $sql2= "Select * From utilizador,consumirdo_comer Where Bloqueado=0 and Nif= '$Nif2' and Nova_Pass = '$Pass2' and Tipo_utilizador= '$Tipo2' and Aprovacao=1 and Tipo_utilizador= 'Consumidor'" ;
    $sqli2= mysqli_query($con, $sql2);
    $row2= mysqli_num_rows($sqli2);
  
  
   
   if ($row > 0){
        
      
       $_SESSION ['username'] = $Nif2;
        $_SESSION ['password'] = $Pass2;
       
        
        
  
   echo('<meta http-equiv="refresh" content="0;URL= inicio_comer.php ">');
    
   
   
   }else if ($row2 > 0){
       
       $_SESSION ['username'] = $Nif2;
        $_SESSION ['password'] = $Pass2;
        
        
        

  echo('<meta http-equiv="refresh" content="0;URL= inicio_c.php ">');

       
       
   }
    
          
else{
        
        echo "<script language='javascript'>";
	echo "alert('Dados incorretos ou a sua inscrição não foi aceite, tente mais tarde!')";
        echo "</script>";
        echo('<meta http-equiv="refresh" content="0;URL= Login.php ">');
        
     
         
     
}}
 

function logout (){
   
   

session_destroy(); //destroy the session
echo('<meta http-equiv="refresh" content="0;URL= index.php ">');
     
 }
 
 
 function Registar_Utilizador(){
     
     
  
     include "conexao.php";
     global $con;
     
     
     
     
     
     $Negocio= $_POST['Negocio'];
$Tipo= $_POST['Tipo'];
$Nome= $_POST['Nome'];
$email= $_POST['email'];
$Data= $_POST['Data'];
$Localidade= $_POST['Localidade'];
$Nif= $_POST['Nif'];
$Password= $_POST['pass'];

$imagem="templatemo_372_titanium/transferir.jpeg";  






$InsereUti= "INSERT INTO utilizador (Nif, Password, Nova_Pass, Link)
VALUES ($Nif, '$Password','$Password', '$imagem')";
$inserirUti = mysqli_query($con, $InsereUti);

$encerrar= "INSERT INTO previlegios (cod_previlegio, NifB)
VALUES ('0', '$Nif')";
$insere1=mysqli_query($con, $encerrar);


$insere= "INSERT INTO consumirdo_comer (Aprovacao, Nome_negocio, Tipo_utilizador, Nome, email, Data_nasc, Localidade, utilizador_Nif)
VALUES (0,'$Negocio', '$Tipo', '$Nome', '$email', '$Data', '$Localidade', $Nif)";
$inserir = mysqli_query($con, $insere);



               

     
     
     
     
     
     
 }






function apagafatura(){
    
     global $con;
    
    $Numero= $_POST['numero'];
    
   

    mysqli_query($con, "DELETE FROM fatura WHERE Nif ={$_SESSION ['username']} and Numero_fatura=$Numero");
    mysqli_query($con, "DELETE FROM linha_fatura WHERE  numerofatura=$Numero");
   
    
        echo "<br><br><br> Fatura apagada com sucesso!";
    
    
    
    
} 
 
 function Remover(){
     
    global $con;
    
    $Nif= $_POST['Nif'];
    
   

    $Apaga= mysqli_query($con, "DELETE FROM utilizador WHERE Nif = $Nif");
    $Apaga2= mysqli_query($con, "DELETE FROM consumirdo_comer WHERE utilizador_Nif = $Nif");
        
 }
        
     
          
            
    
    
function Alterar (){
    
    
    global $con;
 
    $Nif= $_POST['Nif'];
    $AlteraNegocio =$_POST['AlteraNegocio'];
    $AlteraTipo =$_POST['AlteraTipo'];
    $Alteraemail =$_POST['Alteraemail'];
   $total = mysqli_query($con,"UPDATE consumirdo_comer SET Nome_negocio = '$AlteraNegocio', Tipo_utilizador='$AlteraTipo', email='$Alteraemail' where utilizador_Nif=$Nif");
 
    
}    
    


function Altera_Beneficio (){
    
        
include "conexao.php";
global $con;
    
    $Altera =$_POST['Altera'];
    $total = mysqli_query($con,"UPDATE valor_beneficio SET Valor_beneficio = '$Altera'");
    
  }
  
  
  function Altera_Setor(){
      
      include "conexao.php";
global $con;
    $id= $_POST['id'];
    $Altera =$_POST['Altera'];
    $total = mysqli_query($con,"UPDATE setor_actividade SET designacao_sector = '$Altera' where cod_sector= '$id'");
    
  }
  
  
  function Alterar_Datas() {
      
include "conexao.php";
global $con;

$Data2 =$_POST['data2'];
    $total = mysqli_query($con,"UPDATE DATa SET DATa='$Data2' where nif='111111111'");
      
      
  }
    
    
    
 

function Aprovacao (){
    
     
     global $con;  
     
     
     echo " <br> <table border rules=all width='75%'>";
echo "<tr>";

   
    echo "<td>Nome de Negocio</td>";

    echo "<td>Tipo de Utilizador</td>";
    
    echo "<td>Nome</td>";
    
    echo "<td>E-mail</td>";
    
    echo "<td>Data de Nascimento</td>";

    echo "<td>Localidade</td>";
    
    echo "<td>Nif</td>";
     
     
     $Aceitar= mysqli_query($con, "Select Nome_negocio, Tipo_utilizador, Nome, email, Data_nasc, Localidade, utilizador_Nif From consumirdo_comer where Aprovacao= 0 ")
    or die("Error: ".mysqli_error($con));
while( $exibir = mysqli_fetch_array($Aceitar)){ 

    echo "</tr>";


    echo "<td>" .$exibir['Nome_negocio']."</td>";
   
    echo "<td>" .$exibir['Tipo_utilizador']."</td>";

    echo "<td>" .$exibir['Nome']."</td>";
    
    echo "<td>" .$exibir['email']."</td>";
    
    echo "<td>" .$exibir['Data_nasc']."</td>";
    
    echo "<td>" .$exibir['Localidade']."</td>";

    echo "<td>" .$exibir['utilizador_Nif']."</td>";
    
   
    } echo "</table>";}
    
    
    
    
    
    function AprovarOK () {
        
        global $con;
        
        
        $Nif= $_POST['Nif'];
        $Valor= $_POST['valor'];
        
         mysqli_query($con,"UPDATE consumirdo_comer SET Aprovacao = '$Valor' where utilizador_Nif= $Nif");
        
        
        
    }
       
  

       

 function Procura(){
    
    
 include "conexao.php";


 global $con;

 
 
 $teste= "<form action ='Editar_Fatura_Form.php' method=POST >
<input type=submit name=botao value=Editar>
</form>"; 
 $apagar= "<form action ='Apaga_fatura_form.php' method=POST >
<input type=submit name=botao value=Apagar>
</form>"; 
 
echo " <br> <table border rules=all width='75%'>";
echo "<tr>";


echo "<td>Comerciante</td>";
echo "<td>Consumidor</td>";
   
    echo "<td>Nome</td>";

    echo "<td>Tipo</td>";
  
      echo "<td>Numero</td>";
    
    echo "<td>Data</td>";
    

    
    echo "<td>Total</td>";

    echo "<td>Taxa</td>";
    
    echo "<td>Iva</td>";
    
    echo "<td>Base Tributavel</td>";
    
       echo "<td>Editar</td>";
       echo "<td>Apagar</td>";
    
    

    $sql = "SELECT Nif_comer, Nif_consum, Nif, Nome, Tipo_fatura, Numero_fatura, Data_emissao, Total, Taxa, Iva, Base_tributavel FROM fatura , linha_fatura  where numerofatura=Numero_fatura and Nifid={$_SESSION['username']} "; 
$executar=mysqli_query($con, $sql) 
or die("Error: ".mysqli_error($con));
while( $exibir = mysqli_fetch_array($executar)){ 

    

echo "</tr>";


   
    
    echo "<td>" .$exibir['Nif_comer']."</td>";
    
    echo "<td>" .$exibir['Nif_consum']."</td>";
    
    
   
    echo "<td>" .$exibir['Nome']."</td>";

    echo "<td>" .$exibir['Tipo_fatura']."</td>";
    
    echo "<td>" .$exibir['Numero_fatura']."</td>";
    
    echo "<td>" .$exibir['Data_emissao']."</td>";
    
    
    
    echo "<td>" .$exibir['Total']."€ </td>";

    echo "<td>" .$exibir['Taxa']."€ </td>";
    
    echo "<td>" .$exibir['Iva']."€ </td>";
    
    echo "<td>" .$exibir['Base_tributavel']."€ </td>";
    echo  "<td> $teste </td>";
    echo  "<td> $apagar </td>";







} echo "</table>";}




function Procura_Beneficio (){
    
    
    include "conexao.php";


 global $con;
 
 echo " <br> <table border rules=all width='75%'>";
 echo "<tr>";

 echo "<td>Nif</td>";
   
 echo "<td>Nome</td>";

 echo "<td>Beneficio</td>";
    
    


$Beneficio = "SELECT Nif, Nome, Beneficio FROM fatura where Nif={$_SESSION['username']} "; 
$exec=mysqli_query($con, $Beneficio) 
or die("Error: ".mysqli_error($con));
while( $exibir = mysqli_fetch_array($exec)){ 
echo "</tr>";


    echo "<td>" .$exibir['Nif']."</td>";
   
    echo "<td>" .$exibir['Nome']."</td>";

    echo "<td>" .$exibir['Beneficio']."€ </td>";
  
 }  echo "</table>";}



function Altera_Pass(){
    
    
    
    global $con;
    $Nova_Pass= $_POST['Novapass'];
    
    $ConfirmaPass= $_POST['NewPass'];
    
     $bloqueado= mysqli_query($con, "Select cod_previlegio, NifB from previlegios where cod_previlegio=1 and NifB={$_SESSION['username']} ");
     $row2= mysqli_num_rows($bloqueado);
     
     
      
if($row2 > 0){
    
   echo "<script language='javascript'>";
	echo "alert('Neste Momento os seus registos encontram-se bloqueados!')";
        echo "</script>"; 
$query= mysqli_query($con, "Select utilizador_Nif, Tipo_utilizador from consumirdo_comer where utilizador_Nif={$_SESSION['username']} and Tipo_utilizador= 'Comerciante'");
$row3= mysqli_num_rows($query);
if($row3>0){
  echo('<meta http-equiv="refresh" content="0;URL= inicio_comer.php ">');}
else{
echo('<meta http-equiv="refresh" content="0;URL= inicio_c.php ">');}} 
else{
    
    
    $Verifica = "Select * From utilizador Where Nif= {$_SESSION ['username']} and Nova_Pass = $ConfirmaPass";
    $sqli= mysqli_query($con, $Verifica);
    $total = mysqli_query($con,"UPDATE utilizador SET Nova_Pass = '$Nova_Pass' where Nif= {$_SESSION ['username']}");
  
    
    
        
        if($sqli){
            
            
           $total;
                  
        
        

}}}

         
     
    function Altera_Dados(){
        
        
        
    global $con;
    
    

    $AlteraNegocio =$_POST['AlteraNegocio'];
    
    $Alteraemail =$_POST['email'];
        
   
    $AlteraLocalidade =$_POST['AlteraLocalidade'];
            
     
     
            
  $bloqueado= mysqli_query($con, "Select cod_previlegio, NifB from previlegios where cod_previlegio=1 and NifB={$_SESSION['username']} ");
$row4= mysqli_num_rows($bloqueado);



if($row4 > 0){
    
   echo "<script language='javascript'>";
	echo "alert('Neste Momento os seus registos encontram-se bloqueados!')";
        echo "</script>"; 
$query= mysqli_query($con, "Select utilizador_Nif, Tipo_utilizador from consumirdo_comer where utilizador_Nif={$_SESSION['username']} and Tipo_utilizador= 'Comerciante'");
$row5= mysqli_num_rows($query);
if($row5>0){
  echo('<meta http-equiv="refresh" content="0;URL= inicio_comer.php ">');}
else{
echo('<meta http-equiv="refresh" content="0;URL= inicio_c.php ">');}} 
else{
    
    
    

    $total = "UPDATE consumirdo_comer SET Nome_negocio = '$AlteraNegocio',  email='$Alteraemail', Localidade= '$AlteraLocalidade'where utilizador_Nif= {$_SESSION['username']}";
mysqli_query($con, $total);}}

 
 
 function Altera_coima(){
     
     global  $con;


     $Nif= $_POST['nif'];
     $AlteraCoima= $_POST['coima'];
     
     
     $total = "UPDATE coima SET valor_coima = '$AlteraCoima' where Nif= $Nif";
     mysqli_query($con, $total);
     }
     
     
  function Aplicar_Coima(){
      
      global $con;
      
          $nif= $_POST['nif'];
          $coima= $_POST['coima'];
          $id= $_POST['id'];
          $data= $_POST['data'];
     
     
     
     $total = "INSERT INTO coima (idCoima, valor_coima, Data_pagamento, Nif)
VALUES ('$id', '$coima', '$data', '$nif')";
     mysqli_query($con, $total);
      
      
      
      
      
  }
 
 
 
 
 
 function Procura_Coima (){
     
     
 include "conexao.php";
 global $con;
 

    


$coima = "SELECT Nif, valor_coima, Data_pagamento FROM coima where Nif={$_SESSION['username']} "; 
$exec=mysqli_query($con, $coima) 
or die("Error: ".mysqli_error($con));

 echo " <br> <table border rules=all width='75%'>";
 
 echo "<tr>";

 echo "<td>Nif</td>";
   
 echo "<td>Valor da Coima</td>";

 echo "<td>Data de Pagamento</td>";
 
while( $exibir = mysqli_fetch_array($exec)){ 
    
   
  
 
 echo "</tr>";

    echo "<td>" .$exibir['Nif']."</td>";
   
    echo "<td>" .$exibir['valor_coima']."€ </td>";

    echo "<td>" .$exibir['Data_pagamento']."</td>";
    
    echo "</tr>";
    
} echo "</table>";}
 
 
 function Editar_Fatura(){
     
   global $con;
     
   
   
   $ConfNumero =$_POST ['ValidarNumero'];
   $AlteraTipof =$_POST ['AlteraTipof'];
   $Alteracodigo=$_POST ['Alteracodigo'];
   $AlteraControlo =$_POST ['AlteraControlo'];
   $AlteraData =$_POST ['Alteradata'];
   $AlteraTotal =$_POST ['AlteraTotal'];
   $AlteraTaxa =$_POST ['AlteraTaxa'];
    
    $Verifica= mysqli_query($con, "Select Numero_fatura from fatura");
    $row= mysqli_num_rows($Verifica);
    
  

$bloqueado= mysqli_query($con, "Select cod_previlegio, NifB from previlegios where cod_previlegio=1 and NifB={$_SESSION['username']} ");
$row2= mysqli_num_rows($bloqueado);

if($row2 > 0){
    
   echo "<script language='javascript'>";
	echo "alert('Neste Momento os seus registos encontram-se bloqueados!')";
        echo "</script>"; 
$query= mysqli_query($con, "Select utilizador_Nif, Tipo_utilizador from consumirdo_comer where utilizador_Nif={$_SESSION['username']} and Tipo_utilizador= 'Comerciante'");
$row3= mysqli_num_rows($query);
if($row3>0){
  echo('<meta http-equiv="refresh" content="0;URL= inicio_comer.php ">');}
else{
echo('<meta http-equiv="refresh" content="0;URL= inicio_c.php ">');}} 
else{
    

    $total = "UPDATE fatura SET Tipo_fatura = '$AlteraTipof', cod_sector=$Alteracodigo, Codigo_controlo='$AlteraControlo', Data_emissao= $AlteraData where Numero_fatura= $ConfNumero";
    $Tot= mysqli_query($con, $total);
    
    $linha= "Update linha_fatura, fatura Set Total=$AlteraTotal, Taxa= $AlteraTaxa Where idLinha_fatura= Numero_fatura";
    $linhas= mysqli_query($con, $linha);
    
    
    
     if($row>0){$tot; $linhas;
     
echo "<br>Fatura Editada com sucesso!"; }}
     
     
     
     
     
   
         
         
         
     }
     
     
     
 function Procura_Nif (){
         
         
           
include "conexao.php";
global $con;
$Procura= $_POST['NifID'];







echo " <br> <table border rules=all width='100%'>";
echo "<tr>";

echo "<td>Nif</td>";
   
    echo "<td>Nome</td>";

    echo "<td>Nome de Negócio</td>";
    
    echo "<td>Data de Inicio</td>";
    
    echo "<td>Data de Fim</td>";
    
    echo "<td>Tipo de Utilizador</td>";

    echo "<td>E-mail</td>";
    
    echo "<td>Data de Nascimento</td>";
    
    echo "<td>Localidade</td>";
    
    echo "<td>Beneficio Total</td>";
    

    
    
 
 
 



$Utili = "SELECT utilizador_Nif, Nome, Nome_negocio, Data_inicio, Data_fim, Tipo_utilizador, email, Data_nasc, Localidade, Beneficio_Total FROM consumirdo_comer where utilizador_Nif= '$Procura'"; 
$Utilizadores=mysqli_query($con, $Utili) 
or die("Error: ".mysqli_error($con));
while( $exibir = mysqli_fetch_array($Utilizadores)){ 
echo "</tr>";


    echo "<td>" .$exibir['utilizador_Nif']."</td>";
   
    echo "<td>" .$exibir['Nome']."</td>";

    echo "<td>" .$exibir['Nome_negocio']."</td>";
    
    echo "<td>" .$exibir['Data_inicio']."</td>";
    
    echo "<td>" .$exibir['Data_fim']."</td>";
    
    echo "<td>" .$exibir['Tipo_utilizador']."</td>";

    echo "<td>" .$exibir['email']."</td>";
    
    echo "<td>" .$exibir['Data_nasc']."</td>";
    
    echo "<td>" .$exibir['Localidade']."</td>";
    
    echo "<td>" .$exibir['Beneficio_Total']."€ </td>";
    
    
    
    }echo "</table>";}




function Valor_Total_IVA (){
               
include "conexao.php";
global $con;
 
$Procura =$_POST['Procura'];

echo " <br> <table border rules=all width='75%'>";
echo "<tr>";

echo "<td>Nif</td>";
   
    echo "<td>Total</td>";

    echo "<td>Iva</td>";




  
  $Utilizadores = "Select Nif, sum(Total), sum(Iva) From fatura,linha_fatura where Numero_fatura=numerofatura and Nif=$Procura "; 
    
  $Utilizador=mysqli_query($con, $Utilizadores) 
or die("Error: ".mysqli_error($con));
while( $exibir = mysqli_fetch_array($Utilizador)){ 
echo "</tr>";


    echo "<td>" .$exibir['Nif']."</td>";
   
    echo "<td>" .$exibir['sum(Total)']."€ </td>";

    echo "<td>" .$exibir['sum(Iva)']."€ </td>";
}
    echo "</table>";}
   
   
   function Valor_Beneficio_Comer(){
       
       include "conexao.php";
global $con;
 
    
  $Procura =$_POST['Procura'];
  
  echo " <br> <table border rules=all width='75%'>";
echo "<tr>";

echo "<td>Nif</td>";
   
    echo "<td>Beneficio</td>";
  
  
  
  $Utilizadores = "Select Nif, sum(Beneficio) From fatura where Nif=$Procura "; 
    
  $Utilizador=mysqli_query($con, $Utilizadores) 
or die("Error: ".mysqli_error($con));
while( $exibir = mysqli_fetch_array($Utilizador)){ 

echo "</tr>";


    echo "<td>" .$exibir['Nif']."</td>";
   
    echo "<td>" .$exibir['sum(Beneficio)']."€ </td>";
$Beneficio_Max= 250 - $exibir['sum(Beneficio)'] ;
    
   }echo "</table>";
   
   

echo "<br><br>Este Utilizador para atingir o Beneficio máximo (250€) ainda falta " .$Beneficio_Max. "€";
   
   
}
   
   
   function Todos_Beneficio (){
       
        include "conexao.php";
        global $con;
        
        echo " <br> <table border rules=all width='75%'>";
        echo "<tr>";

        echo "<td>Nif</td>";
   
         echo "<td>Beneficio</td>";
       
       $Utilizadores = "Select Nif, Beneficio From fatura ORDER BY Beneficio DESC ";
       
       $Utilizador=mysqli_query($con, $Utilizadores) 
or die("Error: ".mysqli_error($con));
while( $exibir = mysqli_fetch_array($Utilizador)){ 

echo "</tr>";


    echo "<td>" .$exibir['Nif']."</td>";
   
    echo "<td>" .$exibir['Beneficio']."€ </td>";

       
       }echo "</table>";}
       
       
       
       
       
       
       
       function Beneficio_Max(){
           
           
            include "conexao.php";
        global $con;
        
        echo " <br> <table border rules=all width='75%'>";
        echo "<tr>";

        echo "<td>Nif</td>";
        echo "<td>Nome</td>";
        echo "<td>Beneficio</td>";
       
       $Utilizadores = "Select Nif, Nome, Beneficio From fatura where Beneficio = 250";
       
       $Utilizador=mysqli_query($con, $Utilizadores) 
or die("Error: ".mysqli_error($con));
while( $exibir = mysqli_fetch_array($Utilizador)){ 
echo "</tr>";


    echo "<td>" .$exibir['Nif']."</td>";
    
    echo "<td>" .$exibir['Nome']."</td>";
   
    echo "<td>" .$exibir['Beneficio']."€ </td>";

    }

    echo "</table>";         }
         
         
    
         
function Linha_fatura(){
        

include "Conexao.php";

global $con;

$Numero= $_POST['Numero'];
$Total= $_POST['Total'];
$Taxa= $_POST['Taxa'];

$iva= $Total * ($Taxa / 100);
$Base= $Total - $iva;

$valben= mysqli_query($con, "select Valor_beneficio from valor_beneficio");
 while($valor = mysqli_fetch_array($valben)){
	$valorbenificio = $valor['Valor_beneficio'];
	}
        
        $Beneficio = $iva * $valorbenificio;
	



$insere= "INSERT INTO linha_fatura (idLinha_fatura, Total, Taxa, Iva, numerofatura, Base_tributavel, Beneficio)
VALUES ('$Numero', '$Total', '$Taxa', '$iva', '$Numero', '$Base', '$Beneficio')";
 mysqli_query($con, $insere);
 
 $inserirc= "Update fatura Set Beneficio=$Beneficio Where Numero_fatura = $Numero";
     mysqli_query($con, $inserirc);
 

 }
        

  function gerarPassword ($num_caracteres = 8 )
 
  {
 
    $password = "";
    $possiveis = "12346789abcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
 
    
 
    $max = strlen($possiveis); //define o comprimento maximo
 
    
    if ($num_caracteres> $max) {
 
      $num_caracteres= $max;}
 
    // variável de incrementação para saber quantos caracteres já tem a password enquanto está a ser gerada
    $i = 0; 
 
    // adiciona caracteres a $password até $num_caracteres estar completo    
    while ($i < $num_caracteres) { 
 
      // escolhe um caracter dos possiveis
 
    $char = substr($possiveis, mt_rand(0, $max-1), 1);
 
      // verifica se o caracter escolhido já está na $password
 
     if (!strstr($password, $char)) { 
 
        // se não estiver incluido adiciona outro        
 
     $password .= $char;  
 
     $i++;
  }
 
    }
 return $password;
 
  }
 
?>
 