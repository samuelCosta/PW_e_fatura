<?php
include "conexao.php";
include "funcoes.php";


function AlterarPass(){
    
    $coexa= $con;
    $pass=$_POST['Password'];
    $find= "UPDATE utilizador SET password='$pass'";
    $sql= mysqli_query($coexa, $find);
    
    if(isSet($_SESSION)){ $sql;}
    
}
    
    




?>
