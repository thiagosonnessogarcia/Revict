<?php

$servername = "localhost";
$database = "revict";
$username = "root";
$password = "";


$conn = mysqli_connect($servername, $username, $password, $database);
?>

<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = addslashes(sha1($_POST['senha']));
$cpf = $_POST['cpf'];

$sql = "INSERT INTO usuario (nome, email, senha, cpf) VALUES ('$nome', '$email', '$senha', '$cpf')";

echo "<center><h2>Cadastrado com Sucesso!!!</h2></center>";
header("Location: ../login/login.html");

?>