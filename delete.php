<?php include 'include/header.php';
$id = $_GET['id'];

    $query = mysqli_query($conn, "delete from motor where id_motor ='$id'");
    ?>