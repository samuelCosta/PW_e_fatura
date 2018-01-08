<? 
    
     include "Funcoes.php";
     include "conexao.php";
     global $con;
     
     
     
     
     
     $Negocio= $_POST['Negocio'];
$Tipo= $_POST['Tipo'];
$Nome= $_POST['Nome'];
$email= $_POST['email'];
$Data= $_POST['Data'];
$Localidade= $_POST['Localidade'];
$Nif= $_POST['Nif'];
$Password= gerarPassword(7);
$imagem="templatemo_372_titanium/transferir.jpeg";  

//$logins_cadastrados =  "SELECT * FROM consumirdo_comer
//                WHERE utilizador_Nif =$Nif and email=$email";//monto a query
//        $q = mysqli_query( $sql );//executo a query
//       $array=  mysqli_fetch_array($q);
//               $emailq=$array['email'];
//	if( in_array( $email , $emailq ) )
//		//Se o login j· existir vocÍ exibe false
//		echo "false";
//	else
//		//Se o login n„o existir vocÍ exibe true
//		echo "true";
//	exit();


//$to = "andre_torres_619@hotmail.com";
//$subject = "$Tipo";
//$message = "Hello! This is a simple email message.";
//$header = "MIME-Version: 1.0\n";
//$header .= "Content-type: text/html; charset=iso-8859-1\n";
//$header .= "From: $email\n";
//mail($to,$subject,$message,$header);
//echo "Mail Sent.";

$InsereUti= "INSERT INTO utilizador (Nif, Password, Nova_Pass, Link)
VALUES ($Nif, '$Password','$Password', '$imagem')";
$inserirUti = mysqli_query($con, $InsereUti);

$encerrar= "INSERT INTO previlegios (cod_previlegio, NifB)
VALUES ('0', '$Nif')";
$insere1=mysqli_query($con, $encerrar);


$insere= "INSERT INTO consumirdo_comer (Aprovacao, Nome_negocio, Tipo_utilizador, Nome, email, Data_nasc, Localidade, utilizador_Nif)
VALUES (0,'$Negocio', '$Tipo', '$Nome', '$email', '$Data', '$Localidade', $Nif)";
$inserir = mysqli_query($con, $insere);



               




 ?>