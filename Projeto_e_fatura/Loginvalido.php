<?php
include "Funcoes.php";
include "Conexao.php";
global $con;
login();
esta_logado();

$query= mysqli_query($con, "Select utilizador_Nif, Tipo_utilizador from consumirdo_comer where utilizador_Nif={$_SESSION['username']} and Tipo_utilizador= 'Comerciante'");
$row= mysqli_num_rows($query);

$alterou=mysqli_query($con, "Select * from utilizador where Nif={$_SESSION['username']} and Password=Nova_Pass");
$linha=  mysqli_num_rows($alterou);


if($linha>0){  echo('<meta http-equiv="refresh" content="0;URL= Nova_pass_form.php ">');
echo "Altere a sua password antes de aceder ao sistema!";}else{
    


if($row>0){
    include "templatemo_372_titanium/topopagina_comer.php";
include "templatemo_372_titanium/Menu_comerc.php";}

else{
    
    
include "templatemo_372_titanium/topopagina1.php";
include "templatemo_372_titanium/Menu.php";}

include "templatemo_372_titanium/Slider.php";


}








?>




