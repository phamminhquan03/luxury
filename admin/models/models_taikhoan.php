<?php

class models_taikhoan{
    public $conn;

    public function __construct() {
        $this->conn = connectDB(); 
    }
   // phần sử lý phân quyền tài khoản 
    // hiển thị danh sách tài khoản 

    public function taikhoan(){
        try{
            $sql = 'SELECT * FROM taikhoan';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error deleting product: " . $e->getMessage());
            return false;
        }
    }
    public function update_taikhoan($role,$id){
        try{
            $sql = 'UPDATE taikhoan
            SET role = :role
            WHERE id = :id ';
            $stmt = $this-> conn  -> prepare($sql);
            $stmt ->execute([ ':role' => $role ,':id' => $id]);
            return true;
        }catch (Exception $e) {
            echo "Lỗi: ". $e->getMessage();
        }
    }
    public function list_bill(){
        try{
            $sql = 'SELECT * FROM bill';
            $stmt = $this-> conn -> prepare($sql);
            $stmt ->execute();
            return $stmt->fetchAll();
        }catch (Exception $e) {
            echo "Lỗi: ". $e->getMessage();
        }
    }
    public function update_bill($bill_pttt,$bill_status,$bill_thanhtoan,$id){
        try{
            $sql = 'UPDATE bill
            SET bill_pttt = :bill_pttt,
                bill_status = :bill_status,
                bill_thanhtoan = :bill_thanhtoan
            WHERE id = :id ';
            $stmt = $this-> conn  -> prepare($sql);
            $stmt ->execute([ ':bill_pttt' => $bill_pttt, ':bill_status' =>  $bill_status,':bill_thanhtoan' => $bill_thanhtoan,':id' => $id]);
            return true;
        }catch (Exception $e) {
            echo "Lỗi: ". $e->getMessage();
        }
    }
}
?>