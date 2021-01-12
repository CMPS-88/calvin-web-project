<?php include 'include/header.php';
      include 'adminnav.php'?>   

      <?php     
      if(isset($_POST['submit1'])){ 
        $nama_motor = $_POST['nama_motor'];
        $stok_motor = $_POST['stok_motor'];
        $harga_motor = $_POST['harga_motor'];    
        $id_kategori = $_POST['id_kategori'];
        $deskripsi = $_POST['deskripsi'];
        $targetDir = "img/upload/";
        $fileName = $_FILES['submit2']['name'];
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        $allowedTypes = array('jpg','png','jpeg','gif');
        if(in_array($fileType,$allowedTypes)){
            if(move_uploaded_file($_FILES['submit2']['tmp_name'],$targetFilePath)){

                $query = "  INSERT INTO `motor`( `nama_motor`, `stok_motor`,`harga_motor`,`id_kategori`,`deskripsi`,`gambar_motor`) 
                    VALUES ('$nama_motor','$stok_motor','$harga_motor','$id_kategori','$deskripsi','$fileName')";
                    if(mysqli_query($conn,$query)){
                    echo "File Upload Success";
                }else{
                    echo"File Upload Error";
                }
            }else{
                echo "Sorry, there was an error uploading your file.";
            }
        }else{
           echo 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
        
    
      }
    

    // var_dump($_GET['id']);

    // var_dump($row);
    
    ?>
        <div class="container">
         <div class="row">
               <form action="input.php" method="POST" enctype="multipart/form-data" > 
               <!--    <div class=" col-lg-12"> -->
                    <h2 class="contact-title">Masukkan Data</h2>
                 </div>
                          <div class="mt-10">
                                <div class="form-group">
                                    <input class="form-control" name="nama_motor"  type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama motor'" placeholder='Nama motor'>
                                </div>
                            </div>
                            <div class="mt-10 ">
                                <div class="form-group ">
                                    <input class="form-control" name="stok_motor"  type="int" onfocus="this.placeholder = ''" onblur="this.placeholder = 'stok'" placeholder='stok'>
                                </div>
                            </div>
                            <div class="mt-10">
                                <div class="form-group ">
                                    <input class="form-control" name="harga_motor" type="int" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Harga'" placeholder='Harga'>
                                </div>
                            </div>
                             <div class="m ">
                                <div class="form-group ">
                                    <input class="form-control " name="id_kategori"  type="int" onfocus="this.placeholder = ''" onblur="this.placeholder = 'kategori'" placeholder='kategori'>
                                </div>
                            </div>
                        
                        </div>   
                           <textarea class="form-control w-100 col-md-8 offset-md-2" name="deskripsi" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Deskripsi'" placeholder='Deskripsi'></textarea>
                                </div>
                            </div>
                             <div class="form-group col-md-6 offset-md-2">
                         <label for="exampleFormControlFile1">Upload foto </label>
                        <input type="file" class="form-control-file" name="submit2">
                     </div> 
                   
                          </div>
                      <button type="submit"  name="submit1" class="btn btn-primary col-md-1 offset-md-2">submit</button>
                        </form>
               
             </div>
    </div>