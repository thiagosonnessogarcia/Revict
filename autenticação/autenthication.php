<?php 

$host = "localhost";
$user = "root";
$pass = "";
$banco = "revict";
$conexao = mysql_connect($host, $user, $pass) or die (mysql_error());
mysql_select_db($banco) or die(mysql_error());
?>

<?php

$email = md5($_POST['email']);
$senha = addcslashes(sha1($_POST)['senha']));
$sql = mysql_query("SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'") or die(mysql_error());
$row = mysql_num_rows($sql);

if ($row > 0) {
	session_start();
	$_SESSION['email']=$_POST['email'];
	$_SESSION['senha']=$_POST['senha'];
	echo "<center>Login realizado com Sucesso</center>";
	echo "<center>Voce será redirecionado para sua página</center>"
	echo "<script>loginsucessfully()</script)";
}else{
	echo "<center>Nome de Usuário ou senha Inválidos</center>";
	echo "Aguarde um instante para tentar novamente</center>";
	echo "<script>loginfailed()</script>";
}

?>