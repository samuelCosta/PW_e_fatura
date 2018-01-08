<?php

include "Conexao.php";
include "topopagina.php";



global $con;


$func = $con;

$nsetor= $_POST['numero'];
   
  $numsetor= mysqli_query($func, "Select cod_sector from fatura where cod_sector= '$nsetor'");
  $conta= mysqli_num_rows($numsetor);
  
  if($conta >0){ 
      
      if($conta == 0){echo "Nenhum valor inserido";}
      
      
      
      
      echo "<br><br><br><br>Existe " .$conta. " faturas com o setor que você procurou!";}
   
      
?>
