
<?php include 'include/header.php';
include 'include/nav.php'?>
<?php 

   $akun = $_SESSION['nrp'];
   $id_user = $_SESSION['id_user'];
   $id_kamar = $_GET['id_kamar'];
   $sql_akun = "SELECT * FROM user where nrp = $akun";
   $sql_kamar = "SELECT id_kamar, kamar.nama AS nama_kamar, kamar.kapasitas, harga, gedung.nama AS nama_gedung, gedung.penghuni AS penghuni FROM kamar LEFT JOIN gedung ON kamar.id_gedung=gedung.id_gedung WHERE id_kamar = $id_kamar";

   $rows_akun = mysqli_query($conn, $sql_akun);
   $rows_kamar = mysqli_query($conn, $sql_kamar);

   foreach ($rows_akun as $akun_row) {
       $jkelamin = $akun_row['jkelamin'];
   }
   foreach ($rows_kamar as $kamar_row) {
       $id_kamar = $kamar_row['id_kamar'];
       $penghuni = $kamar_row['penghuni'];
   }
   $i = 0;

   if (isset($_POST['submit'])) {

       if ($jkelamin != $penghuni) {
           echo "Beda kelamin lur!";
       } else {
           $entry_sql = "INSERT INTO `transaksi` (`id_user`, `id_kamar`) VALUES (
           '$id_user',
           '$id_kamar')";
       $entry_db = mysqli_query($conn, $entry_sql);
       }
     
   }
   


$motor = $_SESSION['email'];
$id_costumer= $_SESSION['id_costumer'];
$sql_motor = "SELECT costumer.username, costumer.email, costumer.alamat_costumer, costumer.telp_costumer where id_costumer = $id_costumer";

$rows_motor = mysqli_query($conn, $sql_motor);

$i = 0;

?>

<!-- tour details content css start-->
<section class="tour_details_content section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="content_iner">
                    <h2 class="mb-40 text-center">Profil</h2>
                    <ul class="unordered-list"> 
                    <?php foreach ($rows_motor as $row) : ?>
                        <li class="list-biasa"><p>Username: </p><h4><?=  $row['username'] ?></h4></li>
                        <li class="list-biasa"><p>Email: </p><h4><?=  $row['email'] ?></h4> </li>                   
                        <li class="list-biasa"><p>No Telepon: </p><h4><?=  $row['telp_costumer'] ?></h4></li>
                        <li class="list-biasa"><p>Alamat: </p><h4><?=  $row['alamat_costumer'] ?></h4></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- tour details content css end-->


    <?php include 'include/footer.php' ?>