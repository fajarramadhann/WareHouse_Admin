<?php 
    // Detect for active page
    $getURL = $_SERVER['REQUEST_URI'];

    // initialisasi flags to default false
    $dashboard = $m_data = $config = false;

    // flag for page active
    if (strpos($getURL, 'index.php') !== false) {
        $dashboard = true;
    } elseif (strpos($getURL, 'products') !== false) {
        $m_data = true;
    } elseif (strpos($getURL, 'config_app.php') !== false) {
        $config = true;
    } 
?>

    <div class="row g-0">
            <div class="col-3 align-item-end">

                <div class="content pt-2 p-3">

                    <ul class="list-group rounded-0">
                        <a href="<?= BASE_URL.'frontend/dashboard/pages/index.php' ?>" class="text-decoration-none">
                        <li class="list-group-item <?= ($dashboard) ? 'active' : null ?>"><i class="fa-solid fa-gauge"></i> Dashboard</li></a>
                        
                        <a href="<?= BASE_URL.'frontend/dashboard/pages/products.php' ?>" class="text-decoration-none"><li class="list-group-item <?= ($m_data) ? 'active' : null ?>"><i class="fa-solid fa-table"></i> Management Data</li></a>

                        <a href="<?= BASE_URL.'frontend/dashboard/pages/config_app.php' ?>" class="text-decoration-none">
                        <li class="list-group-item <?= ($config) ? 'active' : null ?>"><i class="fa-solid fa-gear"></i> Pengaturan</li></a>

                      </ul>
                
                </div>
            
            </div>


            <!-- main content -->
            <div class="col-9">
                <div class="content border-start p-3">