<?php 
  // Connection
  include_once('../../../config/helper.php');

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $app['name'] ?></title>
    <link rel="stylesheet" href="<?= BASE_URL.'vendor/bootstrap5-3.min.css' ?>">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        header {
            padding: 50px;
        }
        .content {
            min-height: 411px;
        }
        .bgme-f {
            background-color: chocolate;
        }
    </style>
  </head>
  <body>
  <div class="container-fluid p-0">
  <header class="bg-success text-center d-flex justify-content-between">
    <div>
      <h1 class="text-white text-center">Selamat Datang, <?php echo $_SESSION['username'] ?></h1>
    </div>
    <div>
      <a href="<?= BASE_URL.'backend/auth.php' ?>" class="btn btn-danger mt-2"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
    </div>
  </header>
</div>

        <?php 
            include_once('sidebar.php');
        ?>