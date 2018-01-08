<?php

include "Funcoes.php";
include "conexao.php";
include "templatemo_372_titanium/topopagina2.php";


?>


   <div >
        
        
        <br><br> <br><br>
<form action="Alterar.php" method="post">
    
    
<fieldset>
<legend>Alterar Dados </legend>
<input type="text" name="Nif" />Confirme o seu NIF
 <br />
 
 

<hr> *Preencha os Passos seguintes para efectura a alteração.<br>

<input type="text" name="AlteraNegocio" />Alterar Tipo de Negocio
 <br />
 <input type="text" name="AlteraTipo" />Alterar Tipo Utilizador
 <br />
 <input type="text" name="Alteraemail" />Alterar E-mail


</fieldset>
    <input type="submit">


</form> </div>

</body>
</html>
