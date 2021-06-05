<?php
include('config/web.php');

$request = $_SERVER['REQUEST_URI'];

if(isset($_SESSION['spk_login'])){
  switch ($request) {
    
    // MAIN PAGE
    case $INDEX . '/':
        require "pages/home.php";
        break;
        
    case $INDEX . '/home':
        require "pages/home.php";
        break;
    
    case $INDEX . '/master-kriteria':
        require "pages/kriteria.php";
        break;

    case $INDEX . '/master-subkriteria':
        require "pages/subkriteria.php";
        break;

    case $INDEX . '/master-kos':
        require "pages/m_kos.php";
        break;
    
    case $INDEX . '/master-admin':
        require "pages/admin.php";
        break;

    case $INDEX . '/kos':
        require "pages/kos.php";
        break;

    // NOT FOUND
    default:
        echo '<meta http-equiv="refresh" content="0; url='.$WEB_URL.'error404.php" />';
        break;
  }
} else {
  switch ($request) {
    
    // MAIN PAGE
    case $INDEX . '/':
        require "pages/home.php";
        break;
        
    case $INDEX . '/home':
        require "pages/home.php";
        break;

    case $INDEX . '/kos':
        require "pages/kos.php";
        break;

    // NOT FOUND
    default:
        echo '<meta http-equiv="refresh" content="0; url='.$WEB_URL.'error404.php" />';
        break;
  }
}

?>