<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ");
}


require 'function/functions.php';

$tb_kemahasiswaan = query("SELECT * FROM tb_kemahasiswaan");

if ( isset($_POST["kirim"]))
{
        //cek data berhasil tambah atau tidak
  if  (tambah_kemahasiswaan($_POST)>0){
    echo "
    <script>
    alert('data berhasil ditambahkan');
    document.location.href='kemahasiswaan.php';
    </script>
    ";
  }else {
    echo "
    <script>
    alert('data gagal ditambahkan');
    document.location.href='kemahasiswaan.php';
    </script>
    ";
  }
}
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
            <a href="pendaftar.php" class="nav-link ">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Akun Mhs IOM

              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="kemahasiswaan.php" class="nav-link active">
             <i class="nav-icon fas fa-edit"></i>
              <p>
                Akun Kemahasiswaan

              </p>
            </a>
          </li>

          

         

           

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



         <!-- DModal-->
         <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header"><h6 class="m-0 font-weight-bold text-primary">Tambah Akun Kemahasiswaan IOM PNC</h6>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel"></h4></center>
              </div>
              <div class="card mb-4">

                <div class="card-body">
                  <form method="POST" action="" enctype="multipart/form-data" >

                   <input type="hidden" name="id" id="id">
                  

                  

                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" id="username" name="username" 
                    > 
                  </div>



                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" name="password" id="password" 
                    > 
                  </div>









                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
                <button type="submit" name="kirim" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Tambah</a>
                </form>
               

              </div>

            </div>
          </div>
        </div>








  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tabel Akun Kemahasiswaan IOM PNC</h1>
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
      
         <div class="card">

                                           
             
              <!-- /.card-header -->
              <div class="card-body">
                 <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#addnew" name="submit">Tambah Akun</button>
                <br><br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Username</th>
                    <th>Password</th>
              
                    <th>Aksi</th>
                  </tr>
                  </thead>


                  <tbody>

                    <?php $no = 1; ?>
                                                        <?php foreach ($tb_kemahasiswaan as $row ) 


                            {
                                echo 
                                "<tr>
                                    
                                    <td>".$row['username']."</td>
                                    <td>".$row['password']."</td>
                                   
                                   
                                   
                                    <td>

                                           <a href='edit_data_kemahasiswaan.php?id=".$row['id']."' class='btn btn-success btn-sm'>Edit Data</a>

                                        <a href='delete_kemahasiswaan.php?id=".$row['id']."' class='btn btn-danger btn-sm'> Hapus</a>
                            
                                        
                                        
                                        
                                    </td>
                                </tr>";
                               
                               
                                 

                            }
                           
                        ?>
                
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

   
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
