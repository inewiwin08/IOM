<?php 


session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../index.php");
}


require 'function/functions.php';

$id =$_GET["id"];

$q= query("SELECT * FROM tb_kemahasiswaan WHERE id=$id")[0];


if (hapus_kemahasiswaan($id)>0){
		echo "
			<script>
			alert('data berhasil dihapus');
			document.location.href='kemahasiswaan.php';
			</script>
			";
		}else {
		echo "
			<script>
			alert('data gagal dihapus');
			document.location.href='kemahasiswaan.php';
			</script>
			";
		}



	


?>