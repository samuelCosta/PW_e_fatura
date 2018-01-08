<?php
include "conexao.php";
global $con;

$Link= mysqli_query($con, "select Link from utilizador where Nif={$_SESSION['username']}");
$exibir = mysqli_fetch_array($Link);
$exibirlink= $exibir['Link'];

?>


<!DOCTYPE html>
 
<html>
    
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-Fatura</title> </head>
    <body> 
    
<link href="templatemo_372_titanium/templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="templatemo_372_titanium/css/orman.css" type="text/css" media="screen" />
<link rel="stylesheet" href="templatemo_372_titanium/css/nivo-slider.css" type="text/css" media="screen" />	

<link rel="stylesheet" type="text/css" href="templatemo_372_titanium/css/ddsmoothmenu.css" />

<script type="text/javascript" src="templatemo_372_titanium/js/jquery.min.js"></script>
<script type="text/javascript" src="templatemo_372_titanium/js/ddsmoothmenu.js">
</script>

<script language="javascript" type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<link rel="stylesheet" href="templatemo_372_titanium/css/slimbox2.css" type="text/css" media="screen" /> 
<script type="text/JavaScript" src="templatemo_372_titanium/js/slimbox2.js"></script> 

</head>
<body>

<div id="templatemo_wrapper">
	<div id="templatemo_header">
    	<div id="site_title"><a href="inicio_comer.php">E-fatura</a></div>
    	<div id="templatemo_search">
            
             <?print "<a href='Alterafotoform.php'>
<img src='$exibirlink' width='100' height='100' align='right'> </a></p>"?>
            <form action="Logout.php" method="get">
            

                
                
           
                
              <input type="submit" name="Sair" value="Encerrar Sessão" />
            </form>
        </div>
    </div><!-- END of templatemo_header -->
    
     
