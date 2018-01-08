<?php
include "templatemo_372_titanium/topopagina.php";
include "conexao.php";
include "Funcoes.php";




?>
<html>
<head>

<script language="javascript" type="text/javascript">
function validar() {
var username = form1.username.value;

var password = form1.password.value;

    
 


if (username == ""& (event.keyCode<48 || event.keyCode>57 ) ){
alert('Campo Nif de preenchimento obrigatório!');
form1.username.focus();
return false;
}



if (password == "") {
alert('Campo Password de preenchimento obrigatório!');
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
        <form name="form1" action="Loginvalido.php" method="post"  >
    
    
<fieldset>
<legend>Login</legend>
<img src="templatemo_372_titanium/images/mouse.gif" width="75" height="75" align="left" >
<input type="text" name="username" onKeypress="return verifica() "maxlength="9" />NIF
 <br />
<input type="password" name="password" />Password<br>
<input type="radio" name="select" value="Consumidor" CHECKED/>Consumidor
<input type="radio" name="select" value="Comerciante"/>Comerciante<br>

</fieldset>
  <input onclick="return validar()" type="image" src="templatemo_372_titanium/images/1.jpeg" width="30" height="20"  >

    <br><br>
Ainda não está registado? Efectue<a href="Registar1.php"> aqui</a> o seu registo.<br>
É Administrador? Efectue <a href="Login_administrador.php">aqui</a> o seu Login!
<hr>
<a href="Recuperar_pass_form.php"> Perdeu a sua Password? </a><br>






</form> </div>

</body>
</html>
