<?php 

require 'function/functions.php';
$id =$_GET["id"];
if (tolak($id)>0){
		echo "
			<script>
			alert('Data Berhasil di Tolak');
			document.location.href='pendaftar.php';
			</script>
			";
		}else {
		echo "
			<script>
			alert('Data Gagal di Tolak');
			document.location.href='pendaftar.php';
			</script>
			";
		}

?>