<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../index.php");
}


require 'function/functions.php';

$tb_pendaftaran = query("SELECT * FROM tb_pendaftaran");
$nim =$_GET["nim"];
$q= query("SELECT * FROM tb_pendaftaran WHERE nim=$nim")[0];

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
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
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
              <a href="index.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                 Home

               </p>
             </a>

           </li>

           <li class="nav-item">
            <a href="pendaftar.php" class="nav-link active">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Pendaftar

              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="pengajuan.php" class="nav-link">
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
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pendaftar Beasiswa IOM PNC ( <?= $q["nama_lengkap"];?> )</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../login/logout.php">Logout</a></li>

          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section>

   <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        




        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"></h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->




          <form method="POST" action="" enctype="multipart/form-data" >
            <div class="card-body">

              <input type="hidden" class="name" placeholder="id" name="id" id="id"  />
              <input type="hidden" class="name" placeholder="id" name="status" id="status"  value="0" />

              <div class="form-group">
                <label for="exampleInputEmail1">Nama Lengkap</label>
                <input type="nama_lengkap" class="form-control" id="nama_lengkap" name="nama_lengkap" disabled value="<?= $q["nama_lengkap"];?>">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">NIM</label>
                <input type="NIM" class="form-control" disabled id="nim" name="nim"  value="<?= $q["nim"];?>" >


              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="email"  name="email" value="<?= $q["email"];?>" disabled



                >
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">No.Telp</label>
                <input type="telepon" class="form-control" id="telepon" value="<?= $q["telepon"];?>" disabled name="telepon" >
              </div>


              <div class="form-group">

                <label for="exampleInputFile">Foto/Scan KHS Indeks Prestasi Komulatif (IPK) minimal 3,00</label>
              </div>
              <div>
                <img src="file/<?= $q['nama_lengkap'];?>/<?= $q['scan_khs'];?>"width="500" style="margin-left: auto;"><br><br><br><br>
              </div>

              <div class="form-group">   
                <label for="exampleInputFile">Foto/Scan kwitansi Iuran Ikatan Orangtua Mahasiswa di semester gasal dan genap</label>
              </div>
              <div>
                <img src="file/<?= $q['nama_lengkap'];?>/<?= $q['scan_kwitansi'];?>"width="500" style="margin-left: auto;"><br><br><br><br>
              </div>

              <div class="form-group">   
                <label for="exampleInputFile">Foto/Scan surat keterangan penghasilan</label>

                

                <?php
                if ( $q['scan_penghasilan'] == "tidak ada" OR $q['scan_penghasilan'] == 0) {
                  echo "(Tidak Ada)";
                }

                else {
                  ?>

                </div>
                <div>
                  <img src="file/<?= $q['nama_lengkap'];?>/<?= $q['scan_penghasilan'];?>"width="500" style="margin-left: auto;"><br><br><br><br>

                <?php } ?>
              </div>

              <div class="form-group">   
                <label for="exampleInputFile">Foto/Scan Kartu Keluarga (KK)</label>

              </div>
              <div>
                <img src="file/<?= $q['nama_lengkap'];?>/<?= $q['scan_kk'];?>"width="500" style="margin-left: auto;"><br><br><br><br>
              </div>


              <div class="form-group">

                <label for="exampleInputFile">Foto/Scan surat pernyataan tidak sedang menerima beasiswa dari sumber lain</label>



              </div>
              <div>
                <img src="file/<?= $q['nama_lengkap'];?>/<?= $q['scan_pernyataan'];?>"width="500" style="margin-left: auto;"><br><br><br><br>
              </div>

              <div class="form-group">

                <label for="exampleInputFile">Foto/Scan piagam kejuaraan/prestasi minat, bakat, pengembangan</label>

                <?php
                if ( $q['scan_prestasi'] == "tidak ada" OR $q['scan_prestasi'] == 0) {
                  echo "(Tidak Ada)";
                }

                else {
                  ?>

                </div>
                <div>
                  <img src="file/<?= $q['nama_lengkap'];?>/<?= $q['scan_prestasi'];?>"width="500" style="margin-left: auto;"><br><br><br><br>

                <?php } ?>
              </div>

              <div class="form-group">

                <label for="exampleInputFile">Foto/Scan aktif organisasi mahasiswa di PNC</label>
                

                 <?php
                if ( $q['scan_organisasi'] == "tidak ada" OR $q['scan_organisasi'] == 0) {
                  echo "(Tidak Ada)";
                }

                else {
                  ?>

                </div>
                <div>
                  <img src="file/<?= $q['nama_lengkap'];?>/<?= $q['scan_organisasi'];?>"width="500" style="margin-left: auto;"><br><br><br><br>

                <?php } ?>
              </div>
            <!-- /.card-body -->

            <div class="card-footer">
            <a href="pendaftar.php" class="btn btn-primary">Kembali</a>

            </div>
          </form>
        </div>





        <!-- /.card -->


      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->


</section>
<!-- /.content -->
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
