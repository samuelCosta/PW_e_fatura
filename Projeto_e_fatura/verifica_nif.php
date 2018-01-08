<?php

include "conexao.php";
global  $con;
	
	$Nif = $_GET['Nif'];
       
	
	
	
	    $sql=mysqli_query($con, "Select Nif from utilizador where Nif=$Nif");
        $array=  mysqli_fetch_array($sql);
        $arrayy=$array['Nif'];
        
        
                
	if( $Nif == $arrayy )
		
		echo 'false';
	else
		
		echo 'true';
	exit();
        
        