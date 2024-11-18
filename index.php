<?php
 session_start();
 include "model/pdo.php";
 include "model/danhmuc.php";
 include "model/sanpham.php";
 $dsdm = loadall_danhmuc();
 ob_start();
 include "view/header.php";
 include "view/home.php";
 include "view/footer.php";
 
?>
