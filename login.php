<?php include 'include/header.php';

 if($_SESSION){
     header('location: index.php');
 } else{
 
     if(isset($_POST['submit'])){
         
         $email = $_POST['email'];
         $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
         $password = password_verify($_POST['password'], $hash);
 
         $sql = "SELECT * FROM costumer WHERE `email`='$email'";
         $result = mysqli_query($conn,$sql);
         $row = $result->fetch_assoc();
         if($row != NULL){
             if(password_verify($_POST['password'],$row['password'])){
                
                 $_SESSION['email'] = $email;
                 $_SESSION['id_costumer'] = $row['id_costumer'];
                 $_SESSION['username'] = $row['username'];
                 // var_dump($_SESSION['id']);
                
                     if($row['id_costumer'] > 0 ){ 
                     header('Location: index.php');
                    }else{
                        header('Location: adminpage.php');
                    }
                 }
             } else{
             echo "No Dataset";
         }

     }
     mysqli_close($conn);

 }
 
 include 'include/nav.php';?> 



    <div class="container section_padding">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-8 col-md-8">
                <div class="mb-30 section-title text-center">
                    <h3 class="">Masuk</h3>
                    <p>Silahkan Login</p>
                </div>
                <form action="#" method="POST">
                    <div class="mt-10">
                        <input type="text" name="email" id="email" placeholder="email"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'email'" required
                            class="single-input">
                    </div>
                    <div class="mt-10">
                        <input type="password" name="password" id="password" placeholder="Kata Sandi"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Kata Sandi'" required
                            class="single-input">
                    </div>
                    <div class="mt-30 row justify-content-center">
                        <!-- <a href="#" class="btn_1" type="submit">Masuk</a> -->
                        <button type="submit" name="submit" class="btn_1" onclick="fungsi_login()">Masuk</button>
                    </div>
                    
                    <h4 id="gagal_login"></h4>
                    <a class="mt-10 row justify-content-center" href="register.php"> Daftar</a>
                   <!-- <a class="mt-10 row justify-content-center" href="lupa.php">Lupa kata password? Reset password</a>
                --></form>
            </div>
        </div>
    </div>

