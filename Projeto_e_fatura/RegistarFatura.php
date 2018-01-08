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


$sessao=$_SESSION['username'];

   

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
                             
				$('#registo').validate({
					rules:{ 
						 Nif:{ required: true, digits:true ,minlength:9,maxlength:9},
                                                  Nifc:{ required: true, digits:true ,minlength:9, maxlength:9},
                                                   Nifcm:{ required: true, digits:true ,minlength:9,maxlength:9},
                                                    Nome:{ required: true, minlength:6},
                                                     Numero:{ required: true, digits:true},
                                                      Data:{ required: true},
                                                       Tipo:{ required: true},
                                                Setoractividade:{ required: true }
                                                 },
					messages:{
						Nome:{ required: '⌦ Este campo é de preenchimento obrigatório!', minlength:"✖ O seu nome está incompleto!" },
                                                Tipo:{ required: '⌦ Este campo é de preenchimento obrigatório!' },
                                                Data:{ required: '⌦ Este campo é de preenchimento obrigatório!' },
                                                 Setoractividade:{ required: '⌦ Este campo é de preenchimento obrigatório!' },
                                                Numero:{ required: '⌦ Este campo é de preenchimento obrigatório!', digits: "✖ Apenas podem ser inseridos digitos de 0-9!" },
                                                Nif:{ required: '⌦ Este campo é de preenchimento obrigatório!', digits:"✖ Apenas podem ser inseridos digitos de 0-9!", maxlength:"✖ O seu Nif terá de conter 9 digitos!", minlength:"✖ O seu Nif terá de conter 9 digitos!"},
                                                Nifc:{ required: '⌦ Este campo é de preenchimento obrigatório!', digits:"✖ Apenas podem ser inseridos digitos de 0-9!", maxlength:"✖ O seu Nif terá de conter 9 digitos!", minlength:"✖ O seu Nif terá de conter 9 digitos!"},
                                               
                                                Nifcm:{ required: '⌦ Este campo é de preenchimento obrigatório!', digits:"✖ Apenas podem ser inseridos digitos de 0-9!", maxlength:"✖ O seu Nif terá de conter 9 digitos!", minlength:"✖ O seu Nif terá de conter 9 digitos!"}}
//					email:{ required: 'Este campo é de preenchimento obrigatório!', remote: 'O E-mail inserido já existe!' },
//                                                 Nif:{ required: 'Este campo é de preenchimento obrigatório' remote: 'O E-mail inserido já existe!' }},
				});
			});
            	</script>
               
                
           


                
                
	</head>
<body>









  
        <br><br> <br><br>

        <form action="InserirFatura.php" method="post" id="registo">
    <fieldset>
        
        <img src="templatemo_372_titanium/images/calculadora2.gif" width="170" height="170" align="right">
        Nif:<br>
        <input type="text" name="Nif" size="65" value="<? print $sessao  ?>"> <br>
        Nif de Comerciante:<br> 
<input type="text" name="Nifc" size="65"><br>
Nif de Consumidor:<br> 
<input type="text" name="Nifcm" size="65"><br>
Nome:<br>
<input type="text" name="Nome" size="65"><br>
Tipo de Fatura:<br>
<input type="text" name="Tipo" size="65" ><br> 
Numero de Fatura:<br>
<input type="text" name="Numero" size="65"><br>
Sector de Actividade:<br>
<select name= "Setoractividade">
<option value="1">
Manutenção e reparação de veículos automóveis
</option>
<option value="2">
Manutenção e reparação de motociclos, de suas peças e acessórios
</option>
<option value="3">
Alojamento, restauração e similares
</option>
<option value="4">
Atividade de salões de cabeleireiro e institutos de beleza
</option>
</select><br>
Data de emissão:<br>
<input type="date" name="Data" size="50"><br>
</fieldset>
<input type="submit" value="Seguinte">
</form>

        
      

</body>
</html>













