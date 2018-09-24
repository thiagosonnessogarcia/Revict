<?php
    $id = $_GET["id"];
    include_once 'conexao.php';
      
    $sql = "delete from cliente where idcliente = ".$id;
      
    if(mysql_query($sql,$con)){
        $msg = "Deletado com sucesso!";
    }else{
        $msg = "Erro ao deletar!";
    }
    mysql_close($con);    
      
    ?>