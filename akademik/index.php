<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("Location: ../index.php");
}

$conn = mysqli_connect("localhost", "root", "", "iom");
// mengambil data mobil
$pendaftar = mysqli_query($conn,"SELECT * FROM tb_pendaftaran");
$diterima = mysqli_query($conn,"SELECT * FROM tb_pendaftaran WHERE status = 1");

// menghitung data mobil
$jumlah_pendaftar = mysqli_num_rows($pendaftar);
$jumlah_diterima = mysqli_num_rows($diterima);




?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IOM PNC</title>
	<link rel="shortcut icon" href="../images/Logo_PNC.png" type="image/png">

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
	<!-- IonIcons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="#" class="nav-link">IOM POLITEKNIK NEGERI CILACAP</a>
				</li>

			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Navbar Search -->
				
				
				
				<li class="nav-item">
					
					<i><img src="../images/PNC.png" style="width: 100px;"></i>
				</a>
			</li>
		</ul>
	</nav>
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="index3.html" class="brand-link">

			<span class="brand-text font-weight-light">&nbsp &nbsp &nbsp &nbsp &nbspBeasiswa IOM PNC</span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user panel (optional) -->




			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          	with font-awesome or any other icon font library -->
          	<li class="nav-item menu-open">
          		<a href="#" class="nav-link active">
          			<i class="nav-icon fas fa-tachometer-alt"></i>
          			<p>
          				Home
          				
          			</p>
          		</a>

          	</li>
          	
          	<li class="nav-item">
          		<a href="pendaftar.php" class="nav-link">
          			<i class="nav-icon fas fa-edit"></i>
          			<p>
          				Pendaftar
          				
          			</p>
          		</a>

          	</li>


           <li class="nav-item">
            <a href="diterima.php" class="nav-link">
             <i class="nav-icon fas fa-copy"></i>
              <p>
                Diterima

              </p>
            </a>
          </li>






          	
          	
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Kemahasiswaan IOM PNC, <?php echo $_SESSION["username"]; ?></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="../login/logout.php">Logout</a></li>

					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">

					

						<!-- About Me Box -->
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Politeknik Negeri Cilacap</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">


								<strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

								<p class="text-muted">Jalan Dokter Soetomo No.1, Karangcengis, Sidakaya, Kec. Cilacap Sel., Kabupaten Cilacap, Jawa Tengah 53212</p>

								<hr>



								<strong><i class="far fa-file-alt mr-1"></i> Telepon</strong>

								<p class="text-muted"> (0282) 533329</p>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
					<!-- /.col -->
					<div class="col-md-9">
						<div class="card">
							<div class="card-header p-2">
								<ul class="nav nav-pills">
									<li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Syarat dan Ketentuan IOM PNC</a></li>

								</ul>
							</div><!-- /.card-header -->
							<div class="card-body">
								<div class="tab-content">
									<div class="active tab-pane" id="activity">
										<!-- Post -->
										<div class="post">

											<!-- /.user-block -->
											<p><ol>
												<li>Mahasiswa terdaftar sebagai mahasiswa Politeknik Negeri Cilacap</li>
												<li>Foto/Scan KHS Indeks prestasi Komulatif (IPK) minimal 3,00</li>
												<li>Foto/Scan Kwitansi Iuran Ikatan Orang Tua Mahasiswa di semester gasal dan genap</li>
												<li>Berasal dari keluarga kurang mampu (Foto/Scan surat keterangan penghasilan bila ada dan KK)</li>
												<li>Foto/Scan Surat pernyataan tidak sedang menerima beasiswa dari sumber lain</li>
												<li>Foto/Scan piagam kejuaraan/Prestasi minat, bakat, penalaran/pengembangan (bila ada)</li>
												<li>Foto/Scan aktif dalam Organisasi Mahasiswa di Politeknik Negeri Cilacap</li>
											</ol>
										</p>




									</div>
									<!-- /.post -->


									<!-- /.col -->
								</div>
								<!-- /.row -->
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->




						<!-- END timeline item -->
						<div>


						</div>

					</div>
				</div>

			</div>
			<!-- /.tab-content -->
		</div><!-- /.card-body -->
		 <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->

             <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $jumlah_diterima; ?></h3>

                <p>Diterima Beasiswa IOM</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $jumlah_pendaftar; ?></h3>

                <p>Jumlah Pendaftar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">lihat&nbsp<i class="fas fa-arrow-circle-right"></i></a>
            </div>
           
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            
          <!-- ./col -->
        </div>
	</div>

	<!-- /.card -->
</div>

<!-- /.col -->
</div>

<!-- /.row -->
</div><!-- /.container-fluid -->

</section>


<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>
</body>
</html>
