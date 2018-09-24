<!DOCTYPE html>
<html>
<head>
	<title>Cadastrando Usuário</title>
</head>
<body>
<?php

$host = "localhost";
$user = "root";
$pass = "";
$banco = "revict";
$conexao = mysql_connect($host, $user, $pass) or dir(mysql_error());
mysql_select_db($banco) or die(mysql_error());
?>

<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = addslashes(sha1($_POST['senha']));
$cpf = $_POST['cpf'];
$valordivida = $_POST['valordivida'];
$saldo = $_POST['saldo'];

$sql = mysql_query("INSERT INTO usuario(nome, email, senha, cpf, valordivida, saldo) VALUES ('$nome', '$email', '$senha', '$cpf', '$valordivida', '$saldo')");

echo "<center><h2>Cadastrado com Sucesso!!!</h2></center>";
header("Location: login.php");

?>

</body>
</body>
</html>











<?php 
 
$connect = mysql_connect('localhost','','');
$db = mysql_select_db('revict');

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = MD5($_POST['senha']);
$cpf = $_POST['cpf'];
$valordivida = $_POST['valordivida'];
$saldo = $_POST['saldo'];

$query_select = "SELECT email FROM clientes WHERE email = '$email'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array['email'];
 
  if($email == "" || $email == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo email deve ser preenchido');window.location.href='cadastro.html';</script>";
 
    }else{
      if($logarray == $email){
 
        echo"<script language='javascript' type='text/javascript'>alert('Esse email já existe');window.location.href='cadastro.html';</script>";
        die();
 
      }else{
        $query = "INSERT INTO clientes (email,senha) VALUES ('$email','$senha')";
        $insert = mysql_query($query,$connect);
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login_cloud.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='register_page.html'</script>";
        }
      }
    }
?>