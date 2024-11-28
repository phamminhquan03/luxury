<?php
class models_sanpham {
    public $conn;

    public function __construct() {
        $this->conn = connectDB(); // Ensure the database connection is properly established
    }
    // hiển thị và lọc timg kiếm sản phẩm
    public function danhsach_sanpham($kyw = "", $iddm = 0) {
        try {
            $sql = 'SELECT sanpham.*, danhmuc.name_dm 
                    FROM sanpham
                    JOIN danhmuc ON sanpham.iddm = danhmuc.id
                    WHERE 1';
            if (!empty($kyw)) {
                $sql .= " AND sanpham.name_sp LIKE :kyw";
            }
            if ($iddm > 0) {
                $sql .= " AND sanpham.iddm = :iddm";
            }

            $sql .= ' ORDER BY sanpham.id DESC';

            $stmt = $this->conn->prepare($sql);
            if (!empty($kyw)) {
                $stmt->bindValue(':kyw', '%' . $kyw . '%'); 
            }
            if ($iddm > 0) {
                $stmt->bindValue(':iddm', $iddm);
            }

            $stmt->execute();
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            error_log("Error fetching product list: " . $e->getMessage());
            return [];
        }
    }
    // thêm sản phẩm 
    public function add_sanpham($name_sp, $price, $img, $mota, $iddm) {
        try {
            $sql = 'INSERT INTO sanpham (name_sp, price, img, mota, iddm) 
                    VALUES (:name_sp, :price, :img, :mota, :iddm)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':name_sp' => $name_sp,
                ':price' => $price,
                ':img' => $img,
                ':mota' => $mota,
                ':iddm' => $iddm,
            ]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Error adding product: " . $e->getMessage());
            return false;
        }
    }
    //hiển thị danh mục sản phẩm 
    public function danhsach_danhmuc(){
        try {
            $sql = 'SELECT * FROM danhmuc';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error fetching product list: " . $e->getMessage());
            return true;
        }
    }
    // tìm kiếm id
    public function get_sanpham($id) {
        try {
            $sql = 'SELECT sanpham.*, danhmuc.name_dm 
                    FROM sanpham 
                    JOIN danhmuc ON sanpham.iddm = danhmuc.id 
                    WHERE sanpham.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch() ?: null;
        } catch (PDOException $e) {
            error_log("Error fetching product: " . $e->getMessage());
            return null;
        }
    }
    // sửa chữa lại sản phẩm 
    public function update_sanpham($id, $name_sp, $price, $img, $mota, $iddm) {
        try {
            $sql = 'UPDATE sanpham 
                    SET name_sp = :name_sp,
                        price = :price,
                        img = :img,
                        mota = :mota,
                        iddm = :iddm
                    WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':name_sp' => $name_sp,
                ':price' => $price,
                ':img' => $img,
                ':mota' => $mota,
                ':iddm' => $iddm,
                ':id' => $id,
            ]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Error updating product: " . $e->getMessage());
            return false;
        }
    }
    // xóa sản phẩm 
    public function delete_sanpham($id) {
        try {
            $sql = 'DELETE FROM sanpham WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Error deleting product: " . $e->getMessage());
            return false;
        }
    }

}
?>
