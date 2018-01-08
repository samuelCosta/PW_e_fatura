<?php

include "Funcoes.php";
include "conexao.php";
include "templatemo_372_titanium/topopagina2.php";


?>
  
  <div >
        
        
        <br><br> <br><br>
        
      
        
<form action="Registar_Utili_Admin.php" method="post">
    
    <legend>Registar Utilizador</legend>

<fieldset>

  <input type="radio" name="Tipo" value="Consumidor">Consumidor
 <input type="radio" name="Tipo" value="Comerciante">Comerciante<br>
 <input type="text" name="Nif">Nif<br>
<input type="text" name="Nome">Nome<br>
<input type="text" name="Email">E-mail<br>
<input type="text" name="Localidade">Localidade<br>
 <input type="text" name="Data">Data de Nascimento<br>
<input type="text" name="Negocio">Nome de Negócio<br>

</fieldset>


Será gerada uma Password automaticamente, deverá alterá-la logo de seguida!<br>
<input type="submit">
</form> 
  </div>

    
    
</body>
</html>


