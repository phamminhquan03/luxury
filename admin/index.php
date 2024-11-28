<?php 
include "../model/pdo.php";
include "header.php";
include "../model/danhmuc.php";

require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// biến môi trường sản phẩm
require_once './controllers/controllers_sp.php';

require_once './models/models_sanpham.php';
// biến môi trường tài khoản
require_once './controllers/controllers_taikhoan.php';

require_once './models/models_taikhoan.php';

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

        case "index":
            include "admin/home.php";
            break;
    }
}







$act = $_GET['act'] ?? 'index'; // Default action

match ($act) {
    
    'trang-danh-sach' => (new sanpham_controllers())->form_danhsach(),
    'trang-add-sanpham' => (new sanpham_controllers())->form_addsanpham(),
    'them-sanpham' => (new sanpham_controllers())->create_addsanpham(),
    'trang-sua-sanpham' => (new sanpham_controllers())->form_update_sanpham(),
    'sua-sanpham' => (new sanpham_controllers())->update_sanpham(),
    'xoa-sanpham' => (new sanpham_controllers())->delete_sanpham(),
    'loc-sanpham' => (new sanpham_controllers())->Filter(),

    'danh-sach-taikhoan' => (new taikhoan_controllers())->form_taikhoan(),
    'sua-chuc-vu' => (new taikhoan_controllers())->cap_quyen_taikhoan(),
    'danh-sach-bill' => (new taikhoan_controllers())->form_list_bill(),
    'sua-trang-thai' => (new taikhoan_controllers())->trang_thai_bill(),




    'index' => function() {
            include "admin/home.php"; // Display homepage
        },
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
    'xoadm' => function() {
        if (isset($_GET['id']) && $_GET['id']) {
            delete_danhmuc($_GET['id']);
        }
        $listdanhmuc = loadall_danhmuc();
        include 'danhmuc/list.php';
    },
    'suadm' => function() {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $dm = loadone_danhmuc($_GET['id']);
        }
        include 'danhmuc/update.php';
    },
    'updatedm' => function() {
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
    default => throw new Exception("Hành động không được hỗ trợ: $act"),
};

?>
