<?
$obj_mysqli = new mysqli("localhost", "root", "tutocrudphp");

if ($obj_mysqli->connect_errno) 
{
	echo "Ocorreu um Erro na conexão com o Banco de Dados";
	exit;
}

mysqli_set_charset($obj_mysqli, 'utf8');

//Incluindo um cód aqui...
$id = -1;
$nome = "";
$email = "";
$cpf = "";
$valorDivida = "";
$saldo = "";

//Validando Esencias de Dados
if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["cpf"]) && isset($_POST["valorDivida"] && isset($_POST["saldo"])))
{
	if (empty($_POST["nome"]))
		$erro = "Campo Nome Obrigatório";
	else
	if(empty($_POST["email"]))
		$erro = "Campo e-mail obrigatório";
	else
	{
		// Vamos realizar o cadastro ou alteração de dados enviados
		$id = $_POST["id"];
		$nome = $_POST["nome"];
		$email = $_POST["email"];
		$cpf = $_POST["cpf"];
		$valorDivida = $_POST["valorDivida"];	
		$saldo = $_POST["saldo"];

		$stmt = $obj_mysqli->prepare("INSERT INTO 'cliente' ('nome', 'email', 'cpf', 'valorDivida', 'saldo') VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param('ssss', $nome, $email, $cpf, $valorDivida, $saldo);

		if(!$stmt->execute())
		{
			$erro = $stmt->error;
		}
		else
		{
			header("Location:cadastro.php");
			exit;
		}
	}
	//se não vamos realizar a alteração dos dados.
	else
	if (is_numeric($id) && $id >= 1) 
	{
		$stmt = $obj_mysqli->prepare("UPDATE 'cliente' SET 'nome'=?, 'email'=?, 'cpf'=?, 'valorDivida'=?, 'saldo'=?, WHERE id = ?");
		$stmt = $bind_param('ssssi', $nome, $email, $cpf, $valorDivida, $saldo, $id);

		if(!$stmt->execute())
		{
			$erro = $stmt->error;
		}
		else
		{
			header("Locantion:cadastro.php");
			exit;
		}
	}
	//retorna um erro
	else 
	{
		$erro = "Numero inválido";
	}
}
}
else
	//incluimos essse bloco para verificar a existencia do ID
if(isset($_GET["id"]) && is_numeric($_GET["id"]))
{
	//pegamos aqui o que será realizado
	$id = (int)$_GET["id"];

	if(isset($_GET["del"]))
	{
		$stmt = $obj_mysqli->prepare("DELETE * FROM 'cliente' WHERE id = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();

		header("Location:cadastro.php");
		exit;
	}
	else
	{
	//montamos a consulta queserá realizada
	$stmt = $obj_mysqli->repare("SELECT * FROM 'cliente' WHERE id = ?");
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$result = $stmt->get_result();
		$aux_query = $result->fetch_assoc();

	$nome = $aux_query["Nome"];
	$email = $aux_query["Email"];
	$cpf = $aux_query["cpf"];
	$valorDivida = $aux_query["valorDivida"];
	$saldo = $aux_query["saldo"];

	$stmt->close();
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP</title>
</head>
<body>
	<?php
		if (isset($erro)) 
			echo '<div style="color:#f00">'.$erro.'</div><br/><br/>';
		else
		if (isset($sucesso))
			echo '<div style="color:#00f">'.$sucesso.'</div><br/><br/>';
	?>
	<form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
		Nome: <br />
		<input type="text" name="nome" placeholder="Qual seu Nome?"><br /><br />
		E-mail: <br />
		<input type="e-mail" name="mail" placeholder="Qual seu E-mail?"><br /><br />
		CPF: <br />
		<input type="text" name="cpf" placeholder="Qual sua cpf?"><br /><br />
		valorDivida: <br />
		<input type="text" name="valorDivida" placeholder="Qual sua valorDivida?"><br /><br />
		saldo: <br />
		<input type="text" name="saldo" placeholder="saldo?"><br /><br />

		<input type="hidden" value="<?=$id?>" name="id">
		<button type="submit"><?=($id==-1)?"Cadastrar":"Salvar"?></button>
	</form>
	<br>
	<br>
	<table width="400px" border="0" cellspacing="0">
		<tr>
			<td><strong>#</strong></td>
			<td><strong>Nome</strong></td>
			<td><strong>Email</strong></td>
			<td><strong>cpf</strong></td>
			<td><strong>valorDivida</strong></td>
			<td><strong>saldo</strong></td>
			<td><strong>#</strong></td>
		</tr>
	<?
	$result = $obj_mysqli->query("SELECT * FROM 'cliente'");
	while ($aux_query = $result->fetch_assoc())
	{
		echo '<tr>';
		echo ' <td>'.$aux_query["Id"].'</td>';
		echo ' <td>'.$aux_query["Nome"].'</td>';
		echo ' <td>'.$aux_query["Email"].'</td>';
		echo ' <td>'.$aux_query["cpf"].'</td>';
		echo ' <td>'.$aux_query["valorDivida"].'</td>';
		echo ' <Td>'.$aux_query["saldo"].'</td>';
		echo ' <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["Id"].'">Editar</a></td>';
		echo ' <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["Id"].&del=true">Excluir</a></td>";
		echo '</tr>';
	}
	?>
	</table>
</body>
</html>