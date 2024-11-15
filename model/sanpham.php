<?php
 function insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm){
    $sql = "INSERT INTO sanpham(name,price,img,mota,iddm) VALUES ('$tensp','$giasp','$hinh','$mota','$iddm')";
pdo_execute($sql);
 }
function loadall_sanpham($kyw="",$iddm=0){
$sql = "SELECT * FROM sanpham WHERE 1";
if($kyw!=""){
    $sql.="and name like'%".$kyw."%";
}
if ($iddm>0){
    $sql.="and iddm ='".$iddm."'";

}
$sql.=" ORDER BY id desc";

$listsanpham = pdo_query($sql);
return $listsanpham;
}

?>