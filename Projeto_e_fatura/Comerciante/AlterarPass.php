<?php
session_start();
include "Conexao.php";
include "Funcoes.php";



$coexa= $con;
    
    $pass=$_POST['Password'];
    $find= "UPDATE utilizador SET password='$pass'";
    $sql= mysqli_query($coexa, $find);
    
    if(isSet($_SESSION)){ echo "ok";} else {echo "erro";}
    
    
    ?>