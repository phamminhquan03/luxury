<?php
include "../model/pdo.php";
 include "header.php";  
 if(isset($_GET['act'])){
    $act=$_GET['act'];
    switch ($act) {
        case 'adddm':
            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                $tenloai=$_POST['tenloai'];
                $sql="insert into danhmuc (tenloai) values('$tenloai')";
                pdo_execute($sql);
                $thongbao="Thêm thành công";
            }
            
             include "danhmuc/add.php";
            break;
        
             case 'addsp':
             include "sanpham/add.php";
            break;
        default:
        include "home.php";
            # code...
            break;
    }
 }else{
    include "home.php"; 
 }
 
 include "fotter.php";
?>