<?
$obj_mysqli = new mysqli("localhost", "root", "revict");

if ($obj_mysqli->connect_errno) 
{
	echo "Ocorreu um Erro na conexão com o Banco de Dados";
	exit;
}

mysqli_set_charset($obj_mysqli, 'utf8');

//Incluindo um cód aqui...
$id = -1;
$nome = "";
$senha = "";
$cpf = "";

//Validando Esencias de Dados
<<<<<<< HEAD:CRUDS/cadastro.php
if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["cpf"])))
=======
if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["cpf"]))
>>>>>>> dd7745f5db75c155c1112f1d35951f6ec5d4aa1d:Crud/cadastro.php
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
<<<<<<< HEAD:CRUDS/cadastro.php
		$senha = $_POST["senha"];
		$cpf = $_POST["cpf"];	

		$stmt = $obj_mysqli->prepare("INSERT INTO 'cliente' ('id', 'nome', 'email', 'senha', 'cpf') VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param('ssss', $id, $nome, $email, $senha, $cpf, );
=======
		$cpf = $_POST["cpf"];

		$stmt = $obj_mysqli->prepare("INSERT INTO 'cliente' ('nome', 'email', 'cpf') VALUES (?, ?, ?)");
		$stmt->bind_param('ssss', $nome, $email, $cpf);
>>>>>>> dd7745f5db75c155c1112f1d35951f6ec5d4aa1d:Crud/cadastro.php

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
<<<<<<< HEAD:CRUDS/cadastro.php
		$stmt = $obj_mysqli->prepare("UPDATE 'usuario' SET 'id'=?, 'nome'=?, 'email'=?, 'senha'=?, 'cpf'=?, WHERE id = ?");
		$stmt = $bind_param('ssssi', $id, $nome, $email, $senha, $cpf);
=======
		$stmt = $obj_mysqli->prepare("UPDATE 'cliente' SET 'nome'=?, 'email'=?, 'cpf'=?, WHERE id = ?");
		$stmt = $bind_param('ssssi', $nome, $email, $cpf, $id);
>>>>>>> dd7745f5db75c155c1112f1d35951f6ec5d4aa1d:Crud/cadastro.php

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
		$stmt = $obj_mysqli->prepare("DELETE * FROM 'usario' WHERE id = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();

		header("Location:cadastro.php");
		exit;
	}
	else
	{
	//montamos a consulta queserá realizada
	$stmt = $obj_mysqli->repare("SELECT * FROM 'usuario' WHERE id = ?");
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$result = $stmt->get_result();
		$aux_query = $result->fetch_assoc();

	$nome = $aux_query["Nome"];
	$email = $aux_query["Email"];
<<<<<<< HEAD:CRUDS/cadastro.php
	$senha = $aux_query["cpf"];
	$cpf = $aux_query["valorDivida"];
=======
	$cpf = $aux_query["cpf"];
>>>>>>> dd7745f5db75c155c1112f1d35951f6ec5d4aa1d:Crud/cadastro.php

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
<<<<<<< HEAD:CRUDS/cadastro.php
		<input type="e-mail" name="mail" placeholder="Qual seu E-mail?"><br /><br />
		Senha: <br />
		<input type="password" name="Senha" placeholder="Qual sua Senha?"><br /><br />
		CPF: <br />
		<input type="text" name="cpf" placeholder="Qual sua cpf?"><br /><br />

=======
		<input type="e-mail" name="email" placeholder="Qual seu E-mail?"><br /><br />
		CPF: <br />
		<input type="text" name="cpf" placeholder="Qual sua cpf?"><br /><br />
	
>>>>>>> dd7745f5db75c155c1112f1d35951f6ec5d4aa1d:Crud/cadastro.php
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
			<td><strong>senha</strong></td>
			<td><strong>cpf</strong></td>
			<td><strong>#</strong></td>
		</tr>
	<?
	$result = $obj_mysqli->query("SELECT * FROM 'cliente'");
	while ($aux_query = $result->fetch_assoc())
	{
		echo '<tr>';
		echo ' <td>'.$aux_query["id"].'</td>';
		echo ' <td>'.$aux_query["nome"].'</td>';
		echo ' <td>'.$aux_query["email"].'</td>';
		echo ' <td>'.$aux_query["senha"].'</td>';
		echo ' <td>'.$aux_query["cpf"].'</td>';
<<<<<<< HEAD:CRUDS/cadastro.php
		echo ' <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["id"].'">Editar</a></td>';
		echo ' <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["id"].&del=true">Excluir</a></td>";
=======
		echo ' <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["Id"].'">Editar</a></td>';
		echo ' <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["Id"].&del=true">Excluir</a></td>";
>>>>>>> dd7745f5db75c155c1112f1d35951f6ec5d4aa1d:Crud/cadastro.php
		echo '</tr>';
	}
	?>
	</table>
</body>
</html>