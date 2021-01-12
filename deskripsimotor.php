<?php
        include 'include/header.php';
        include  'include/nav.php';
    
  $id_costumer = $_SESSION['id_costumer'];
  $username = $_SESSION['username'];
  $pilih_motor = $_GET['id_motor'];
  $sql_username = "SELECT * FROM costumer WHERE username = $username";
  $sql_motor = "SELECT * FROM motor where id_motor = $pilih_motor";
  $rows_motor = mysqli_query($conn, $sql_motor);
  $rows_username = mysqli_query($conn, $sql_username);
  
  
    if (isset($_POST['submit'])) {
        
        $query = " INSERT INTO `pesanan`(`id_costumer`,`id_motor`)
                   VALUES ('$id_costumer','$pilih_motor')";
 
       
        mysqli_query($conn, $query);
       
    } 
   mysqli_close($conn);
   
 foreach ($rows_motor as $row) : ?> 
    <div class="row justify-content-center text-center">
         <div class="col-lg-6 col-md-6  ">
                    <div class="single_place">
                    <img src="img/upload/<?=$row['gambar_motor']?>">
                    <!--    <div class="hover_Text d-flex align-items-end justify-content-between"> -->
                            <div class="hover_text_iner">
                                <h3><?= $row['nama_motor']?></h3>
                                <h3>Rp.<?= $row['harga_motor']?></h3>
                                <p>Standart</p>
                                <div class="place_review justify-content-center text-center ">
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <span>(210 review)</span>
                                <p>
                                 <?= $row['deskripsi']?>
                                </p>
                                <br>
                                <form  method="POST" action="tes.php" >
                                <input style="display: none" type="text" value= <?= $id_costumer?> name="id_costumer">
                                <input style="display: none" type="text" value= <?= $pilih_motor?> name="id_motor">
                                <input style="display: none" type="text" value= <?= $username?> name="username">
                                <button name="submit"  class="btn_1">Book Now</button>
                                </form>
                                
                            </div>
                            
                       <!-- </div>-->
                    </div>
                    <?php endforeach;?>
                </div>
    </div>
