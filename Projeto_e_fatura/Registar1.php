<?php

include "Funcoes.php";
include "conexao.php";
include "templatemo_372_titanium/topopagina.php";
$Password= gerarPassword(7);

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
                             
				$('#meu_form').validate({
					rules:{ 
						email:{ required: true, remote: 'verifica_email.php' },
                                                Tipo:{ required: true},
                                                Nome:{ required: true},
                                                 Localidade:{ required: true },
                                                  Data:{ required: true },
                                                   Negocio:{ required: true },
                                                 Nif:{ required: true, remote: 'verifica_nif.php' }},
					messages:{
						email:{ required: '⌦ Este campo é de preenchimento obrigatório!', remote: '✖ O E-mail inserido já existe!' },
                                                 Nif:{ required: '⌦ Este campo é de preenchimento obrigatório', remote: '✖ O Nif inserido já existe!' },
                                                 Tipo:{ required: '⌦ Este campo é de preenchimento obrigatório!'  },
                                                Nome:{ required: '⌦ Este campo é de preenchimento obrigatório!'},
                                                Localidade:{ required: '⌦ Este campo é de preenchimento obrigatório!'},
                                                Data:{ required: '⌦ Este campo é de preenchimento obrigatório!'},
                                                Negocio:{ required: '⌦ Este campo é de preenchimento obrigatório!'}},
//					email:{ required: 'Este campo é de preenchimento obrigatório!', remote: 'O E-mail inserido já existe!' },
//                                                 Nif:{ required: 'Este campo é de preenchimento obrigatório' remote: 'O E-mail inserido já existe!' }},
				});
			});
            	

		</script>
                
	</head>
<body>


  <div >
        
        
        <br><br> <br><br>
        
      
        
        <form action="InserirReg1.php" method="post" id="meu_form">
            
    
    

<fieldset>
<legend>Registar Utilizador</legend>
  <fieldset>Consumidor   <input type="radio" name="Tipo" value="Consumidor"><br>
 Comerciante   <input type="radio" name="Tipo" value="Comerciante"><br></fieldset><br>
 Nif:<br>
 <input type="text" name="Nif" maxlength="9" size="100" ><br>
Nome:<br>
 <input type="text" name="Nome" size="100"><br>
E-mail:<br>
 <input type="text" name="email" size="100"><br>
 Localidade:<br>
<input type="text" name="Localidade" size="100"><br>
Data de Nascimento:<br>
 <input type="date" name="Data" size="100"><br>
 Nome de Negócio:<br>
<input type="text" name="Negocio" size="100"><br>
Sua Password:<br>
<input type="text" name="pass" size="100" value="<? print $Password?>"><br>

</fieldset>


Será-lhe gerada uma Password automaticamente, deverá alterá-la logo de seguida!<br>
<input type="submit" >
</form> 
  </div>

    
    
</body>
</html>


