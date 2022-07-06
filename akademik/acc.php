<?php 

require 'function/functions.php';
$nim =$_GET["nim"];
if (acc($nim)>0){
		echo "
			<script>
			alert('Data Berhasil di Acc');
			document.location.href='pendaftar.php';
			</script>
			";
		}else {
		echo "
			<script>
			alert('Data Gagal di Acc');
			document.location.href='pendaftar.php';
			</script>
			";
		}

?>