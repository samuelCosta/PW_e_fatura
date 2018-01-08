<?php
include "conexao.php";
include "Funcoes.php";
global  $con;

$query= mysqli_query($con, "Select utilizador_Nif, Tipo_utilizador from consumirdo_comer where utilizador_Nif={$_SESSION['username']} and Tipo_utilizador= 'Comerciante'");
$row= mysqli_num_rows($query);


if($row>0){
    include "templatemo_372_titanium/topopagina_comer.php";
include "templatemo_372_titanium/Menu_comerc.php";}

else{
include "templatemo_372_titanium/topopagina1.php";
include "templatemo_372_titanium/Menu.php";}




if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0)
{
 
    echo "Você enviou o arquivo: <strong>" . $_FILES['arquivo']['name'] . "</strong><br />";
    echo "Este arquivo é do tipo: <strong>" . $_FILES['arquivo']['type'] . "</strong><br />";
    echo "Temporáriamente foi salvo em: <strong>" . $_FILES['arquivo']['tmp_name'] . "</strong><br />";
    echo "Seu tamanho é: <strong>" . $_FILES['arquivo']['size'] . "</strong> Bytes<br /><br />";
 
    $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
    $nome = $_FILES['arquivo']['name'];
     
 
    // Pega a extensao
    $extensao = strrchr($nome, '.');
 
    // Converte a extensao para mimusculo
    $extensao = strtolower($extensao);
 
    // Somente imagens, .jpg;.jpeg;.gif;.png
    // Aqui eu enfilero as extesões permitidas e separo por ';'
    // Isso server apenas para eu poder pesquisar dentro desta String
    if(strstr('.jpg;.jpeg;.gif;.png', $extensao))
    {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        $novoNome = md5(microtime()) . $extensao;
         
        // Concatena a pasta com o nome
        $destino = 'templatemo_372_titanium/images' . $novoNome; 
         mysqli_query($con,"UPDATE utilizador SET Link ='$destino' where Nif={$_SESSION ['username']}");
        // tenta mover o arquivo para o destino
        if( @move_uploaded_file( $arquivo_tmp, $destino  ))
        {
            echo "Arquivo salvo com sucesso em : <strong>" . $destino . "</strong><br />";
            echo "<img src=\"" . $destino . "\" />";
        }
        else
            echo "Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />";
    }
    else
        echo "Você poderá enviar apenas arquivos \"*.jpg;*.jpeg;*.gif;*.png\"<br />";
}
else
{
    echo "Você não enviou nenhum arquivo!";
}