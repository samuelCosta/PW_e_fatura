<?php
include "Funcoes.php";
include "Conexao.php";
global $con;

$query= mysqli_query($con, "Select utilizador_Nif, Tipo_utilizador from consumirdo_comer where utilizador_Nif={$_SESSION['username']} and Tipo_utilizador= 'Comerciante'");
$row= mysqli_num_rows($query);


if($row>0){
    include "templatemo_372_titanium/topopagina_comer.php";
include "templatemo_372_titanium/Menu_comerc.php";}

else{
include "templatemo_372_titanium/topopagina1.php";
include "templatemo_372_titanium/Menu.php";}



$Nifcomer= $_POST['Nifc'];
$Nifconsum= $_POST['Nifcm'];

$Nif= $_POST['Nif'];

$Nome= $_POST['Nome'];
$Tipo= $_POST['Tipo'];
$Numero= $_POST['Numero'];
$Data= $_POST['Data'];
$Setor= $_POST['Setoractividade'];


$admin=  mysqli_query($con, "Select DATa from DATa");
$array=  mysqli_fetch_array($admin);
$valordia= $array['DATa'];

$datactual= date ("Y-m-d");


$linha= explode ("-", $Data);

$linhafim=$linha[1]+1;
$anofim=$linha[0];

$data_fim= $valordia.'-'.$linhafim.'-'.$anofim;

if($datactual>$data_fim){
    
    mysqli_query($con,"Insert into coima (valor_coima, Nif) values ('50', $Nif )");
    mysqli_query($con,"Insert into Mensagem (Nif, Mensagem) values ($Nif, 'Devia ter inserido a sua fatura até $data_fim, vá ao separador Minhas Coimas para visualizar as suas irregularidades' )");

    
  } else {
      
      
       mysqli_query($con,"Insert into coima (valor_coima, Nif) values ('0', $Nif )");
      
  }







$bloqueado= mysqli_query($con, "Select cod_previlegio, NifB, Bloqueado, utilizador_Nif from consumirdo_comer, previlegios where cod_previlegio=1 and NifB={$_SESSION['username']} and Bloqueado=1 and utilizador_Nif= {$_SESSION['username']}");
$row7= mysqli_num_rows($bloqueado);

if($row7 > 0){
    
   echo "<script language='javascript'>";
	echo "alert('Neste Momento os seus registos encontram-se bloqueados!')";
        echo "</script>"; 

  

$query= mysqli_query($con, "Select utilizador_Nif, Tipo_utilizador from consumirdo_comer where utilizador_Nif={$_SESSION['username']} and Tipo_utilizador= 'Comerciante'");
$row2= mysqli_num_rows($query);


if($row2>0){
  echo('<meta http-equiv="refresh" content="0;URL= inicio_comer.php ">');}

else{
echo('<meta http-equiv="refresh" content="0;URL= inicio_c.php ">');}
        
        
        

} 
else{




$insere= "INSERT INTO fatura (Nif_comer, Nif_consum, Nif, Nome, Tipo_fatura, Numero_fatura, cod_sector, Data_emissao, Nifid, Data_coima)
VALUES ('$Nifcomer', '$Nifconsum' ,'$Nif', '$Nome', '$Tipo', '$Numero', '$Setor', '$Data', $Nif, '$data_fim')";
$inserer = mysqli_query($con, $insere);

$Beneficiotot= mysqli_query($con, "Select sum(Beneficio) from fatura where Nif = $Nif");
while($valor = mysqli_fetch_array($Beneficiotot)){
	$valorbenificio = $valor['sum(Beneficio)'];
	}
        
   $inserirc= "Update consumirdo_comer, fatura Set Beneficio_Total=$valorbenificio Where utilizador_Nif = Nif";
mysqli_query($con, $inserirc);
}




 
     
?>

<head>
		<title></title>
                 
	
		<!-- Inclus�o do Jquery -->
		<script type="text/javascript" src="jquery.min.js" ></script>
		<!-- Inclus�o do Jquery Validate -->
		<script type="text/javascript" src="jquery.validate.js" ></script>
                
                
              
		
<!--		 Valida��o do foruml�rio 
-->		<script type="text/javascript">
			$(document).ready(function(){
                             
				$('#linha').validate({
					rules:{ 
						 
                                                       Total:{ required: true, digits:true, number:true },
                                               Taxa:{ required: true, digits:true, number:true}
                                                 },
					messages:{
						
                                                Total:{ required: '✖', digits: "✖" },
                       
                                               
                                               Taxa:{ required: '✖', digits:"✖"}}
//					email:{ required: 'Este campo é de preenchimento obrigatório!', remote: 'O E-mail inserido já existe!' },
//                                                 Nif:{ required: 'Este campo é de preenchimento obrigatório' remote: 'O E-mail inserido já existe!' }},
				});
			});
            	</script>
               
                
           
<script>  
$(function()
{
	
	/* Quando o botão adicionar for clicado... */
	$('input#add').click(function()
	{
		
		
		var linha = $('tbody#repetir tr').html();
		
		/* Acrescenta uma nova linha */
		$('tbody#repetir').append('<tr>' + linha + '</tr>');
		
	});
	
});

$(document).ready( function() {
		
		$('#total, #taxa').blur(function(){
			var total 	= $('#total').val(); 
			var taxa = $('#taxa').val(); 
                        
			
			if(total == "") total = 0;
			if(taxa == "") taxa = 0;
			
			var resultado 	= parseFloat(total) * (parseFloat(taxa)/100);
			$('#resultado').val(resultado);
                        var baseT	= parseFloat(total) - parseFloat(resultado);
			$('#baseT').val(baseT);
		})
		 
	});
</script>




                
                
	</head>
<body>



<div id="base">

  
        
        
        
        
        
        <br><br> <br><br>
        
    
            
<form action="InserirLinha.php" method="post" id="linha" >
 
 <table cellpadding="4" cellspacing="0" border="1">
        <thead>
            <tr>
                <td>Numero</td>
                <td>Total</td>
                <td>Taxa</td>
                <td>Iva</td>
                <td>Base Tributável</td>
            </tr>            
        </thead>
        <tbody id="repetir">
            <tr>
                <td><input type="text" name="Numero" value="<? print $Numero?>" /></td>
                <td><input type="text" name="Total" value="" id="total"/>€</td>
                <td><input type="text" name="Taxa" value="" id="taxa" />%</td>
                 <td><input type="text" name="" value="" id="resultado" />€</td>
                  <td><input type="text" name="" value="" id="baseT" />€</td>
            </tr>
        </tbody>
        <tfoot>
         
       
            
        </tfoot>
    </table>    <input type="button" value="Adicionar Linha" id="add" />
                
        <input type="submit" value="Registar Fatura" />
    




</form ></div>




</body>
</html>



    