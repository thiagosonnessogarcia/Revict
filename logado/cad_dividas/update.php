<?php 
	
	require 'banco.php';

	$id = null;
	if ( !empty($_GET['id'])) 
            {
		$id = $_REQUEST['id'];
            }
	
	if ( null==$id ) 
            {
		header("Location: index.php");
            }
	
	if ( !empty($_POST)) 
            {
		
		$nomeErro = null;
		$emailErro = null;
		$cpfErro = null;
        $dividaErro = null;
		
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$cpf = $_POST['cpf'];
        $valordivida = $_POST['valordivida'];

		
		//Validação
		$validacao = true;
		if (empty($nome)) 
                {
                    $nomeErro = 'Por favor digite o nome!';
                    $validacao = false;
                }
		
		if (empty($email)) 
                {
                    $emailErro = 'Por favor digite o email!';
                    $validacao = false;
		} 
                else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) 
                {
                    $emailErro = 'Por favor digite um email válido!';
                    $validacao = false;
		}
		
		if (empty($cpf)) 
                {
                    $cpf = 'Por favor digite o endereço!';
                    $validacao = false;
		}
                
                if (empty($valordivida)) 
                {
                    $valordivida = 'Por favor digite o valor da divida!';
                    $validacao = false;
		}
                
                if (empty($cpf)) 
                {
                    $cpf = 'Por favor preenche o campo!';
                    $validacao = false;
		}
		
		// update data
		if ($validacao) 
                {
                    $pdo = Banco::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE pessoa  set nome = ?, email = ?, cpf = ?, valordivida = ? WHERE id = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($nome,$email,$cpf,$valordivida,$id));
                    Banco::desconectar();
                    header("Location: index.php");
		}
	} 
        else 
            {
                $pdo = Banco::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM pessoa where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$nome = $data['nome'];
                $email = $data['email'];
                $cpf = $data['cpf'];
		$valordivida = $data['valordivida'];
		Banco::desconectar();
	}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3 class="well"> Atualizar Contato </h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                        
                      <div class="control-group <?php echo !empty($nomeErro)?'error':'';?>">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <input name="nome" size="30" type="text"  placeholder="Nome" value="<?php echo !empty($nome)?$nome:'';?>">
                            <?php if (!empty($nomeErro)): ?>
                                <span class="help-inline"><?php echo $nomeErro;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                        
                       <div class="control-group <?php echo !empty($email)?'error':'';?>">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input name="email" size="30" type="text"  placeholder="Email" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailErro)): ?>
                                <span class="help-inline"><?php echo $emailErro;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                        
                       <div class="control-group <?php echo !empty($cpfErro)?'error':'';?>">
                        <label class="control-label">cpf</label>
                        <div class="controls">
                            <input name="cpf" size="30" type="text"  placeholder="cpf" value="<?php echo !empty($cpf)?$cpf:'';?>">
                            <?php if (!empty($cpfErro)): ?>
                                <span class="help-inline"><?php echo $cpfErro;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                        
                        <div class="control-group <?php echo !empty($dividaErro)?'error':'';?>">
                        <label class="control-label">Valor divida</label>
                        <div class="controls">
                            <input name="valordivida" size="30" type="text"  placeholder="valordivida" value="<?php echo !empty($valordivida)?$valordivida:'';?>">
                            <?php if (!empty($dividaErro)): ?>
                                <span class="help-inline"><?php echo $dividaErro;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      
                        <br/>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Atualizar</button>
                          <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                        </div>
                    </form>
                </div>                 
    </div> 
  </body>
</html>

