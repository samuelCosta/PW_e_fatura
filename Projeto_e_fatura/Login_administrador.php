<?php

include "Funcoes.php";
include "conexao.php";
include "templatemo_372_titanium/topopagina.php";


?>
<html>
<head>

<script language="javascript" type="text/javascript">
function validar() {
var username = form1.numero.value;

var password = form1.senha.value;

    
 


if (username == "" & (event.keyCode<48 || event.keyCode>57 ) ){
alert('Campo Numero de preenchimento obrigatório!');
form1.username.focus();
return false;
}



if (password == "") {
alert('Campo Senha de preenchimento obrigatório!');
form1.password.focus();
return false;
}



if (username.length < 9) {
alert('Nif Incorreto! O seu Nif terá de ser composto por 9 digitos!');
form1.password.focus();
return false;
}


}

function verifica()
   {
     if ((event.keyCode<44)||(event.keyCode>57)){
       if ((event.keyCode<96)||(event.keyCode>106)){
          alert("O Nif apenas pode conter digitos de 0-9!");
          event.returnValue = false; 
       }
     }
   }

</script>



</script>
</head>
<body>

   <div >
        
        
        <br><br> <br><br>
<form action="Loginvalido_Admin.php" method="post" name="form1">
    
    
<fieldset>
<legend>Login</legend>
<img src="templatemo_372_titanium/images/mouse.gif" width="75" height="75" align="left">
<input type="text" name="numero" onKeypress="return verifica()" />Numero ID
 <br />
<input type="password" name="senha" />Password<br>
<br>

</fieldset>
    <input type="submit" onclick="return validar()">


</form> </div>

</body>
</html>
