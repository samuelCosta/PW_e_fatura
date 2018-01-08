<?php

include 'conexao.php';
global $con;
$func = $con;


$pesquis = "SELECT sum(Beneficio) FROM fatura";
$pesquisa = mysqli_query($func, $pesquis);

	while($sum = mysqli_fetch_array($pesquisa)){
	$soma = $sum['sum(Beneficio)'];
	}
	//Mostrando o Resultado
	

        
//----------------------------------------------------------------------------------  
        
 
 $beneficio = "SELECT valor_beneficio FROM valor_beneficio";

$beneficios = mysqli_query($func, $beneficio);

while($valor = mysqli_fetch_array($beneficios)){
	$valorben = $valor[0];
	}
	//Mostrando o Resultado
	


	
	
 //---------------------------------------------------------------
         
         $Valor_beneficioTotal= $soma * $valorben;
         
         echo $Valor_beneficioTotal;
         
         
         
  //---------Mostra beneficio total com numero de contribuinte associado-----------------
         
         
   $proc=  "SELECT sum(Beneficio) From fatura where Nif is not null" ;
 $ValorBenNif = mysqli_query($func, $proc);

	while($sumatorio = mysqli_fetch_array($ValorBenNif)){
	$somar = $sumatorio['sum(Beneficio)'];
        
        
	}
        
        
        $Valor_beneficioNIF= $somar * $valorben;
         
         echo $Valor_beneficioNIF;
         
         
         
         
    //----------Beneficio Máximo-----------------------
         
         
         
         
       $BeneficioMax= mysqli_query($func, "select Beneficio_Total from consumirdo_comer where Beneficio_Total = 250");
       $TotalMax= mysqli_num_rows($BeneficioMax);
       
       if($TotalMax > 0){ echo $TotalMax;} 
       
         
         
         
         
         

        
        
  



?>
