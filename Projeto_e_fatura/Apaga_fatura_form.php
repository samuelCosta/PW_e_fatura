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
  
        <br><br> <br><br>

        <form action="Apaga_fatura.php" method="post">
    <fieldset>
<input type="text" name="numero">Insira o Numero da Fatura<br>

<input type="submit" value="Apagar">
</form>


</body>
</html>













