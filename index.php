<?php
 session_start();
 include "model/pdo.php";
 include "model/danhmuc.php";
 include_once 'model/sanpham.php';
 include "model/taikhoan.php";
 $imgpath = "./upload/";
 $dsdm = loadall_danhmuc();
 $spnew = loadall_sanpham_home();
 ob_start();
 include "view/header.php";



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
            include "view/sanpham.php";
            break;

            case 'sanphamct':
                if(isset($_GET['idsp']) && ($_GET['idsp'] >0)){
                    $id = $_GET['idsp'];
                    $onesp = loadone_sanpham($id);
                    extract($onesp);
                    include "view/sanphamct.php";
                }else{
                    include 'view/home.php';
                }
                break;
            case 'dangky':
                if(isset($_POST['dangky']) && ($_POST['dangky'])){
                    $email = $_POST['email'] ?? '';
                    $user = $_POST['user'] ?? '';
                    $pass = $_POST['pass'] ?? '';
                    $role = $_POST['role'] ?? '';
                    $errors = [];
            
                    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errors['email'] = "Email không hợp lệ.";
                    }
            
                    if (empty($user) || strlen($user) < 3) {
                        $errors['user'] = "Tên đăng nhập phải có ít nhất 3 ký tự.";
                    }
            
                    if (empty($pass) || strlen($pass) < 6) {
                        $errors['pass'] = "Mật khẩu phải có ít nhất 6 ký tự.";
                    }

                    if (empty($errors)) {

                        insert_taikhoan($email, $user, $pass, $role);
                        $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập để thực hiện chức năng.";

                        $email = '';
                        $user = '';
                        $pass = '';
                    }
                }
                include "view/taikhoan/dangky.php";
                break;

                case 'dangnhap':
                    if(isset($_POST['dangnhap']) && ($_POST['dangnhap'])){
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $checkuser = checkuser($user,$pass);
                        if(is_array($checkuser)){
                            $_SESSION['user'] = $checkuser;
                            header('location: index.php');
                        }else{
                            $thongbao = "Tài khoản tồn tại vui lòng thử lại";
                        }
                    }
                    include "view/taikhoan/dangnhap.php";
              break;
                default:
            include "view/home.php";
            break;
            case 'thoat':
                unset($_SESSION['user']);
                header('location:index.php');
                break;
    }
}else{
        include "view/home.php";
    }

 include "view/footer.php";
?>
