

<?php
include 'conexao.php';


$func = $con;
  
    $aprovar = mysqli_query($func, "SELECT * FROM linha_fatura");
     $num = mysqli_num_rows( $aprovar);
 
   if ($num > 0) {
       
        echo $num;}
        
        
        
        //-----------------------------------------------------
        
        
  $procura= mysqli_query($func, "SELECT * From fatura where Nif_consum is not null") ;
  $nume= mysqli_num_rows($procura);
  
  if($nume>0){ 
      
      echo $nume;}
      
      
      //----------------------------------------------------
      
   
      
      
      
      
      
        
        
?>
      
