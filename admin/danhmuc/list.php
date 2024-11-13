<h1>
    Danh sách danh mục
</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Chức năng</th>
    </tr>
  </thead>
  <tbody>
    <?php
        usort($listdanhmuc, function($a, $b) {
            return $a['id'] - $b['id'];
          });
      foreach($listdanhmuc as $danhmuc){
        extract($danhmuc);
        $suadm = "index.php?act=suadm&id=".$id;
        $xoadm = "index.php?act=xoadm&id=".$id;
        echo '
        <tr>
      <th scope="row">'.$id.'</th>
      <td>'.$name.'</td>
      <td><center><a href="'.$suadm.'"><input type="button" value="Sửa"></a>  <a href="'. $xoadm.'"><input class="bg-danger" type="button" value="Xóa"></center></td></a>
    </tr>
        ';
      }
    ?>
    

  </tbody>

</table>
<div class="pt-2">
                    <input type="button" value="Chọn tất cả">
                    <input type="button" value="Bỏ chọn tất cả">
                    <input type="button" value="Xóa các mục đã chọn">
                    <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
                </div>