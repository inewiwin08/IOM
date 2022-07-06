<?php 
//koneksi database
$conn = mysqli_connect("localhost","root","","iom");


function query($query){
	global $conn;
	$result = mysqli_query($conn,$query);
	$rows = [] ;
	while($row = mysqli_fetch_assoc($result)){
		$rows[]=$row;
		
	}
	return $rows;
}




function tambah($data){
	global $conn;



	$id = htmlspecialchars($data["id"]);
	$status = htmlspecialchars($data["status"]);
	$telepon  =htmlspecialchars($data["telepon"]);


	

	if(is_numeric($telepon) == FALSE)
	{
		echo "<script>
		alert('No.Telepon Harus Berupa Angka');
		</script>";
		return false;
	}

	


	





	

		if(isset($_POST["submit"])) 
		{ 
			
			
 //menentukan nama folder baru dari input text dan mengecek standar formatnya


			$nama_folder = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '',  $_SESSION["nama"]); 

 //mengecek keberadaan folder
			if((file_exists($nama_folder))&&(is_dir($nama_folder))) 
			{ 
				echo "Folder <b>".$nama_folder."</b> Sudah ada"; 
			} 
			else 
			{ 
 //memasukan fungsi mkdir 
				mkdir ('../akademik/file/'.$nama_folder); 


 //untuk pengecekan proses 

			} 

		} 


	//scan_khs
		$scan_khs = upload_khs();
		if(!$scan_khs){
			return false;
		}
	//scan_kwitansi
		$scan_kwitansi = upload_kwitansi();
		if(!$scan_kwitansi){
			return false;
		}

	//scan_penghasilan
		$scan_penghasilan = upload_penghasilan();
		if(!$scan_penghasilan){
			return false;
		}

	//scan_kk
		$scan_kk = upload_kk();
		if(!$scan_kk){
			return false;
		}

	//scan_pernyataan
		$scan_pernyataan = upload_pernyataan();
		if(!$scan_pernyataan){
			return false;
		}

	//scan_prestasi
		$scan_prestasi = upload_prestasi();
		if(!$scan_prestasi){
			return false;
		}

	//scan_organisasi
		$scan_organisasi = upload_organisasi();
		if(!$scan_organisasi){
			return false;
		}

				            	//insert data
		$nama_lengkap = $_SESSION["nama"];



		$q2= query("SELECT * FROM tb_user WHERE nama='$nama_lengkap'")[0];
		

		$nim = $q2['nim'];
		$email = $q2['email'];

		$query ="INSERT INTO tb_pendaftaran
		VALUES
		('$id','$nama_lengkap','$nim','$email','$telepon','$scan_khs' ,'$scan_kwitansi' ,'$scan_penghasilan' ,'$scan_kk' ,'$scan_pernyataan' ,'$scan_prestasi' ,'$scan_organisasi' , '$status')
		";
		mysqli_query($conn,$query);
		return mysqli_affected_rows($conn);

	



}




//scan_khs
function upload_khs() {
	
	$namaFile   = $_FILES['scan_khs']['name'];
	$ukuranFile = $_FILES['scan_khs']['size'];
	$error      = $_FILES['scan_khs']['error'];
	$tmpName    = $_FILES['scan_khs']['tmp_name'];
	
			//cek apakah tidak ada gambar yang di upload
	if($error === 4) {
		echo "<script>
		alert('Pilih File Scan KHS Terlebih Dahulu!');
		</script>";
		return false;
	}
	
			//cek apakah yang boleh diupload
	$ekstensiValid = ['jpg','jpeg','png'];
	$ekstensi = explode('.', $namaFile);
	$ekstensi = strtolower(end($ekstensi));
	if(!in_array($ekstensi,$ekstensiValid)){
		echo "<script>
		alert('Tolong Upload File (jpg/jpeg/png) Scan KHS!!');
		</script>";
		return false;
	}
	
			//cek jika  ukuran  file   terlalu besar
	if ($ukuranFile > 50000000) 
	{
		echo "<script>
		alert('Ukuran File Scan KHS Terlalu Besar (MAX 5 mb) ');
		</script>";
		return false;
	}
	
			//lolos pengecekan
			//nama baru
	
	
	
	$nama_folder = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '',  $_SESSION["nama"]); 
	$namaFileBaru = ("Scan_KHS_".$nama_folder);
	$namaFileBaru .= '.';
	$namaFileBaru .=$ekstensi;


	move_uploaded_file($tmpName,'../akademik/file/'.$nama_folder.'/'.$namaFileBaru);
	return $namaFileBaru;	
}

//scan_kwitansi
function upload_kwitansi() {
	
	$namaFile   = $_FILES['scan_kwitansi']['name'];
	$ukuranFile = $_FILES['scan_kwitansi']['size'];
	$error      = $_FILES['scan_kwitansi']['error'];
	$tmpName    = $_FILES['scan_kwitansi']['tmp_name'];
	
			//cek apakah tidak ada gambar yang di upload
	if($error === 4) {
		echo "<script>
		alert('Pilih File Scan Kwitansi IOM Terlebih Dahulu!');
		</script>";
		return false;
	}
	
			//cek apakah yang boleh diupload
	$ekstensiValid = ['jpg','jpeg','png'];
	$ekstensi = explode('.', $namaFile);
	$ekstensi = strtolower(end($ekstensi));
	if(!in_array($ekstensi,$ekstensiValid)){
		echo "<script>
		alert('Tolong Upload File (jpg/jpeg/png) Scan Kwitansi IOM !!');
		</script>";
		return false;
	}
	
			//cek jika  ukuran  file   terlalu besar
	if ($ukuranFile > 50000000) 
	{
		echo "<script>
		alert('Ukuran File Terlalu Besar (MAX 5 mb)');
		</script>";
		return false;
	}
	
			//lolos pengecekan
			//nama baru
	$nama_folder = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $_SESSION["nama"]); 
	$namaFileBaru = ("Scan_Kwitansi_".$nama_folder);
	$namaFileBaru .= '.';
	$namaFileBaru .=$ekstensi;


	move_uploaded_file($tmpName,'../akademik/file/'.$nama_folder.'/'.$namaFileBaru);
	return $namaFileBaru;	
}

//scan_penghasilan
function upload_penghasilan() {
	
	$namaFile   = $_FILES['scan_penghasilan']['name'];
	$ukuranFile = $_FILES['scan_penghasilan']['size'];
	$error      = $_FILES['scan_penghasilan']['error'];
	$tmpName    = $_FILES['scan_penghasilan']['tmp_name'];
	
			//cek apakah tidak ada gambar yang di upload
	if($error === 4) {
		
		return ("tidak ada");
	}

	else {
	
			//cek apakah yang boleh diupload
	$ekstensiValid = ['jpg','jpeg','png'];
	$ekstensi = explode('.', $namaFile);
	$ekstensi = strtolower(end($ekstensi));
	if(!in_array($ekstensi,$ekstensiValid)){
		echo "<script>
		alert('Tolong Upload File (jpg/jpeg/png) Scan Penghasilan !!');
		</script>";
		return false;
	}
	
			//cek jika  ukuran  file   terlalu besar
	if ($ukuranFile > 50000000) 
	{
		echo "<script>
		alert('Ukuran File Scan Penghasilan Terlalu Besar (MAX 5 mb)');
		</script>";
		return false;
	}
	
	$nama_folder = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $_SESSION["nama"]); 
	$namaFileBaru = ("Scan_Penghasilan_".$nama_folder);
	$namaFileBaru .= '.';
	$namaFileBaru .=$ekstensi;


	move_uploaded_file($tmpName,'../akademik/file/'.$nama_folder.'/'.$namaFileBaru);
	return $namaFileBaru;	
}

}


//scan_kk
function upload_kk() {
	
	$namaFile   = $_FILES['scan_kk']['name'];
	$ukuranFile = $_FILES['scan_kk']['size'];
	$error      = $_FILES['scan_kk']['error'];
	$tmpName    = $_FILES['scan_kk']['tmp_name'];
	
			//cek apakah tidak ada gambar yang di upload
	if($error === 4) {
		echo "<script>
		alert('Pilih File Scan Kartu Keluarga Terlebih Dahulu!');
		</script>";
		return false;
	}
	
			//cek apakah yang boleh diupload
	$ekstensiValid = ['jpg','jpeg','png'];
	$ekstensi = explode('.', $namaFile);
	$ekstensi = strtolower(end($ekstensi));
	if(!in_array($ekstensi,$ekstensiValid)){
		echo "<script>
		alert('Tolong Upload File (jpg/jpeg/png) Scan Kartu Keluarga !!');
		</script>";
		return false;
	}
	
			//cek jika  ukuran  file   terlalu besar
	if ($ukuranFile > 50000000) 
	{
		echo "<script>
		alert('Ukuran File Scan Kartu Keluarga Terlalu Besar (MAX 5 mb)');
		</script>";
		return false;
	}
	
	$nama_folder = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $_SESSION["nama"]); 
	$namaFileBaru = ("Scan_KK_".$nama_folder);
	$namaFileBaru .= '.';
	$namaFileBaru .=$ekstensi;


	move_uploaded_file($tmpName,'../akademik/file/'.$nama_folder.'/'.$namaFileBaru);
	return $namaFileBaru;	
}


//scan_pernyataan
function upload_pernyataan() {
	
	$namaFile   = $_FILES['scan_pernyataan']['name'];
	$ukuranFile = $_FILES['scan_pernyataan']['size'];
	$error      = $_FILES['scan_pernyataan']['error'];
	$tmpName    = $_FILES['scan_pernyataan']['tmp_name'];
	
			//cek apakah tidak ada gambar yang di upload
	if($error === 4) {
		echo "<script>
		alert('Pilih File Scan Pernyataan Tidak Menerima Beasiswa Lain Terlebih Dahulu!');
		</script>";
		return false;
	}
	
			//cek apakah yang boleh diupload
	$ekstensiValid = ['jpg','jpeg','png'];
	$ekstensi = explode('.', $namaFile);
	$ekstensi = strtolower(end($ekstensi));
	if(!in_array($ekstensi,$ekstensiValid)){
		echo "<script>
		alert('Tolong Upload File (jpg/jpeg/png) Scan Pernyataan Tidak Menerima Beasiswa Lain !!');
		</script>";
		return false;
	}
	
			//cek jika  ukuran  file   terlalu besar
	if ($ukuranFile > 50000000) 
	{
		echo "<script>
		alert('Ukuran File Scan Pernyataan Tidak Menerima Beasiswa Lain Terlalu Besar (MAX 5 mb)');
		</script>";
		return false;
	}
	
	$nama_folder = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $_SESSION["nama"]); 
	$namaFileBaru = ("Scan_Pernyataan_".$nama_folder);
	$namaFileBaru .= '.';
	$namaFileBaru .=$ekstensi;


	move_uploaded_file($tmpName,'../akademik/file/'.$nama_folder.'/'.$namaFileBaru);
	return $namaFileBaru;	
}


//scan_prestasi
function upload_prestasi() {
	
	$namaFile   = $_FILES['scan_prestasi']['name'];
	$ukuranFile = $_FILES['scan_prestasi']['size'];
	$error      = $_FILES['scan_prestasi']['error'];
	$tmpName    = $_FILES['scan_prestasi']['tmp_name'];
	
			//cek apakah tidak ada gambar yang di upload
	if($error === 4) {
		
		return ("tidak ada");
	}

	
			//cek apakah yang boleh diupload
	$ekstensiValid = ['jpg','jpeg','png'];
	$ekstensi = explode('.', $namaFile);
	$ekstensi = strtolower(end($ekstensi));
	if(!in_array($ekstensi,$ekstensiValid)){
		echo "<script>
		alert('Tolong Upload File (jpg/jpeg/png) Scan Prestasi !!');
		</script>";
		return false;
	}
	
			//cek jika  ukuran  file   terlalu besar
	if ($ukuranFile > 50000000) 
	{
		echo "<script>
		alert('Ukuran File Scan Prestasi Terlalu Besar (MAX 5 mb)');
		</script>";
		return false;
	}
	
			//lolos pengecekan
	$nama_folder = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $_SESSION["nama"]); 
	$namaFileBaru = ("Scan_Prestasi_".$nama_folder);
	$namaFileBaru .= '.';
	$namaFileBaru .=$ekstensi;


	move_uploaded_file($tmpName,'../akademik/file/'.$nama_folder.'/'.$namaFileBaru);
	return $namaFileBaru;		
}

//scan_organisasi
function upload_organisasi() {
	
	$namaFile   = $_FILES['scan_organisasi']['name'];
	$ukuranFile = $_FILES['scan_organisasi']['size'];
	$error      = $_FILES['scan_organisasi']['error'];
	$tmpName    = $_FILES['scan_organisasi']['tmp_name'];
	
			//cek apakah tidak ada gambar yang di upload
	if($error === 4) {
		
		return ("tidak ada");
	}

	
			//cek apakah yang boleh diupload
	$ekstensiValid = ['jpg','jpeg','png'];
	$ekstensi = explode('.', $namaFile);
	$ekstensi = strtolower(end($ekstensi));
	if(!in_array($ekstensi,$ekstensiValid)){
		echo "<script>
		alert('Tolong Upload File (jpg/jpeg/png) Scan Organisasi !!');
		</script>";
		return false;
	}
	
			//cek jika  ukuran  file   terlalu besar
	if ($ukuranFile > 50000000) 
	{
		echo "<script>
		alert('Ukuran File Scan Organisasi Terlalu Besar (MAX 5 mb)');
		</script>";
		return false;
	}
	
	$nama_folder = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $_SESSION["nama"]); 
	$namaFileBaru = ("Scan_Organisasi_".$nama_folder);
	$namaFileBaru .= '.';
	$namaFileBaru .=$ekstensi;


	move_uploaded_file($tmpName,'../akademik/file/'.$nama_folder.'/'.$namaFileBaru);
	return $namaFileBaru;		
}


function ubah($data){

	global $conn;

	$id =$data["id"];
	$kode =htmlspecialchars($data["kode"]);
	$merek =htmlspecialchars($data["merek"]);
	$tipe  =htmlspecialchars($data["tipe"]);
	$model  =htmlspecialchars($data["model"]);
	$kapasitas_mesin  =htmlspecialchars($data["kapasitas_mesin"]);
	$warna  =htmlspecialchars($data["warna"]);
	$deksripsi  =htmlspecialchars($data["deksripsi"]);
	$harga  =htmlspecialchars($data["harga"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);


		//cek apakah user pilih gambar baru atau tidak
	if($_FILES['gambar']['error'] === 4){
		$gambar  = $gambarLama;
	}else{
		$gambar =upload();
	}
	
	
		//insert data
	$query ="UPDATE tb_mobil SET
	
	kode   ='$kode',
	merek ='$merek',
	tipe  ='$tipe',
	model ='$model',
	kapasitas_mesin ='$kapasitas_mesin',
	warna ='$warna',
	deksripsi ='$deksripsi' ,
	harga ='$harga' ,
	
	gambar   ='$gambar'
	WHERE id = $id
	";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}



function hapus($id) {
	global $conn;
	mysqli_query($conn,"DELETE FROM tb_pendaftaran WHERE id = $id");


	

 //mengecek keberadaan folder

 //memasukan fungsi mkdir 

	
	return mysqli_affected_rows($conn);
}



function deleteDirectory($dir) {

	if (!file_exists($dir)) {
		return true;
	}

	if (!is_dir($dir)) {
		return unlink($dir);
	}

	foreach (scandir($dir) as $item) {
		if ($item == '.' || $item == '..') {
			continue;
		}

		if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
			return false;
		}

	}

	return rmdir($dir);
}

?>
