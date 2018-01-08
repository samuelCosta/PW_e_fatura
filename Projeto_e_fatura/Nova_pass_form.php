<?php

include "Funcoes.php";
include "conexao.php";
global $con;
esta_logado();
include "templatemo_372_titanium/topopagina.php";


?>


   <div >
        
        
        <br><br> <br><br>
    
        
        
        
        
        <form action="Nova_Pass.php" method="post">
    
    
<fieldset>
<legend>Alterar Password</legend>
<input type="password" name="PA" />Introduza a sua Password Actual
 <br />

<input type="password" name="PN" />Introduza a Nova Password
 <br />
 <input type="password" name="PN1" />Confirme a nova Password
 


</fieldset>
    <input type="submit" value="Alterar">


</form> </div>

</body>
</html>
