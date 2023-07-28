<?php
	// Include header and sidebar of templates
	include_once('../templates/header.php');

  // Catch id for query
  $id_products = $_GET['id'];

  // Get data on database with LIMIT 1
  $runQuery = mysqli_query($link, "SELECT * FROM products WHERE id = ".$id_products." LIMIT 1");
  $product  = mysqli_fetch_assoc($runQuery);

?>

<h3>Products Ubah <a href="<?= BASE_URL.'frontend/dashboard/pages/products.php' ?>" class="btn btn-light border"><i class="fa-solid fa-arrow-left"></i> Kembali</a></h3>
<hr>

<?php 
  if(isset($_SESSION['updated']) && $_SESSION['updated'] === true){
    echo '<div class="alert alert-warning" role="alert">Berhasil, perubahan telah disimpan!</div>';

  unset($_SESSION['updated']);
  } 
?>

<div class="alert alert-success" role="alert"><i class="fa-solid fa-circle-info"></i> <span class="fw-bold">Informasi!</span> <br> Kode tidak dapat diubah untuk menjaga konsistensi hubungan antar table (untuk pengembangan, misal transaksi/peminjaman ^_^)</div>

<form action="<?= BASE_URL.'backend/update_products.php?id='.$product['id']; ?>" method="post">
<div class="row g-2">
  <div class="col-4">
    <div class="mb-3">
      <label for="inputCode" class="form-label">Kode</label>
      <input type="text" class="form-control bg-light" id="inputCode" value="<?= $product['code'] ?>" readonly>
    </div>
  </div>
  <div class="col-8">
    <div class="mb-3">
      <label for="inputName" class="form-label">Nama Barang</label>
      <input type="text" name="name" class="form-control"id="inputName" value="<?= $product['name'] ?>" required>
    </div>
  </div>
</div>

<div class="row g-2">
  <div class="col-4">
    <div class="mb-3">
      <label for="inputPrice" class="form-label">Harga</label>
      <input type="number" name="price" class="form-control" id="inputPrice" value="<?= $product['price'] ?>" required>
    </div>
  </div>
  <div class="col-8">
    <div class="mb-3">
      <label for="inputVersion" class="form-label">Kategori Barang</label>
      <select class="form-select" name="category" required>
        <option value="EL" <?= ($product['category'] == 'EL') ? 'selected' : false ?>>Elektronik</option>
        <option value="TR" <?= ($product['category'] == 'TR') ? 'selected' : false ?>>Kendaraan</option>
      </select>
    </div>
  </div>
</div>

<div class="d-grid">
	<button type="submit" class="btn btn-warning"><i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan</button>
</div>
</form>

<?php
	// Include footer of templates
	include_once('../templates/footer.php');
?>