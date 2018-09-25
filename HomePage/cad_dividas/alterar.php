<?php
include_once("inser.php");//faz a conexao com o banco de dados

if(!empty($_POST['id_cliente'])){

    $id_cliente = $_GET['id_cliente'];

    $result = "UPDATE * FROM dividas WHERE id_cliente = '$id_cliente' ";
    $resultado = mysqli_query($conexao, $result);
    $row = mysqli_fetch_assoc($resultado);

    if($resultado -> num_rows > 0){
		echo"
		<div class='modal fade' id='squarespaceModa2' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
			<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button>
								
				<div class='modal-body'>
					<div class='form-group'>
						<div class='col-xs-12'><center>
						<label for='exampleInputPassword1'>nomegasto</label></center>
						<input type='text' name='funcionario' class='form-control' id='exampleInputPassword1' value=".$row['nomegasto']." style='text-align: center;' readonly='readonly' >
						<br></div>
					</div>
					
					<div class='form-group'>
						<div class='col-xs-3'><center>
						<label for='exampleInputPassword1'>Número</label></center>
						<input type='text' name='numero' class='form-control' id='exampleInputPassword1' value=".$row['numero']." style='text-align: center;' readonly='readonly' >
						</div>
					</div>
					
					<div class='form-group'>
						<div class='col-xs-6'><center>
						<label for='exampleInputPassword1'>divida</label></center>
						<input type='text' name='nchip' class='form-control' id='exampleInputPassword1' value=".$row['divida']." style='text-align: center;' readonly='readonly' >
						</div>
					</div>		
				</div>
				</div>
			</div>
			</div>
		</div>
		
		<script>
			$(document).ready(function(){ $('#squarespaceModa2').modal(); });  
		</script>";
	   
    } 
	else {
       echo "<script>
			alert('Id_cliente não encontrado.');
			window.location='index.php';
		</script>"; 
    }
}

?>	