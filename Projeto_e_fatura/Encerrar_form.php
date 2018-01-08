<?php

include "Funcoes.php";
include "conexao.php";
global $con;

$query= mysqli_query($con, "Select utilizador_Nif, Tipo_utilizador from consumirdo_comer where utilizador_Nif={$_SESSION['username']} and Tipo_utilizador= 'Comerciante'");
$row= mysqli_num_rows($query);


if($row>0){
    include "templatemo_372_titanium/topopagina_comer.php";
include "templatemo_372_titanium/Menu_comerc.php";}

else{
include "templatemo_372_titanium/topopagina1.php";
include "templatemo_372_titanium/Menu.php";}


$query= mysqli_query($con, "Select NifB, cod_previlegio from previlegios where NifB={$_SESSION['username']} and cod_previlegio=1");
$row33= mysqli_num_rows($query);

if ($row33>0){echo "<br><br><br> Neste Momento a sua Actividade encontra-se Encerrada!";}

else{ echo "<br><br><br> Neste Momento a sua Actividade encontra-se a decorrer!";}


?>

<head>
		<title></title>
                 
	
		<!-- Inclus�o do Jquery -->
		<script type="text/javascript" src="jquery.min.js" ></script>
		<!-- Inclus�o do Jquery Validate -->
		<script type="text/javascript" src="jquery.validate.js" ></script>
              
		
		<!-- Valida��o do foruml�rio -->
		<script type="text/javascript">
			$(document).ready(function(){
                             
				$('#form3').validate({
					rules:{ 
						nif:{ required: true }
                                                
                                                 },
					messages:{
						
                                               
                                               nif:{ required: '⌦ Este campo é de preenchimento obrigatório!'}}
//					email:{ required: 'Este campo é de preenchimento obrigatório!', remote: 'O E-mail inserido já existe!' },
//                                                 Nif:{ required: 'Este campo é de preenchimento obrigatório' remote: 'O E-mail inserido já existe!' }},
				});
			});
            	

		</script>
                



   <div >
        
        
        <br><br> <br><br>
<form action="Encerrar_Ok.php" method="post" id="form3">
    
    
<fieldset>
<legend>Encerrar Actividade</legend>

Confirme o seu Nif:<br>
<input type="text" name="nif" maxlength="9" size="28" />
 <br />


 <select name="encerrar">
<option value="1">
----Encerrar Actividade----
</option>
<option value="0">
----Re-abrir Actividade----
</option>

</select>


</fieldset>
    <input type="submit">


</form> </div>

</body>
</html>
