<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 class="h1_sanpham">Sản Phẩm</h1>
    <main>
        
        <a href="./?act=trang-add-sanpham"><button class="button_sanpham">Thêm Sản Phẩm</button></a>
        <div class="flex-grow-1">
    

</div>
<form action="./?act=loc-sanpham" method="post">
    <input type="text " name="kyw" class="form-control" placeholder="Lọc Theo Tên Sản Phẩm" aria-label="Search products">
    <select name="iddm" class="form-select">
        <option value="0" selected>All Danh mục</option>
        <?php 
          foreach($list_danhmuc as $danhmuc){
            extract($danhmuc);
            echo '<option value="'.$id.'">'.$name_dm.'</option>';
          }
        ?>
    </select>
    <input type="submit" name="listok" value="Lọc Sản Phẩm" class="btn-custom" id="">
</form>
    <table>
        <thead>
            <th>STT</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá Sản Phẩm</th>
            <th>Hình Ảnh </th>
            <th>Mô Tả Sản Phảm</th>
            <th>Danh Mục</th>
            <th>Thao Tác</th>
        </thead>
        <tbody>
            <?php foreach ($list_sanpham as $key => $sanpham): ?>
            <tr>
                <td><?php echo $key + 1  ?></td>
                <td><?php echo $sanpham['name_sp']?></td>
                <td><?php echo $sanpham['price']?></td>
                <td><img src="<?php echo $sanpham['img']?>" style="width: 200px;" alt=""></td>
                <td><?php echo $sanpham['mota']?></td>
                <td><?php echo $sanpham['name_dm']?></td>
                <td>
                    <a href="./?act=trang-sua-sanpham&id=<?php echo $sanpham['id']; ?>"><button class = "button_sua">Sửa</button></a>
                    <a href="./?act=xoa-sanpham&id=<?php echo $sanpham['id']; ?>">
                    <button onclick="confirm('bạn có muốn xóa không')" class="button_xoa">Xóa</button>
                    </a>
                </td>
            </tr>
           <?php endforeach ?>
        </tbody>

    </table>
    </main>
    
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

</body>
</html>