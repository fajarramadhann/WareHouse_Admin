<?php
// Include header and sidebar of templates
include_once('../templates/header.php');
?>

<h3>Config App</h3>
<hr>

<?php
    if(isset($_SESSION['updated']) && 
    $_SESSION['updated'] === true){
    echo '<div class="alert alert-success" role="alert">
    Perubahan telah disimpan!
    </div>';
    unset($_SESSION['updated']); 
}
?>

<form action="<?= BASE_URL . 'backend/update_config.php' ?>" method="POST">
    <div class="mb-3">
        <label for="inputNameApp" class="form-label">Nama Aplikasi</label>
        <input type="text" name="name" class="form-control" id="inputNameApp" value="<?= $app['name'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="inputDescription" class="form-label">Deskripsi</label>
        <textarea class="form-control" name="description" id="inputDescription" rows="3"
            required><?= $app['description'] ?></textarea>
    </div>
    <div class="mb-3">
        <label for="inputVersion" class="form-label">Version</label>
        <input type="text" class="form-control" maxlength="3" name="version" id="inputVersion"
            value="<?= $app['version'] ?>" required>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
    </div>
</form>

<?php
// Include footer of templates
include_once('../templates/footer.php');
?>