<?php

include "Funcoes_consulta.php";
include "conexao.php";
include "Beneficio_consulta.php";
include "topopagina.php";
?>
<div >
   <br><br> <br><br>
        
      <?php
      
      
      
      echo "<h3> Em Portugal estão registadas " .$num. " faturas.</h3> <hr>";
      echo "<h3> Em Portugal estão registadas " .$nume. " faturas com Nif associado.</h3> <hr>";
     
      ?>
        
        
   <br>
        
   
   <fieldset> <legend>Consulte aqui o numero total de faturas por setor de actividade:</legend>
   
   <form action="Consulta_setor.php" method="post">
           <select name= "numero">
<option value="1">
Manutenção e reparação de veículos automóveis
</option>
<option value="2">
Manutenção e reparação de motociclos, de suas peças e acessórios
</option>
<option value="3">
Alojamento, restauração e similares
</option>
<option value="4">
Atividade de salões de cabeleireiro e institutos de beleza
</option>
</select>
       <br>
       OU <br>
       
       <input type="text" name="numero">Insira Numero Sector<br>
            </fieldset>
<input type="submit" value="Procurar"></form>


 </div>
  
</body>
</html>

