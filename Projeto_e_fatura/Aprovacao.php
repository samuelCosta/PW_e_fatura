<?php
include "Funcoes.php";
include "Conexao.php";
include "templatemo_372_titanium/topopagina2.php";
include "templatemo_372_titanium/Menu_admin.php";


Aprovacao();

echo "<br><br><br>";


?>


<div >
        
        
        <br><br> <br><br>
<form action="Aceitar_Aprov.php" method="post">
    
    
<fieldset>
<legend>Aprovar Utilizador </legend>

<input type="text" name="Nif"/>Identifique o Nif pra Aprovação<br>
<hr>
<select name= "valor">
<option value="1">
------Aprovar Utilizador------
</option>
<option value="0">
---------Não Aprovar----------
</option>
</fieldset>
    <input type="submit">


</form> </div>

</body>
</html>



