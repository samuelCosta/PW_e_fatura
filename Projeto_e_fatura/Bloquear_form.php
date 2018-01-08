<?php
include "Funcoes.php";
include "Conexao.php";
include "templatemo_372_titanium/topopagina2.php";
include "templatemo_372_titanium/Menu_admin.php";




echo "<br><br><br>";


?>


<div >
        
        
        <br><br> <br><br>
        <form action="BloqueioOK.php" method="post">
    
    
<fieldset>
<legend>Bloquear Utilizador </legend>

<input type="text" name="nif"/>Identifique o Nif<br>
<hr>
<select name= "bloquear">
<option value="1">
------Bloquear Utilizador------
</option>
<option value="0">
-----Desbloquear Utilizador----
</option>
</fieldset>
    <input type="submit">


</form> </div>

</body>
</html>



<?php bloquear();?>