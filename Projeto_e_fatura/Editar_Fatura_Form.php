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
<form action="Editar_fatura.php" method="post">
    
    
<fieldset>
<legend>Editar Fatura</legend>
<input type="text" name="ValidarNumero" />Confirme o numero da Fatura
 <br />

<input type="text" name="AlteraTipof" />Alterar Tipo de Fatura
 <br />
 <input type="text" name="AlteraControlo" />Alterar Codigo Controlo
 <br />
 <input type="date" name="Alteradata" />Alterar Data de Emissão
 <br />
 <input type="text" name="AlteraTotal" />Alterar Total
 <br />
 <input type="text" name="AlteraTaxa" />Alterar Taxa
 <br />
 <select name="Alteracodigo">
<option value="1">
Manutenção e reparação de veículos automóveis
</option>
<option value="2">
Manutenção e reparação de motociclos, de suas peças e acessórios
</option>
<option value="3">
Alojamento, restauração e similares
</option>
<option value="4">
Atividade de salões de cabeleireiro e institutos de beleza
</option>
</select>


</fieldset>
    <input type="submit">


</form> </div>

</body>
</html>
