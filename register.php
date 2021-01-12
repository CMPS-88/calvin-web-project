<?php 
        
        include 'include/header.php';
        include 'nav1.php'?>
<?php 
    // fungsi register
    if (isset($_POST['register'])) {
        $user_alamat_costumer = $_POST['alamat_costumer'];
        $user_telp_costumer = $_POST['telp_costumer'];
        $user_email = $_POST['email'];
        $user_username = $_POST['username'];
        $user_password = $_POST['password'];
        $user_confirm_password = $_POST['confirm_password'];

        $user_password = password_hash($user_password, PASSWORD_DEFAULT);    
        $query = "  INSERT INTO `costumer`( `alamat_costumer`, `telp_costumer`,`email`,`username`,`password`) 
                    VALUES ('$user_alamat_costumer','$user_telp_costumer','$user_email','$user_username','$user_password')";

        mysqli_query($conn, $query);
       /* $user_username = mysqli_real_escape_string($connection,$user_username);
        $user_firstname = mysqli_real_escape_string($connection,$user_firstname);
        $user_lastname = mysqli_real_escape_string($connection,$user_lastname);
        $user_email = mysqli_real_escape_string($connection,$user_email);
        $user_password= mysqli_real_escape_string($connection,$user_password);
        $user_password_repeat= mysqli_real_escape_string($connection,$user_password_repeat); */
        
        // mengecek apakah usernam dan email sudah terpakai atau belum
       /* $query = "SELECT user_username FROM users WHERE user_username = '$user_username'";
        $check_username = mysqli_query($connection,$query);
        confirm($check_username);

        $query = "SELECT user_email FROM users WHERE user_email = '$user_email'";
        $check_email = mysqli_query($connection,$query);
        confirm($check_email); 
        //mengecek username dan email sudah digunakan atau belum
        if (!mysqli_num_rows($check_username)> 0 && !mysqli_num_rows($check_email)> 0) {
            //cek jumlah karakter password
            if(!empty($user_username) && !empty($user_firstname) && !empty($user_lastname) && !empty($user_email) &&
            !empty($user_password_repeat) && !empty($user_password)) {
                if (strlen($user_password) > 8) {
                if ($user_password_repeat !==$user_password) {
                    $message = "Passwords are not the same";
                }else {
                    $user_password =password_hash($user_password,PASSWORD_DEFAULT);
                    // menambahkan user ke database
                    $query = " INSERT INTO `users`(`user_id`, `user_username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`)
                                VALUES ('','$user_username','$user_password','$user_firstname','$user_lastname','$user_email')";
                    $register_query = mysqli_query($connection,$query);
                    confirm($register_query); ?>
                            <div class="col-md-8 col-lg-7 text-center align-content-center mx-auto ">
                                <div class="alert alert-success" role="alert">
                                User Resgitration Successful!
                                </div>  
                            </div>
                    <?php }}
                else {
                    $message = "Password must be more than 8 characters long";
                }
            }else {
                $message = "Fields cannot be empty!";
            }
            

        }else {
            $message = "Username / Email is already in use ";
        }*/



        }?>

        <!-- Menampilkan Pesan  -->
        <?php if(isset($message)){?>
            <div class="col-md-8 col-lg-7 text-center align-content-center mx-auto ">
                <div class="alert alert-danger" role="alert">
                <?php echo "Register Success"?>
                </div>  
            </div>
        <?php }?>
    <div class="jumbotron">
        <h2>Hi User Baru, Daftar Yuk!</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <small class="form-text text-muted">!!</small>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username bang jago" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" id="alamat_costumer" name="alamat_costumer" placeholder="Masukkan username " required>
        </div>
        <div class="form-group">
            <label>No.Telepon</label>
            <input type="text" class="form-control" id="telp_costumer" name="telp_costumer" placeholder="Masukkan username " required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" id="password" name="password" onkeyup='check();'required >
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" onkeyup=' check();' required>
            <span id="message"></span>
        </div>
        <button type="submit" name="register" id="submit" class="btn btn-primary" href="login.php" >Submit</button>
        
    </form>
    </div>
    
    <?php header('Location: adminpage.php');
     include 'include/footer.php' ?>