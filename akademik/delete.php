<?php 


session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../index.php");
}


require 'function/functions.php';

$id =$_GET["kode"];

$q= query("SELECT * FROM tb_pendaftaran WHERE id=$id")[0];
 $dir = ('file/'.$q['nama_lengkap']);

if (hapus($id)>0){
		echo "
			<script>
			alert('data berhasil ditolak');
			document.location.href='pendaftar.php';
			</script>
			";
		}else {
		echo "
			<script>
			alert('data gagal ditolak');
			document.location.href='pendaftar.php';
			</script>
			";
		}


deleteDirectory($dir);
	


?>