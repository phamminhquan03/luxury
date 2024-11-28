<?php
class taikhoan_controllers {
    public $models_taikhoan;

    public function __construct() {
        $this->models_taikhoan = new models_taikhoan(); 
    }
    // sử lý tài khoản 
    public function form_taikhoan(){
        $list_taikhoan = $this -> models_taikhoan -> taikhoan();
        require_once './views/form_danhsachtaikhoan.php';
    }

    public function cap_quyen_taikhoan(){
        if( $_SERVER['REQUEST_METHOD'] == 'POST'){
            $role = $_POST['role'];
            $id = $_POST['id'];
            if($this -> models_taikhoan ->update_taikhoan($role,$id)){
                header('Location: ./?act=danh-sach-taikhoan');
            }else {
                echo"Lỗi";
            }
        }
    }

    public function form_list_bill(){
        $list_bill = $this -> models_taikhoan -> list_bill();
        require_once './views/form_danhsachbill.php';
    }
    
    public function trang_thai_bill(){
        if( $_SERVER['REQUEST_METHOD'] == 'POST'){
            $bill_pttt = $_POST['bill_pttt'];
            $bill_status = $_POST['bill_status'];
            $bill_thanhtoan = $_POST['bill_thanhtoan'];
            $id = $_POST['id'];
            if($this -> models_taikhoan ->update_bill($bill_pttt,$bill_status,$bill_thanhtoan,$id)){
                header('Location: ./?act=danh-sach-bill');
            }else {
                echo"Lỗi";
            }
        }
    }
}
?>