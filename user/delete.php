<?php 


session_start();
if (!isset($_SESSION['nama'])) {
  header("Location: ../index.php");
}


require 'function/functions.php';

$id =$_GET["kode"];
$q= query("SELECT * FROM tb_pendaftaran WHERE id=$id")[0];
 $dir = ('../akademik/file/'.$_SESSION['nama']);

if (hapus($id)>0){
		echo "
			<script>
			alert('Data berhasil dihapus');
			document.location.href='pengajuan.php';
			</script>
			";
		}else {
		echo "
			<script>
			alert('Data gagal dihapus');
			document.location.href='pengajuan.php';
			</script>
			";
		}


deleteDirectory($dir);
	


?>