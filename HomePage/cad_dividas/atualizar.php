<?php
session_start();
include("alterar.php");
	
	$id_cliente = $_GET["id_cliente"];
	
	$nomegasto= $_POST["nomegasto"];
	$divida= $_POST["divida"];
	
	$up = mysqli_query($conexao, "UPDATE dividas SET nomegasto='$nomegasto', divida=$divida VALUES ('Aviao', '45000'))or die (mysqli_error($conexao)");
	
	if($up):
		echo "<script>
				alert('Alterado com sucesso.');
				window.location='index.php';
			</script>"; 
	else:
		echo "<script>
				alert('Ocorreu um erro ao atualizar, entre em contato com o administrador.');
				window.location='index.php';
			</script>";
	endif;
?>