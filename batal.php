<?php include 'include/header.php';
$id = $_GET['id'];

    $query = mysqli_query($conn, "DELETE from pesanan where id_motor ='$id'");
    ?>