<?php
 include "include/header.php";

	if(isset($_POST['motor']))
	{
		
		$ekstensi_diperbolehkan = array('png', 'jpg', 'pdf', 'rar');
		$nama = $_FILES['gambar_motor']['name']; 
		
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran = $_FILES['gambar_motor']['size']; 
		$file_tmp = $_FILES['gambar_motor']['tmp_name']; 

	
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			
			if($ukuran < 1044070){
		
				move_uploaded_file($file_tmp, 'gambar_motor/'.$nama);

			
				$simpan = mysqli_query($koneksi, "INSERT INTO motor VALUES ('', '$nama')");
				if($simpan){
					echo "<script>alert('FILE BERHASIL DI UPLOAD'); document.location='index.php'</script>";
				}else{
					echo "<script>alert('GAGAL MENGUPLOAD FILE'); document.location='index.php'</script>";
				}

			}else{
				
				echo "<script>alert('UKURAN FILE TERLALU BESAR, MAX. 1MB'); document.location='index.php'</script>";
			}
		}else{
		
			echo "<script>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DIPERBOLEHKAN'); document.location='index.php'</script>";
		}


	}

?>