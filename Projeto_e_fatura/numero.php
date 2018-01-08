
<?php
include "conexao.php";
global  $con;
	
	$numero = $_GET['Numero'];
       
	
	
	
	    $sql=mysqli_query($con, "Select Numero_fatura from fatura where Numero_fatura= $numero ");
        $array=  mysqli_fetch_array($sql);
        $arrayy=$array['Numero_fatura'];
        
        
                
	if( $numero == $arrayy )
		
		echo 'false';
	else
		echo 'true';
	exit();
        
        
    
        