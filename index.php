<?php
 session_start();
 include "model/pdo.php";
 include "model/danhmuc.php";
 include_once 'model/sanpham.php';
 $imgpath = "./upload/";
 $dsdm = loadall_danhmuc();
 $spnew = loadall_sanpham_home();
 ob_start();
 include "view/header.php";
 include "view/home.php";
 include "view/footer.php";


if(isset($_GET['act']) && ($_GET['act']!="")){
    $act = $_GET['act'];
    switch($act){
        case 'sanpham':
            if (isset($_POST['kyw']) && ($_POST['kyw']!="")){
                $kyw = $_POST['kyw'];
            }else{
                $kyw = "";
            }
            if(isset($_GET['iddm']) && ($_GET['iddm']>0)){
                $iddm = $_GET['iddm'];
            }else{
                $iddm = 0;
            }$dssp = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);
            include "view/home.php";
    }
}
 
?>
