<?php
session_start();
if (!isset($_SESSION['nama'])) {
  header("Location: ../index.php");
}


require 'function/functions.php';


//cek tombol submit
if ( isset($_POST["submit"]))
{
        //cek data berhasil tambah atau tidak
  if  (tambah($_POST)>0){


    echo "
    <script>
    alert('Data Berhasil Ditambahkan');
    document.location.href='pendaftaran.php';
    </script>
    ";
  }else {

    echo "
    <script>
    alert('Data Gagal Ditambahkan');
     document.location.href='pendaftaran.php';
    </script>
    ";

    $dir = ('../akademik/file/'.$_SESSION["nama"]);

    deleteDirectory($dir);

  }
}


             $nama_lengkap = $_SESSION["nama"];

            $q= query("SELECT nama_lengkap FROM tb_pendaftaran WHERE nama_lengkap='$nama_lengkap'");
        
          


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
            <a href="pendaftaran.php" class="nav-link active">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Pendaftaran

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
            <h1>Form Pendaftaran Beasiswa IOM PNC</h1>
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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <?php

           


            if ( $q == false ) {

            
            
            
              ?>
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
                    <input type="nama_lengkap" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="<?php echo $_SESSION["nama"]; ?> " disabled value="<?php echo $_SESSION["nama"]; ?> "  >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">NIM</label>
                    <input type="NIM" class="form-control" id="nim" name="nim"  placeholder="<?php
                    include '../login/config.php';
                    $nama = $_SESSION["nama"];

                    $sql = "SELECT nim FROM tb_user WHERE nama='$nama'"; 
                    $result = mysqli_query($conn, $sql);
                    while ($row = $result->fetch_assoc()) {
                      echo $row['nim'];
                    }

                    ?>" disabled value="<?php
                    include '../login/config.php';
                    $nama = $_SESSION["nama"];

                    $sql = "SELECT nim FROM tb_user WHERE nama='$nama'"; 
                    $result = mysqli_query($conn, $sql);
                    while ($row = $result->fetch_assoc()) {
                      echo $row['nim'];
                    }

                    ?>"  >

                    
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="email" required name="email" placeholder="<?php
                    include '../login/config.php';
                    $nama = $_SESSION["nama"];

                    $sql = "SELECT email FROM tb_user WHERE nama='$nama'"; 
                    $result = mysqli_query($conn, $sql);
                    while ($row = $result->fetch_assoc()) {
                      echo $row['email'];
                    }

                    ?>"


                     disabled value="<?php
                    include '../login/config.php';
                    $nama = $_SESSION["nama"];

                    $sql = "SELECT email FROM tb_user WHERE nama='$nama'"; 
                    $result = mysqli_query($conn, $sql);
                    while ($row = $result->fetch_assoc()) {
                      echo $row['email'];
                    }

                    ?>"



                    >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">No.Telp</label>
                    <input type="telepon" class="form-control" id="telepon" required name="telepon" >
                  </div>


                  <div class="form-group">

                    <label for="exampleInputFile">Foto/Scan KHS Indeks Prestasi Komulatif (IPK) minimal 3,00</label>


                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="scan_khs" required name="scan_khs">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>

                    </div>
                  </div>

                  <div class="form-group">   
                    <label for="exampleInputFile">Foto/Scan kwitansi Iuran Ikatan Orangtua Mahasiswa di semester gasal dan genap</label>

                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="scan_kwitansi" required name="scan_kwitansi">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>

                    </div>
                  </div>

                  <div class="form-group">   
                    <label for="exampleInputFile">Foto/Scan surat keterangan penghasilan (bila ada)</label>

                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="scan_penghasilan" name="scan_penghasilan">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>

                    </div>
                  </div>

                  <div class="form-group">   
                    <label for="exampleInputFile">Foto/Scan Kartu Keluarga (KK)</label>

                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="scan_kk" name="scan_kk" required>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>

                    </div>
                  </div>

                  <div class="form-group">

                    <label for="exampleInputFile">Foto/Scan surat pernyataan tidak sedang menerima beasiswa dari sumber lain</label>
                    <br>
                    <label for="exampleInputFile" style="color: gray;">*template bisa didownload di Pengumuman IOM.pdf </label>
                    

                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="scan_pernyataan" name="scan_pernyataan" required>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      
                    </div>
                  </div>

                  <div class="form-group">

                    <label for="exampleInputFile">Foto/Scan piagam kejuaraan/prestasi minat, bakat, pengembangan (bila ada)</label>


                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="scan_prestasi" name="scan_prestasi">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      
                    </div>
                  </div>

                  <div class="form-group">

                    <label for="exampleInputFile">Foto/Scan aktif organisasi mahasiswa di PNC (bila ada)</label>
                    <br>
                    <label for="exampleInputFile" style="color: gray;">*template bisa didownload di Pengumuman IOM.pdf </label>

                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="scan_organisasi" name="scan_organisasi">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      
                    </div>
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                </div>
              </form>
            </div>

            <?php

            }

            else  {

            ?>


            <div class="alert alert-info alert-dismissible">
                 
                  <h5><i class="icon fas fa-info"></i>Selamat, Anda Sudah Mengajukan Pendaftaran IOM PNC</h5>
                  Pengajuan bisa dilihat di halaman lihat pengajuan, apabila ingin mendaftar ulang hapus terlebih dahulu data sebelumnya :)
                </div>


                <?php 
              }
              ?>
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
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    bsCustomFileInput.init();
  });
</script>
</body>
</html>
