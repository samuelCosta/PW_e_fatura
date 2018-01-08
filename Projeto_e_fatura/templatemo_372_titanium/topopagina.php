<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<!DOCTYPE html>
 
<html>
    
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-Fatura</title>
    <script type="text/javascript" src="templatemo_372_titanium/js/validacao.js"> </script>
<script src="templatemo_372_titanium/js/jquery.js" type="text/javascript"></script>
 <script src="templatemo_372_titanium/js/jquery.validate.js" type="text/javascript"></script>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
 

        <script type="text/javascript">
$(document).ready( function() {
	$('#bb').validate({
		/* REGRAS DE VALIDAÇÃO DO FORMULÁRIO */
		rules:{
			username:{
				// campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true, minlength: 9
			},
			password:{
				// campoEmail será obrigatório (required) e precisará ser um e-mail válido (email)
				required: true, minlength:6
		},
		/* DEFINIÇÃO DAS MENSAGENS DE ERRO */
		messages:{
			username:{
				required: "Insira o seu Nif",
				minLength: "Nif Inválido! O Nif deve conter 9 digitos!"
			},
			password:{
				required: "Insira a sua Password",
				minlength: "Password Inválida !(deve conter no minimo 6 caracteres)"
                        }
		}
	});
        });</script>
    
        
     
        
        
        </script>
        
    
    </head>
   <body background="templatemo_372_titanium/fundo/imagem1.jpeg"> 
    
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
    	<div id="site_title"><a href="index.php">E-fatura</a></div>
    	
            
      
    </div><!-- END of templatemo_header -->