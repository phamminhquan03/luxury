<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <h2 class="h1_sanpham">Quản Lý Tài Khoản</h2>
            
        <table>
            <tbody>
                <thead>
                    <th>STT</th>
                    <th>Tên Tài Khoản</th>
                    <th>Email</th>
                    <th>Địa Chỉ </th>
                    <th>Số Điện Thoại</th>
                    <th>Chức vụ</th>
                    <th>Cấp quyền</th>
                </thead> 
                    <?php foreach ($list_taikhoan as $key => $taikhoan): ?>
                        <tr>
                        
                            <td><?php echo $key + 1?></td>
                            <td><?php echo $taikhoan['user']?></td>
                            <td><?php echo $taikhoan['email']?></td>
                            <td><?php echo $taikhoan['address']?></td>
                            <td><?php echo $taikhoan['tel']?></td>
                            <td><?php
                                if($taikhoan['role'] == 1){
                                    echo"ADmin Quản lý";
                                }else if ($taikhoan['role'] == 2){
                                    echo"Nhân Viên";
                                }else {
                                    echo"khách Hàng";
                                }?>
                            </td>
                            <td> 
                                <form action="./?act=sua-chuc-vu" method="post">
                                <input type="hidden" name="id" value="<?php echo $taikhoan['id'] ?>">
                                    <select name="role">
                                        <option <?php echo $taikhoan['role'] == 1 ? 'Selected': ''; ?> value="1">ADMIN Quản LÝ</option>
                                        <option <?php echo $taikhoan['role'] == 0 ? 'Selected': ''; ?> value="0">Khách Hàng</option>
                                    </select>
                                    <button type="submit" class="button_sua">Lưu</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </main>
   
    
</body>
<style>
        main{
            width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .h1_sanpham{
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .button_sanpham{
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); 
            border: none;
            outline: none;
        }
        .button_sanpham:hover {
            background-color: #ff7e3c;
            color: #fff;
        }
        .button_sua{
            padding: 5px;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); 
            border: none;
            outline: none;
        }
        .button_sua:hover {
            background-color:#007bff;
            color: #fff;
        }
        .button_xoa{
            padding: 5px;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); 
            border: none;
            outline: none;
        }
        .button_xoa:hover {
            background-color: red;
            color: #fff;
        }
        table{
            width: 950px;
            margin-top : 10px;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
        background-color: #007bff;
        border: none;
        color: white;
        border-radius: 5px;
        padding: 10px 15px;
        transition: background-color 0.3s ease;
        text-align: center;
    }

    .btn-custom:hover {
        background-color: #0056b3;
    }
    th{
        text-align: center;
    }
    td{
        text-align: center;
    }
    </style>
</html>