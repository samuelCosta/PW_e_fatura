<?php

include "Funcoes.php";
include "conexao.php";
global $con;


$query= mysqli_query($con, "Select utilizador_Nif, Tipo_utilizador from consumirdo_comer where utilizador_Nif={$_SESSION['username']} and Tipo_utilizador= 'Comerciante'");
$row= mysqli_num_rows($query);


if($row>0){
    include "templatemo_372_titanium/topopagina_comer.php";
include "templatemo_372_titanium/Menu_comerc.php";}

else{
include "templatemo_372_titanium/topopagina1.php";
include "templatemo_372_titanium/Menu.php";}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel='stylesheet' type='text/css' href='style/style.css'/>
	<script src="scripts.js" type="text/javascript"></script>
	<script>
	
	var username=getCookie("username");
	if (username=="blue")
	{
	document.write( "<link rel='stylesheet' type='text/css' href='style/style.css'/>");
	}

  if (username=="black")
    {
    document.write( "<link rel='stylesheet' type='text/css' href='style/style2.css'/>");
    }
	


	//window.onload=checkCookie();
	</script>
	<script
            
src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAlLGMk8o6_VW8RWZJIXxb3RR-XyQBaw1Ca476EiHIlymc55cyKBSoGrEF3FChXDKN5qG5zROf_8QbZg"
type="text/javascript"></script>
        <script type="text/javascript">
            var map = null;
            var geocoder = null;
            var from;
            var to;
            var directionsPanel = null;
            var directions = null;
            
            function inicializa() {
                if (GBrowserIsCompatible()) {
                    map = new GMap2(document.getElementById("mapa_base"));
                    map.setCenter(new GLatLng(41.1744386,  -8.58423561), 7);
                    geocoder = new GClientGeocoder();
                    map.addControl( new GSmallMapControl() );
                    map.addControl( new GMapTypeControl() );
                    directionsPanel = document.getElementById("route");
                    directions = new GDirections(map, directionsPanel);
                    
                  }
            }
    
            function gerarRota(){
			
				for (var i = 0; i < document.getElementsByName('group1').length; i++){
					if (document.getElementsByName('group1')[i].checked){
						ch = document.getElementsByName('group1')[i].value;
					}
				}
					
                from = document.getElementById("partida").value;
                to = ch;
				
				
                if ( geocoder ) {
                    geocoder.getLatLng(from, 
                        function(point){ 
                            if ( !point ) {
                                alert(from + " não encontrado");
                            } 
                        }
                    );
                    geocoder.getLatLng(to, 
                        function(point){
                            if ( !point ) {
                                alert(to + " não encontrado");
                            } 
                        }
                    );
                    
                    var string = "from: " + from + " to: "+to;
                    directions.clear();
                    directions.load(string);
                    GEvent.addListener(directions, "error", erroGetRoute);
                } else {
                    alert("GeoCoder não identificado");
                }
            }
            
            //function erroGetRoute(){
               // alert("Não foi possivel traçar a rota de: " + from + " para: " + to );
            //}
            
            
    </script>
<style type="text/css">
	p{
	text-align: justify;
	font-style: italic;
}
	href{
		text-align:center;
		}
	.titulos {
	font: normal 175% 'century gothic', arial, sans-serif;
color: #A4AA04;

}
.titulos2 {
	font: normal 100% 'century gothic', arial, sans-serif;
	color: #A4AA04;
	font-size: 150%;
}

    .edit1 {
	font: normal 90% 'century gothic', arial, sans-serif;
color: #000
}
    #footer {
	font-style: italic;
}
    </style>
</head>

<body onload="inicializa()" onunload="GUnload()">
    
    <br> 
  
  <form id="form_mapa" action="#" method="get">
            <label for="partida">Localização actual</label> 
            <input type="text" name="partida" id="partida" size="50" />
			<br/>
                        <label for="partida">Destino:</label> <br>
                        
                        <input type="radio" name="group1" value="Braga, campus de gualtar">Braga <br>
			<input type="radio" name="group1" value="guimarães, universidade" checked> Guimarães
            <br />
            <input type="button" name="enviar" id="enviar" value="Obter Rota" onclick="gerarRota()"/>
        </form>
        <div id="mapa_base" style="width: 600px; height: 500px;"></div>
        <div id="route" ></div>
      </div>
    </div>
    
  </div>
</body>
</html>