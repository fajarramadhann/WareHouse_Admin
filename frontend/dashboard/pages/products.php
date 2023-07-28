<?php
	// Include header and sidebar of templates
	include_once('../templates/header.php');
?>

<div class="d-flex">
  <h3 class="me-auto">Products</h3>
  <a href="<?= BASE_URL.'frontend/dashboard/pages/products_create.php' ?>" class="btn btn-primary ms-auto"><i class="fa-solid fa-plus"></i> Tambah Barang</a>
</div>
<hr>

<?php 
  // Message for created
  if(isset($_SESSION['created']) && $_SESSION['created'] === true){
    echo '<div class="alert alert-warning" role="alert">Berhasil, produk baru telah disimpan!</div>';

  unset($_SESSION['created']);
  } 
?>

<?php 
  // Message for deleted
  if(isset($_SESSION['deleted']) && $_SESSION['deleted'] === true){
    echo '<div class="alert alert-danger" role="alert">Berhasil, produk telah dihapus!</div>';

  unset($_SESSION['deleted']);
  } 
?>

<div class="alert alert-success" role="alert"><i class="fa-solid fa-circle-info"></i> <span class="fw-bold">Informasi!</span> <br> hanya menampilkan 10 data terbaru (karna fitur pagination belum dibuat ^_^)</div>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" width="15%">Kode Produk</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Kategori</th>
      <th scope="col">Harga</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 

      $runQuery = mysqli_query($link, "SELECT * FROM products ORDER BY created_at DESC LIMIT 10");

      while ($row = mysqli_fetch_assoc($runQuery)) {
        echo '<tr>';
        echo '<td>'.$row['code'].'</td>';
        echo '<td>'.$row['name'].'</td>';

        // Baca id category yg dibuat hardcode di html (products_create.php)
        if ($row['category'] == 'EL') {
          $row['category'] = 'Elektronik';
        } else if ($row['category'] == 'TR') {
          $row['category'] = 'Kendaraan';
        }

        echo '<td>'.$row['category'].'</td>';
        
        // Gunakan fungsi built in php (number_format()) untuk memudahkan pembacaan nominal
        echo '<td>'.number_format($row['price']).'</td>';

        echo '<td>
                    <a href="'.BASE_URL.'frontend/dashboard/pages/products_update.php?id='.$row['id'].'" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i> Ubah</a>
                    <a href="'.BASE_URL.'backend/delete_products.php?id='.$row['id'].'" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> Hapus</a></td>';
        echo '</tr>';
      }
    ?>
  </tbody>
</table>

<?php
	// Include footer of templates
	include_once('../templates/footer.php');
?>