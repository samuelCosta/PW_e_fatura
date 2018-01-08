<?php
include "conexao.php";
global  $con;
	
	$email = $_GET['email'];
       
	
	
	
	    $sql=mysqli_query($con, "Select email from consumirdo_comer where email= '$email' ");
        $array=  mysqli_fetch_array($sql);
        $arrayy=$array['email'];
        
        
                
	if( $email == $arrayy )
		
		echo 'false';
	else
		echo 'true';
	exit();
        
        
    
        
        
	
        
        
    ?>