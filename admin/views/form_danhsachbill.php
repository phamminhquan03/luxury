<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <h2 class="h1_sanpham">Quản Lý Đơn Hàng</h2>
            
        <table>
            <tbody>
                <thead>
                    <th>STT</th>
                    <th>Khách Hàng</th>
                    <th>Địa Chỉ</th>
                    <th>Số Điện Thoại</th>
                    <th>Email</th>
                    <th>Phương Thức TT</th>
                    <th>Ngày Đặt Đơn</th>
                    <th>Tổng Hóa Đơn</th>
                    <th>Trạng Thái</th>
                    <th>Thanh Toán</th>
                    <th>Thao tác</th>
                </thead> 
                    <?php foreach ($list_bill as $key => $bill): ?>
                        <tr>
                            <td><?php echo $key + 1?></td>
                            <form class="form_bill" action="./?act=sua-trang-thai" method="post">
                            <input type="hidden" name="id" value="<?php echo $bill['id'] ?>">
                                
                                <td><?php echo $bill['bill_name']?></td>
                                <td><?php echo $bill['bill_address']?></td>
                                <td><?php echo $bill['bill_tel']?></td>
                                <td><?php echo $bill['bill_email']?></td>

                                <td>
                                    <select name="bill_pttt">
                                        <option <?php echo $bill['bill_pttt'] == 1 ? 'Selected': ''; ?> value="1">Thanh Toán Trực Tiếp</option>
                                        <option <?php echo $bill['bill_pttt'] == 2 ? 'Selected': ''; ?> value="2">Thanh Toán online</option>
                                    </select>
                                </td>

                                <td><?php echo $bill['ngaydathang']?></td>
                                <td><?php echo $bill['total']." USD"; ?></td>

                                <td> 
                                    <select name="bill_status">
                                        <option <?php echo $bill['bill_status'] == 0 ? 'Selected': ''; ?> value="0">Đơn Hàng Mới</option>
                                        <option <?php echo $bill['bill_status'] == 1 ? 'Selected': ''; ?> value="1">Đang Chuẩn Bị</option>
                                        <option <?php echo $bill['bill_status'] == 2 ? 'Selected': ''; ?> value="2">Đơn Hàng Đã Giao</option>
                                    </select>
                                    
                                </td>
                                <td>
                                    <select name="bill_thanhtoan">
                                        <option <?php echo $bill['bill_status'] == 1 ? 'Selected': ''; ?> value="1">Chưa Thanh Toán</option>
                                        <option <?php echo $bill['bill_status'] == 2 ? 'Selected': ''; ?> value="2">Đã Thanh toán</option>
                                    </select>
                                </td>
                                <td><button type="submit" class="button_sua">Lưu Trạng Thái Đơn</button></td>
                            </form>
                        </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </main>
   
    
</body>
<style>
        main{
            width: 1200px;
            margin: auto 300px;
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
            width: 1150px;
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
    
    select{
        width: 120px;
    }
    th{
        font-size: 15px;
        text-align: center;
    }
    td{
        font-size: 10px;
        text-align: center;
    }
    </style>
</html>