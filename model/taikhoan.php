<?php
 function insert_taikhoan($email, $user, $pass, $role){
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "INSERT INTO taikhoan (email, user,pass,role) VALUES ('$email','$user','$pass','$role')";
    pdo_execute($sql);
 }
 function checkuser($user,$pass){
    $sql ="SELECT * FROM taikhoan where user = '".$user."' AND pass = '".$pass."'";
    $sp = pdo_query_one($sql);
    return $sp;
 }
?>