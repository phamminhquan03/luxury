<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";

if (isset($_GET['act'])){
    $act = $_GET['act'];
    switch($act){
        case 'adddm' :
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])){
                   $tenloai = trim($_POST['tenloai']);
           if (empty($tenloai)){

           $thongbao ="Vui lòng nhập tên loại";
           }elseif(is_numeric($tenloai)){
          $thongbao ="Tên loại không được là số";
           
            }else{
                insert_danhmuc($tenloai);
                $thongbao ="Thêm thành công";
            }  
    }
    include "danhmuc/add.php";
    break;
}
}

?>