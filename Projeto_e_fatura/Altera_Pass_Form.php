<?php

include "Funcoes.php";
include "conexao.php";
global $con;

$query= mysqli_query($con, "Select utilizador_Nif, Tipo_utilizador from consumirdo_comer where utilizador_Nif={$_SESSION['username']} and Tipo_utilizador= 'Comerciante'");
$row= mysqli_num_rows($query);


if($row>0){
    include "templatemo_372_titanium/topopagina_comer.php";
include "templatemo_372_titanium/Menu_comerc.php";}

else{
include "templatemo_372_titanium/topopagina1.php";
include "templatemo_372_titanium/Menu.php";}


?>


   <div >
        
        
        <br><br> <br><br>
        <form action="Pass_Alterada.php" method="post">
    
    
<fieldset>
<legend>Alterar Password</legend>

<input type="password" name="NewPass" />Introduza Password Antiga<br>
<input type="password" name="Novapass" />Introduza Nova Password<br>

</fieldset>
    <input type="submit">


</form> </div>

</body>
</html>
