<?php include 'include/header.php';
$id = $_GET['id'];
    $query2 = mysqli_query($conn, "SELECT  id_motor,nama_motor,stok_motor FROM motor WHERE id_motor = '$id'");
   // $res = result_array($query2);
    foreach($query2 as $ok){
          $id_barang = $ok['id_motor'];
          $nama_barang  = $ok['nama_motor'];
          $stok_motor = $ok['stok_motor'];
    }

    $query = mysqli_query($conn, "INSERT INTO penjualan (`id_barang`,`nama_barang`) 
            VALUES ('$id_barang','$nama_barang')");
            if($stok_motor >= 1){
                  $query1 = mysqli_query($conn, "UPDATE  motor SET stok_motor = stok_motor - 1 WHERE id_motor ='$id'");
                 
            }else if($stok_motor < 1){
                 
                   $hapus = mysqli_query($conn, "DELETE FROM  motor WHERE id_motor ='$id'");
                   echo $hapus;
            }
   
         //   header('Location: adminpage.php');
    ?> 