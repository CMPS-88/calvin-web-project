<?php include 'include/header.php';
      include 'adminnav.php';
      $id = 1;
      $sql_motor = "SELECT pesanan.id_motor,nama_motor,username,pesanan.id_costumer,harga_motor,tgl_pemesanan 
                    FROM pesanan LEFT JOIN costumer on pesanan.id_costumer = costumer.id_costumer LEFT JOIN motor 
                    on pesanan.id_motor = motor.id_motor ";
      $rows_motor = mysqli_query($conn, $sql_motor);
      mysqli_close($conn);
      $data = $rows_motor ;
      ?>   
<div class="section_tittle text-center">
 <h2>Proses Pesanan</h2>
 <br>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Motor</th>
      <th scope="col">Nama Costumer</th>
      <th scope="col">Id Costumer</th>
      <th scope="col">Harga</th>
      <th scope="col">Tanggal Pesanan</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rows_motor as $row) : ?>
    <tr>
      <td ><p><?= $row['id_motor']?></p></td>
      <td ><p><?= $row['nama_motor']?></p></td>
      <td><p><?= $row['username']?></p></td>
      <td><p><?= $row['id_costumer']?></p></td>
      <td><p><?= $row['harga_motor']?></p></td>
      <td><p><?= $row['tgl_pemesanan']?></p></td>
      <td><a href="batal.php?id=<?=$row['id_motor'];?>" class="btn btn-sm btn-success">Batalkan</a> 
        <a href="terjual.php?id=<?=$row['id_motor'];?>" class="btn btn-sm btn-success">Terjual</a> </td>
      </tr>
    <?php endforeach;?> 
  </tbody>
</table>
</div>

