<?php

include "Funcoes.php";
include "conexao.php";
include "templatemo_372_titanium/topopagina1.php";


?>


   <div >
        
        
        <br><br> <br><br>
   <img src="templatemo_372_titanium/images/11.gif" width="50" height="50" align="right">
        <form enctype="multipart/form-data" action="Upload.php" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
Escolha o Ficheiro(1): <input name="arquivo" type="file" /><br><br>
<input type="submit" value="Enviar Fatura" />
        </form> </div><br>


        <hr> (1)A sua fatura terá de ser enviada com as seguintes:<br>
<ul>
    
    <li>O ficheiro não pode ser maior que 30000Kb</li>
    <li>Aceita-se ficheiros apenas com formato .txt</li>
    <li>Os Dados do ficheiro tem de apresentar o seguinte formato:</li>
    <ol>
        <li>Nif</li>
        <li>Nome</li>
      
        <li>Tipo de fatura</li>
        <li>Numero de Fatura</li>
        <li>Data de Emissão</li>
        <li>Setor de Actividade</li>
        <li>Total</li>
        <li>Taxa</li>
     </ol>
    <li>Os dados tem de ser separados por virgula</li>
    <li>Apenas pode ser registada uma fatura de cada vez</li>
     <li>Faça <a href="Download.php?arquivo=Fatura_Modelo.txt">aqui</a> download de um ficheiro modelo. </li>
    
  </ul>
        
        
        
    

</body>
</html>
