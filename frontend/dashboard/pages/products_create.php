<?php
	// Include header and sidebar of templates
	include_once('../templates/header.php');
?>

<h3>Products Baru <a href="<?= BASE_URL.'frontend/dashboard/pages/products.php' ?>" class="btn btn-light border">Kembali</a></h3>
<hr>

<form action="<?= BASE_URL.'backend/create_products.php'; ?>" method="post">
<div class="row g-2">
  <div class="col-4">
    <div class="mb-3">
      <label for="inputCode" class="form-label">Kode</label>
      <input type="text" name="code" class="form-control bg-light" id="inputCode" value="<?= createCodeProduct() ?>" readonly>
    </div>
  </div>
  <div class="col-8">
    <div class="mb-3">
      <label for="inputName" class="form-label">Nama Barang</label>
      <input type="text" name="name" class="form-control"id="inputName" placeholder="Masukkan nama barang.." required>
    </div>
  </div>
</div>

<div class="row g-2">
  <div class="col-4">
    <div class="mb-3">
      <label for="inputPrice" class="form-label">Harga</label>
      <input type="number" name="price" class="form-control" id="inputPrice" value="" placeholder="Masukkan Harga.." required>
    </div>
  </div>
  <div class="col-8">
    <div class="mb-3">
      <label for="inputVersion" class="form-label">Kategori Barang</label>
      <select class="form-select" name="category" required>
        <option value="" selected>Pilih</option>
        <option value="EL">Elektronik</option>
        <option value="TR">Kendaraan</option>
        <option value="HP">Handphone</option>
        <option value="LP">Laptop</option>
      </select>
    </div>
  </div>
</div>

<div class="d-grid">
	<button type="submit" class="btn btn-warning"><i class="fa-solid fa-plus"></i> Buat Products</button>
</div>
</form>

<?php
	// Include footer of templates
	include_once('../templates/footer.php');
?>