<?php

$host = "localhost";
$user = "root";
$pass = "";
$banco = "revict";
$conexao = mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($banco) or die(mysql_error());
?>

<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = addslashes(sha1($_POST['senha']));
$cpf = $_POST['cpf'];

$sql = mysql_query("INSERT INTO usuario(nome, email, senha, cpf) VALUES ('$nome', '$email', '$senha', '$cpf')");

echo "<center><h2>Cadastrado com Sucesso!!!</h2></center>";
header("Location: login.php");

?>