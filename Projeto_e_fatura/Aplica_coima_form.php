<?php

include "Funcoes.php";
include "conexao.php";
include "templatemo_372_titanium/topopagina2.php";


?>


   <div >
        
        
        <br><br> <br><br>
<form action="Aplicar_coima.php" method="post">
    
    
<fieldset>
<legend>Aplicar Coima </legend>
<input type="text" name="nif" />Confirme o NIF
 <br />
 
 

<hr> *Preencha o campo abaixo para apliocar os valores da coima.<br>

<input type="text" name="id" />Identifique a Coima (Id)<br>
<input type="text" name="coima" />Insira o valor a aplicar<br>
<input type="date" name="data" />Insira a Data Limite de Pagamento
 <br />
 


</fieldset>
    <input type="submit">


</form> </div>

</body>
</html>
