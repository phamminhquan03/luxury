<?php 
class sanpham_controllers {
    public $models_sanpham;

    public function __construct() {
        $this->models_sanpham = new models_sanpham();
    }

    public function form_danhsach() {
        $list_sanpham = $this->models_sanpham->danhsach_sanpham();
        $list_danhmuc = $this->models_sanpham->danhsach_danhmuc();
        require_once './views/form_danhsachsanpham.php';
    }

    public function Filter() {
        // Get the values from the POST request
        if (isset($_POST['listok']) && ($_POST['listok'])) {
            $kyw = $_POST['kyw'];
            $iddm = $_POST['iddm'];
        } else {
            $kyw = "";
            $iddm = 0;
        }
    
        // Call the modified method from the model with the filters
        $list_sanpham = $this->models_sanpham->danhsach_sanpham($kyw, $iddm);
        $list_danhmuc = $this->models_sanpham->danhsach_danhmuc();
    
        // Load the view
        require_once './views/form_danhsachsanpham.php';
    }
    
    public function form_addsanpham() {
        $list_danhmuc = $this->models_sanpham->danhsach_danhmuc();
        require_once './views/form_add_sanpham.php';
    }

    public function create_addsanpham() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name_sp = $_POST['name_sanpham'];
            $price = $_POST['price_sanpham'];
            $mota = $_POST['mota_sanpham'];
            $iddm = $_POST['id_sanpham'];
            
            $file_save = uploadFile($_FILES['img_sanpham'], './uploads/');
            if ($file_save) {
                if ($this->models_sanpham->add_sanpham($name_sp, $price, $file_save, $mota, $iddm)) {
                    header('Location: ./?act=trang-danh-sach');
                    exit;
                } else {
                    echo "Error adding product.";
                }
            } else {
                echo "Invalid file upload.";
            }
        }
    }

    public function form_update_sanpham() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('location:./?act=trang-danh-sach');
            exit;
        }
        $sanpham = $this->models_sanpham->get_sanpham($id);
        $list_danhmuc = $this->models_sanpham->danhsach_danhmuc();
        require_once './views/form_update_sanpham.php';
    }

    public function update_sanpham() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name_sp = $_POST['name_sanpham'];
            $price = $_POST['price_sanpham'];
            $mota = $_POST['mota_sanpham'];
            $iddm = $_POST['iddm_sanpham'];
            $id = $_POST['id'];
            
            $old_file = $_POST['old_file'];
            $file_update = $_FILES['img'];
            
            if (isset($file_update) && $file_update['error'] === UPLOAD_ERR_OK) {
                $new_file = uploadFile($file_update, './uploads/');
                if (!empty($old_file)) {
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }

            if ($this->models_sanpham->update_sanpham($id, $name_sp, $price, $new_file, $mota, $iddm)) {
                header('location:./?act=trang-danh-sach');
                exit;
            } else {
                echo "Error updating product.";
            }
        }
        
    }

    public function delete_sanpham() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('location:./?act=trang-danh-sach');
            exit;
        }

        $sanpham = $this->models_sanpham->get_sanpham($id);
        if ($sanpham) {
            if (!empty($sanpham['img'])) {
                deleteFile($sanpham['img']);
            }
            if ($this->models_sanpham->delete_sanpham($id)) {
                header('location:./?act=trang-danh-sach');
                exit;
            }
        } else {
            echo "Product not found.";
        }
    }
}
?>
