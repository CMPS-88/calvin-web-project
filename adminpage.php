<?php include 'include/header.php';
      include 'adminnav.php';
      $id = 1;
      $sql_motor = "SELECT * FROM motor";
      $rows_motor = mysqli_query($conn, $sql_motor);
      mysqli_close($conn);
      $data = $rows_motor ;
      ?>   
      <div class="section_tittle text-center">
 <h2>Daftar Motor</h2>
 <br>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Motor</th>
      <th scope="col">Stok</th>
      <th scope="col">Harga</th>
      <th scope="col">kategori</th>
      <th scope="col">deskripsi</th>
      <th scope="col">Gambar</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rows_motor as $row) : ?>
    <tr>
      <td ><p><?= $row['id_motor']?></p></td>
      <td ><p><?= $row['nama_motor']?></p></td>
      <td><p><?= $row['stok_motor']?></p></td>
      <td><p><?= $row['harga_motor']?></p></td>
      <td><p><?= $row['id_kategori']?></p></td>
      <td><p><?= $row['deskripsi']?></p></td>
      <td><img src="img/upload/<?= $row['gambar_motor']?>"></td>
      <td><a href="delete.php?id=<?=$row['id_motor'];?>" class="btn btn-sm btn-success">Hapus</a>
      </tr>
    <?php endforeach;?> 
  </tbody>
</table>
</div>
