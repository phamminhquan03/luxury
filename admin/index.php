<?php 
include "../model/pdo.php";
include "header.php";
include "../model/danhmuc.php";

require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

require_once './controllers/controllers_sp.php';

require_once './models/models_sanpham.php';

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $tenloai = trim($_POST['tenloai']);
                if (empty($tenloai)) {
                    $thongbao = "Vui lòng nhập tên loại";
                } elseif (is_numeric($tenloai)) {
                    $thongbao = "Tên loại không được là số";
                } else {
                    insert_danhmuc($tenloai);
                    $thongbao = "Thêm thành công";
                }
            }
            include "danhmuc/add.php";
            break;

        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include 'danhmuc/list.php';
            break;

        case 'xoadm':
            if (isset($_GET['id']) && $_GET['id']) {
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include 'danhmuc/list.php';
            break;

        case 'suadm':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $dm = loadone_danhmuc($_GET['id']);
            }
            include 'danhmuc/update.php';
            break;

        case 'updatedm':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $name = trim($_POST['name']);
                $id = $_POST['id'];

                if (empty($name)) {
                    $thongbao = "Vui lòng nhập tên loại";
                } elseif (is_numeric($name)) {
                    $thongbao = "Tên loại không được là số";
                } else {
                    update_danhmuc($id, $name);
                    $thongbao = "Cập nhật thành công";
                }
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        //     case 'addsp':
        //     if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
        //         $iddm = $_POST['iddm'];
        //         $tensp = trim($_POST['name']);
        //         $giasp = $_POST['price'];
        //         $mota = trim($_POST['mota']);
        //         $hinh = $_FILES['img']['name'];
        //         $target_dir = "../upload/";
        //         $target_file = $target_dir . basename($_FILES['img']['name']);

        //         if (!empty($hinh)) {
        //             move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
        //         }



        //         insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
        //         $thongbao = "Thêm thành công";
        //     }
        //     $listdanhmuc = loadall_danhmuc();
        //     include "sanpham/add.php";
        //     break;
        // case "listsp":
        //     if (isset($_POST['listok']) && ($_POST['listok'])) {
        //         $kyw = $_POST['kyw'];
        //         $iddm = $_POST['iddm'];
        //     } else {
        //         $kyw = "";
        //         $iddm = 0;
        //     }
        //     $listdanhmuc = loadall_danhmuc();
        //     $listsanpham = loadall_sanpham($kyw, $iddm);
        //     include 'sanpham/list.php';
        //     break;
        // case "xoasp":
        //     if (isset($_GET['id']) && ($_GET['id'])) {
        //         delete_sanpham($_GET['id']);
        //     }
        //     $listsanpham = loadall_sanpham();
        //     include 'sanpham/list.php';
        //     break;
        // case "suasp":
        //     if (isset($_GET['id']) && ($_GET['id'] > 0)) {
        //         $sanpham = loadone_sanpham($_GET['id']);
        //     }
        //     $listdanhmuc = loadall_danhmuc();
        //     include 'sanpham/update.php';
        //     break;
        // case "updatesp":
        //     if(isset($_POST['capnhat']) && ($_POST['capnhat'])){
        //         $id = $_POST['id'];
        //         $iddm = $_POST['iddm'];
        //         $tensp = $_POST['tensp'];
        //         $giasp = $_POST['giasp'];
        //         $mota = $_POST['mota'];
        //         $hinh = $_FILES['hinh']['name'];
        //         $target_dir = "../upload/";
        //         $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
        //         if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
        //         } else {
        //         }
        //         update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh);
        //     $thongbao = "Cập nhật thành công";
        //     }
        //     $listdanhmuc = loadall_danhmuc();
        //     $listsanpham = loadall_sanpham("",0);
        //     include "sanpham/list.php";
        //     break;
    }
}







$act = $_GET['act'] ?? '/';
$act = strtolower($act);

// Sử dụng match để xử lý các hành động sản phẩm
match ($act) {
    'trang-danh-sach' => (new sanpham_controllers())->form_danhsach(),
    'trang-add-sanpham' => (new sanpham_controllers())->form_addsanpham(),
    'them-sanpham' => (new sanpham_controllers())->create_addsanpham(),
    'trang-sua-sanpham' => (new sanpham_controllers())->form_update_sanpham(),
    'sua-sanpham' => (new sanpham_controllers())->update_sanpham(),
    'xoa-sanpham' => (new sanpham_controllers())->delete_sanpham(),
    
    // Add adddm action for handling category addition
    'adddm' => function() {
        if (isset($_POST['themmoi']) && $_POST['themmoi']) {
            $tenloai = trim($_POST['tenloai']);
            if (empty($tenloai)) {
                $thongbao = "Vui lòng nhập tên loại";
            } elseif (is_numeric($tenloai)) {
                $thongbao = "Tên loại không được là số";
            } else {
                insert_danhmuc($tenloai);
                $thongbao = "Thêm thành công";
            }
        }
        include "danhmuc/add.php";
    },

    'listdm' => function() {
        $listdanhmuc = loadall_danhmuc();
        include 'danhmuc/list.php';
    },
    'xoadm' => function(){
        if (isset($_GET['id']) && $_GET['id']) {
            delete_danhmuc($_GET['id']);
        }
        $listdanhmuc = loadall_danhmuc();
        include 'danhmuc/list.php';
    },

    'suadm' => function(){
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $dm = loadone_danhmuc($_GET['id']);
        }
        include 'danhmuc/update.php';
    },
        
    'updatedm' => function(){
        if (isset($_POST['capnhat']) && $_POST['capnhat']) {
            $name = trim($_POST['name']);
            $id = $_POST['id'];

            if (empty($name)) {
                $thongbao = "Vui lòng nhập tên loại";
            } elseif (is_numeric($name)) {
                $thongbao = "Tên loại không được là số";
            } else {
                update_danhmuc($id, $name);
                $thongbao = "Cập nhật thành công";
            }
        }
        $listdanhmuc = loadall_danhmuc();
        include "danhmuc/list.php";
    },
        



    // Default case to handle unsupported actions
    default => throw new Exception("Hành động không được hỗ trợ: $act"),
};

?>
