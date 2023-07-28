<?php 
  // Connection
	require_once('connection.php');

 // Set Default Time
  date_default_timezone_set('Asia/Jakarta'); 

  // BASE URL (Path sesuai server)
  $realpath    = str_replace('\\', '/', dirname(__FILE__));
  $projectName = substr_replace(str_replace($_SERVER['DOCUMENT_ROOT'], '', $realpath), "", -6);
  define("BASE_URL", "http://$_SERVER[HTTP_HOST]$projectName");


  // Check data column in Config DB - (name_apps, owner, maintenance, updated_at) 
  $runSql = mysqli_query($link, "SELECT * FROM config_app");
  $app = mysqli_fetch_assoc($runSql);

  // Detail array with print
  function parr($arr){
      echo "<pre>";
      print_r($arr);
      echo "</pre>";
  }

   // ID Automatically
   function createCodeProduct(){
    global $link;
    $query = "SELECT max(code) as maxKode FROM products";
    $hasil = mysqli_query($link, $query);
    $data = mysqli_fetch_array($hasil);
    $code = $data['maxKode'];

    if ($code === null){
        $code = 'P0001';
    } else {

        $removeP = substr($code, 1);

        $length = strlen($removeP+1);
        if ($length == 1){
            $code = 'P000'.($removeP+1);
        } elseif ($length == 2){
            $code = 'P00'.($removeP+1);
        } elseif ($length == 3){
            $code = 'P0'.($removeP+1);
        } elseif ($length == 4){
            $code = 'P'.($removeP+1);
        } 
        
    }

    return $code;
    }


  // Date format Indonesia language
  function waktu($type = NULL){
      $hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jum\'at','Sabtu'];

      $bulan = array(
              '01' => 'Januari',
              '02' => 'Februari',
              '03' => 'Maret',
              '04' => 'April',
              '05' => 'Mei',
              '06' => 'Juni',
              '07' => 'Juli',
              '08' => 'Agustus',
              '09' => 'September',
              '10' => 'Oktober',
              '11' => 'November',
              '12' => 'Desember',
      );

      if ($type == NULL) {
          return $hari[date('w')].', '.date('d').' '.$bulan[date('m')].' '.date('Y');
      } elseif ($type == 'day') {
          return $hari[date('w')];
      } elseif ($type == 'month') {
          return $bulan[date('m')];
      }
  }


  // Generate string random by Stephen Watkins (Stackoverflow)
  function generateRandomString($length = 10) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
  }

