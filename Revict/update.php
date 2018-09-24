<?php
  
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    
    include_once 'conexao.php';    
      
    $sql = "UPDATE cliente SET 
            nome = '".$nome."', email = '".$email."',telefone = '".$tel."'
            WHERE id = .$id";
  
    if(mysql_query($sql,$con)){
        $msg = "Atualizado com sucesso!";
    }else{
        $msg = "Erro ao atualizar!";
    }
    mysql_close($con);    
      
    ?>