<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
</head>
<body>
  <h1 class="h1_sanpham">Thêm Sản Phẩm</h1>
  <main>

        <a href="./?act=trang-danh-sach"><button class="button_sanpham">Danh sách Sản Phẩm</button></a>
    
    <form class="form_add" action="./?act=them-sanpham" method="POST" enctype="multipart/form-data">
        <label for="name_sanpham">Tên Sản Phẩm</label><br>
        <input type="text" name="name_sanpham" id="name_sanpham" placeholder="Nhập tên sản phẩm" required><br>
        
        <label for="price_sanpham">Giá Sản Phẩm</label><br>
        <input type="text" name="price_sanpham" id="price_sanpham" placeholder="Nhập giá sản phẩm" required><br>

        <label for="img_sanpham">Ảnh Sản Phẩm</label><br>
        <input type="file" name="img_sanpham" id="img_sanpham" required><br>

        <label for="mota_sanpham">Mô Tả Sản Phẩm</label><br>
        <input type="text" name="mota_sanpham" id="mota_sanpham" placeholder="Nhập mô tả sản phẩm" required><br>

        <label for="id_sanpham">Danh Mục Sản Phẩm</label>
        
        <select name="id_sanpham" id="">
        <?php 
          foreach($list_danhmuc as $danhmuc){
            extract($danhmuc);
            echo '<option value="'.$id.'">'.$name_dm.'</option>';
          }
        ?>
        </select><br>
        
        <button class="button_them" type="submit">Thêm Sản Phẩm</button>
    </form>
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
        input[type="text"] {
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
