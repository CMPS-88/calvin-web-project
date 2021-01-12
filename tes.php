<?php include 'db.php';

    if (isset($_POST['submit'])) {
        $id_costumer = $_POST['id_costumer'];
      $username = $_POST['username'];
     $pilih_motor = $_POST['id_motor'];
    $sql_username = "SELECT * FROM costumer WHERE username = $username";
     $sql_motor = "SELECT * FROM motor where id_motor = $pilih_motor";
     $rows_motor = mysqli_query($conn, $sql_motor);
    $rows_username = mysqli_query($conn, $sql_username);

        
        $query = " INSERT INTO `pesanan`(`id_costumer`,`id_motor`)
                   VALUES ('$id_costumer','$pilih_motor')";
 
       
        mysqli_query($conn, $query);
        header('Location: contact.php');
       
    } 
   mysqli_close($conn);
   ?>