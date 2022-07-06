<?php
session_start();
if (!isset($_SESSION['nama'])) {
	header("Location: ../index.php");
}

require 'function/functions.php';


$nama_lengkap = $_SESSION["nama"];

$p= query("SELECT nama_lengkap FROM tb_pendaftaran WHERE nama_lengkap='$nama_lengkap'");


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
          	<li class="nav-item">
          		<a href="index.php" class="nav-link ">
          			<i class="nav-icon fas fa-tachometer-alt"></i>
          			<p>
          				Home
          				
          			</p>
          		</a>

          	</li>
          	
          	<li class="nav-item">
          		<a href="pendaftaran.php" class="nav-link">
          			<i class="nav-icon fas fa-edit"></i>
          			<p>
          				Pendaftaran
          				
          			</p>
          		</a>

          	</li>

          	
          	<li class="nav-item">
          		<a href="pengajuan.php" class="nav-link active">
          			<i class="nav-icon fas fa-copy"></i>
          			<p>
          				Pengajuan

          			</p>
          		</a>
          	</li>






          	

          	<li class="nav-item">
          		<a href="status.php" class="nav-link">
          			<i class="nav-icon fas fa-table"></i>
          			<p>
          				Status
          				
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
					<h1 class="m-0">Selamat Datang,  <?php echo $_SESSION["nama"]; ?></h1>
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

	
	<div class="card-header">
		<h3 class="card-title">Halaman Pengajuan IOM PNC</h3>

		<?php

		if ( $p != false ) {




			?>

			<div class="col-sm-13">
				<ol class="breadcrumb float-sm-right">


					<?php

					$nama_lengkap = $_SESSION["nama"];

					$q= query("SELECT * FROM tb_pendaftaran WHERE nama_lengkap='$nama_lengkap'")[0];

					

					echo "
					<a href='delete.php?kode=".$q['id']."' class='btn btn-danger btn-sm'> Hapus</a>
					";
					?>



				</ol>
			</div>

		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th style="width: 10px">No</th>
						<th>Persyaratan</th>
						<th>Keterangan</th>

					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1.</td>
						<td>Nama Lengkap</td>
						<td>

							<div><?php
							include '../login/config.php';
							$nama = $_SESSION["nama"];

							$sql = "SELECT nama_lengkap FROM tb_pendaftaran WHERE nama_lengkap='$nama'"; 
							$result = mysqli_query($conn, $sql);
							while ($row = $result->fetch_assoc()) {
								echo $row['nama_lengkap']."<br>";
							}

							?></div>

						</td>

					</tr>
					<tr>
						<td>2.</td>
						<td>NIM</td>
						<td>
							<?php
							$nama_lengkap = $_SESSION["nama"];

							$q= query("SELECT * FROM tb_pendaftaran WHERE nama_lengkap='$nama_lengkap'")[0];
							echo $q['nim'];
							?>




						</div>

					</td>

				</tr>


				<tr>
					<td>3.</td>
					<td>Email</td>
					<td>
						<?php
						echo $q['email'];
						?>
					</td>

				</tr>
				<tr>

					<tr>
						<td>4.</td>
						<td>No.Telepon</td>
						<td>
							<?php
							echo $q['telepon'];
							?>
						</td>

					</tr>
					<tr>


						<td>5.</td>
						<td>Scan KHS</td>
						<td>
							<?php

		$ekstensi = explode('.',  $q['scan_khs']);
		$ekstensi = strtolower(end($ekstensi));


		if ( $q['scan_khs'] == "tidak ada" OR $q['scan_khs'] == 0) {
			echo "Tidak Ada";
		}

		elseif ($ekstensi == "pdf") { 
			
			

			?>

			 	 <a href="JavaScript:window.location.href='download1.php?file=<?php echo $q['scan_khs']; ?>';" ><?php echo $q['scan_khs']; ?></a>


			 	<?php 
		}

		else {

			?>

			<img src="../akademik/file/<?= $q['nama_lengkap'];?>/<?= $q['scan_khs'];?>"width="500" style="margin-left: auto;"><br><br>


		<?php  } ?>
						</td>

					</tr>


					<td>6.</td>
					<td>Scan Kwitansi</td>
					<td>
						<?php

		$ekstensi = explode('.',  $q['scan_kwitansi']);
		$ekstensi = strtolower(end($ekstensi));


		if ( $q['scan_kwitansi'] == "tidak ada" OR $q['scan_kwitansi'] == 0) {
			echo "Tidak Ada";
		}

		elseif ($ekstensi == "pdf") { 
			
			

			?>

			 	 <a href="JavaScript:window.location.href='download1.php?file=<?php echo $q['scan_kwitansi']; ?>';" ><?php echo $q['scan_kwitansi']; ?></a>


			 	<?php 
		}

		else {

			?>

			<img src="../akademik/file/<?= $q['nama_lengkap'];?>/<?= $q['scan_kwitansi'];?>"width="500" style="margin-left: auto;"><br><br>


		<?php  } ?>
					</td>

				</tr>

				<td>7.</td>
				<td>Scan Penghasilan</td>
				<td>
					<?php

		$ekstensi = explode('.',  $q['scan_penghasilan']);
		$ekstensi = strtolower(end($ekstensi));


		if ( $q['scan_penghasilan'] == "tidak ada" OR $q['scan_penghasilan'] == 0) {
			echo "Tidak Ada";
		}

		elseif ($ekstensi == "pdf") { 
			
			

			?>

			 	 <a href="JavaScript:window.location.href='download1.php?file=<?php echo $q['scan_penghasilan']; ?>';" ><?php echo $q['scan_penghasilan']; ?></a>


			 	<?php 
		}

		else {

			?>

			<img src="../akademik/file/<?= $q['nama_lengkap'];?>/<?= $q['scan_penghasilan'];?>"width="500" style="margin-left: auto;"><br><br>


		<?php  } ?>
				</td>
				
			</tr>

			<td>8.</td>
			<td>Scan Kartu Keluarga</td>
			<td>
				<?php

		$ekstensi = explode('.',  $q['scan_kk']);
		$ekstensi = strtolower(end($ekstensi));


		if ( $q['scan_kk'] == "tidak ada" OR $q['scan_kk'] == 0) {
			echo "Tidak Ada";
		}

		elseif ($ekstensi == "pdf") { 
			
			

			?>

			 	 <a href="JavaScript:window.location.href='download1.php?file=<?php echo $q['scan_kk']; ?>';" ><?php echo $q['scan_kk']; ?></a>


			 	<?php 
		}

		else {

			?>

			<img src="../akademik/file/<?= $q['nama_lengkap'];?>/<?= $q['scan_kk'];?>"width="500" style="margin-left: auto;"><br><br>


		<?php  } ?>
			</td>

		</tr>

		<td>8.</td>
		<td>Scan Pernyataan</td>
		<td>
			<?php

		$ekstensi = explode('.',  $q['scan_pernyataan']);
		$ekstensi = strtolower(end($ekstensi));


		if ( $q['scan_pernyataan'] == "tidak ada" OR $q['scan_pernyataan'] == 0) {
			echo "Tidak Ada";
		}

		elseif ($ekstensi == "pdf") { 
			
			

			?>

			 	 <a href="JavaScript:window.location.href='download1.php?file=<?php echo $q['scan_pernyataan']; ?>';" ><?php echo $q['scan_pernyataan']; ?></a>


			 	<?php 
		}

		else {

			?>

			<img src="../akademik/file/<?= $q['nama_lengkap'];?>/<?= $q['scan_pernyataan'];?>"width="500" style="margin-left: auto;"><br><br>


		<?php  } ?>
		</td>

	</tr>


	<td>9.</td>
	<td>Scan Prestasi</td>
	<td>
		<?php

		$ekstensi = explode('.',  $q['scan_prestasi']);
		$ekstensi = strtolower(end($ekstensi));


		if ( $q['scan_prestasi'] == "tidak ada" OR $q['scan_prestasi'] == 0) {
			echo "Tidak Ada";
		}

		elseif ($ekstensi == "pdf") { 
			
			

			?>

			 	 <a href="JavaScript:window.location.href='download1.php?file=<?php echo $q['scan_prestasi']; ?>';" ><?php echo $q['scan_prestasi']; ?></a>


			 	<?php 
		}

		else {

			?>

			<img src="../akademik/file/<?= $q['nama_lengkap'];?>/<?= $q['scan_prestasi'];?>"width="500" style="margin-left: auto;"><br><br>


		<?php  } ?>
	</td>

</tr>

<td>10.</td>
<td>Scan Organisasi</td>
<td>
	<?php

		$ekstensi = explode('.',  $q['scan_organisasi']);
		$ekstensi = strtolower(end($ekstensi));


		if ( $q['scan_organisasi'] == "tidak ada" OR $q['scan_organisasi'] == 0) {
			echo "Tidak Ada";
		}

		elseif ($ekstensi == "pdf") { 
			
			

			?>

			 	 <a href="JavaScript:window.location.href='download1.php?file=<?php echo $q['scan_organisasi']; ?>';" ><?php echo $q['scan_organisasi']; ?></a>


			 	<?php 
		}

		else {

			?>

			<img src="../akademik/file/<?= $q['nama_lengkap'];?>/<?= $q['scan_organisasi'];?>"width="500" style="margin-left: auto;"><br><br>


		<?php  } ?>
</td>

</tr>
</tbody>

</table>


</div>

<?php

}

else  {

	?>


	<div class="alert alert-danger alert-dismissible">
		<h5></h5>
		<p><h3>Mohon Maaf, Anda Belum Mengajukan Pendaftaran</h3></p>
		Pengajuan pendaftaran bisa dilakukan di halaman Pendaftaran
	</div>


	<?php 
}
?>




<!-- /.card -->


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
