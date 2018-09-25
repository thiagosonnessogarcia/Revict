<?php

$host = "localhost";
$user = "root";
$pass = "";
$banco = "revict";
$conexao = mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($banco) or die(mysql_error());

?>

<?php

session_start();
	if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])){
	header("Location: index.php");
	exit;
}

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">Revict</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">

        <i class="fas fa-bars"></i>
      </button>
		<font color="white"><h3>Bem vindo <?php echo $_SESSION['email']?></h3></font>
      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Pesquisa por..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Sair</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Gráficos/Dívidas</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Area Chart Example-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>
              Gráficos</div>
            <div class="card-body">
              <canvas id="myAreaChart" width="100%" height="30"></canvas>
            </div>
          </div>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Tabela de Cadastro/Dívidas</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Data</th>
                      <th>Nome</th>
                      <th>E-mail</th>
                      <th>CPF</th>
                      <th>Dívida</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Data Inicial</th>
                      <th>Nome</th>
                      <th>E-mail</th>
                      <th>CPF</th>
                      <th>Dívida</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>2011/04/25</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/07/25</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/01/12</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/03/29</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/03/29</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/03/29</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/03/29</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/03/29</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/03/29</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/03/29</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/03/29</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/03/29</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/03/29</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/03/29</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/03/29</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/03/29</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/03/29</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/03/29</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/03/29</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/03/29</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/03/29</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/03/29</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                    <tr>
                      <td>2011/03/29</td>
                      <td><?php $_SESSION['nome'] ?></td>
                      <td><?php $_SESSION['email'] ?></td>
                      <td><?php $_SESSION['cpf'] ?></td>
                      <td><?php $_SESSION['divida'] ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            	
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © <font color="red"><b>REVICT</b></font> 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo sair?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Ao selecionar Sair, sua seção sera encerrada e só poderá reconectar utilizando e-mail e senha novamente.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="logout.php">Sair</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
