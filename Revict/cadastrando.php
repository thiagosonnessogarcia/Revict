<?php 
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
  
    include_once 'conexao.php';    
      
    $sql = "INSERT INTO cliente VALUES (null,
            '".$nome."','".$email."','".$tel."')";
    //echo $sql;
      
    if(mysql_query($sql,$con)){
        $msg = "Gravado com sucesso!";
    }else{
        $msg = "Erro ao gravar!";
    }
    mysql_close($con);    
?>