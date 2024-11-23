<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>       
    <h1 class="h1_sanpham">Chỉnh Sửa Sản phẩm</h1>
    <main>
    <a href="./?act=trang-danh-sach"><button class="button_sanpham">Danh sách Sản Phẩm</button></a>
        <table>
            <h2>Sửa Sản Phẩm : <?php echo $sanpham['name_sp']?></h2>
            <form action="./?act=sua-sanpham" method="post" enctype ="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $sanpham['id'] ?>">
                <label for="">Tên Sản Phẩm:</label>
                <input type="text" name="name_sanpham" value="<?php echo $sanpham['name_sp'] ?>" placecholder="Nhập tên sản Phẩm"><br>

                <label for="">Gía Tiền: </label>
                <input type="number" name="price_sanpham" value="<?php echo $sanpham['price'] ?>" placecholder="Nhập giá tiền"><br>

                <input type="hidden" name="old_file" value="<?php echo $sanpham['img']?>">
                <label for="">Hình Ảnh:</label>
                <input type="file" name="img" placeholder="Chọn hình ảnh"> <br>

                <label for="">Mô tả sản Phẩm :</label>
                <input type="text" name="mota_sanpham" value="<?php echo $sanpham['mota'] ?>" placechoder="Nhập mô tả"><br>

                <label for="">Danh Mục</label>
                <select name="iddm_sanpham">
                    
                    <?php 
                    foreach($list_danhmuc as $danhmuc){
                        extract($danhmuc);
                        echo '<option value="'.$id.'">'.$name_dm.'</option>';
                    }
                    ?>

                </select>
                

                <button class="button_them" type="submit">sửa Sản Phẩm</button>

            </form>
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
        .form_add{
          margin: 10px;
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
        input[type="text"],[type="number"]{
          width: 100%;
          padding: 10px;
          margin-top: 5px;
          margin-bottom: 20px;
          border: 1px solid #ccc;
          border-radius: 5px;
          font-size: 16px;
          transition: border-color 0.3s ease;
        }
        input[type="file"]{
          padding: 10px;
          border-radius: 10px;
          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); 

        }
        input[type="file"]:hover {
          background-color:#28a745;
          color: #fff;

        }
        .button_them{
          margin: 0px 400px;
          padding: 10px;
          border-radius: 5px;
          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); 
          border: none;
          outline: none;
        }
        .button_them:hover {
            background-color:#007bff;
            color: #fff;
        }
    </style>
</html>