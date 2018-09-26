<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
    </head>
    
    <body>
        <div class="container">
            <div clas="span10 offset1">
                <div class="row">
                    <h3 class="well"> Adicionar Contato </h3>
                    <form class="form-horizontal" action="create.php" method="post">
                        
                        <div class="control-group <?php echo !empty($nomeErro)?'error ' : '';?>">
                            <label class="control-label">Nome</label>
                            <div class="controls">
                                <input size= "30" name="nome" type="text" placeholder="Nome" required="" value="<?php echo !empty($nome)?$nome: '';?>">
                                <?php if(!empty($nomeErro)): ?>
                                    <span class="help-inline"><?php echo $nomeErro;?></span>
                                <?php endif;?>
                            </div>
                        </div>
                        
                        <div class="control-group <?php echo !empty($emailErro)?'error ': '';?>">
                            <label class="control-label">Email</label>
                            <div class="controls">
                                <input size="30" name="email" type="text" placeholder="Email" required="" value="<?php echo !empty($email)?$email: '';?>">
                                <?php if(!empty($emailErro)): ?>
                                <span class="help-inline"><?php echo $emailErro;?></span>
                                <?php endif;?>
                        </div>
                        </div>

                        <div class="control-group <?php echo !empty($enderecoErro)?'error ': '';?>">
                            <label class="control-label">Cpf</label>
                            <div class="controls">
                                <input size="30" name="cpf" type="text" placeholder="Cpf" required="" value="<?php echo !empty($cpf)?$cpf: '';?>">
                                <?php if(!empty($cpfErro)): ?>
                                <span class="help-inline"><?php echo $cpfErro;?></span>
                                <?php endif;?>
                        </div>
                        </div>
                        
                        <div class="control-group <?php echo !empty($valordividaErro)?'error ': '';?>">
                            <label class="control-label">valordivida</label>
                            <div class="controls">
                                <input size="30" name="valordivida" type="text" placeholder="valordivida" required="" value="<?php echo !empty($valordivida)?$valordivida: '';?>">
                                <?php if(!empty($valordividaErro)): ?>
                                <span class="help-inline"><?php echo $valordividaErro;?></span>
                                <?php endif;?>
                        </div>
                        </div>
                        
                        <div class="form-actions">
                            <br/>
                
                            <button type="submit" class="btn btn-success">Adicionar</button>
                            <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                        
                        </div>
                    </form>
                </div>
        </div>
    </body>
</html>


<?php
    require 'banco.php';
    
    if(!empty($_POST))
    {
        //Acompanha os erros de validação
        $nomeErro = null;
        $emailErro = null;
        $cpfErro = null;
        $valordividaErro = null;
        
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $valordivida = $_POST['valordivida'];
        
        //Validaçao dos campos:
        // Cadastro do nome no banco de dados
        $validacao = true;
        if(empty($nome))
        {
            $nomeErro = 'Por favor digite o seu nome!';
            $validacao = false;
        }
        // cadastro do e-mail no banco de dados
        if(empty($email))
        {
            $emailErro = 'Por favor digite o endereço de email';
            $validacao = false;
        }
        // cadastro do cpf no banco de dados
        if(empty($cpf))
        {
            $cpfErro = 'Por favor digite o seu CPF!';
            $validacao = false;
        }
        // cadastro da valordivida no banco de dados
        if(empty($valordivida))
        {
            $valordividaErro = 'Por favor digite o número da sua valordivida!';
            $validacao = false;
        }

        //Inserindo no Banco:
        if($validacao)
        {
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO pessoa (nome, email, cpf, valordivida) VALUES(?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nome,$email,$cpf,$valordivida));
            Banco::desconectar();
            header("Location: index.php");
        }
    }
?>
