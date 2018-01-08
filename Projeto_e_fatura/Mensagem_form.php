<?php

include "Funcoes.php";
include "conexao.php";
include "templatemo_372_titanium/topopagina2.php";
include "templatemo_372_titanium/Menu_admin.php";


?>


   <div >
        
        
        <br><br> <br><br>
        <form action="Mensagem.php" method="post">
    
    
<fieldset>
<legend>Enviar Notificação</legend>

Insira o Nif <input type="text" name="nif" />   ID<input type="text" name="numero" />
<br><hr>
<img src="templatemo_372_titanium/images/122.gif" width="75" height="75" align="right">
<textarea name="sms" rows="10" cols="40"></textarea>
 <br />
 

</fieldset>
    <input type="submit">


</form> </div>

</body>
</html>
