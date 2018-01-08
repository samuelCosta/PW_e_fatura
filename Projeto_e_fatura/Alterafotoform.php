<?php

include "Funcoes.php";
include "conexao.php";
global $con;
esta_logado();
$query= mysqli_query($con, "Select utilizador_Nif, Tipo_utilizador from consumirdo_comer where utilizador_Nif={$_SESSION['username']} and Tipo_utilizador= 'Comerciante'");
$row= mysqli_num_rows($query);


if($row>0){
    include "templatemo_372_titanium/topopagina_comer.php";
}

else{
include "templatemo_372_titanium/topopagina1.php";
}?>
<br><br><br><br><br><br><br>

    <form method="post" enctype="multipart/form-data" action="UploadFoto.php">
       Selecione uma imagem: <input name="arquivo" type="file" />
       <br />
       <input type="submit" value="Salvar" />
    </form>
        