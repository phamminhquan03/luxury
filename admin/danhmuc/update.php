<?php
if(is_array($dm)){
    extract($dm);
}
?>
<div>
<h1>
    Cập nhật danh mục
 </h1>
<div>
<form action="index.php?act=updatedm" method="post">
<div class="">
 Mã loại <br>
 <input type="text" name="maloai" value="<?php if (isset($maloai) && ($maloai != "")) echo htmlspecialchars($maloai); ?>" disabled>
</div>
<div class="">
 Tên loại <br>
 <input type="text" name="name" value="<?php if (isset($name) && ($name != "")) echo htmlspecialchars($name); ?>">
</div>
<div>
    <input type="submit" name="capnhat" value="Thêm mới">
    <a href="index.php?act=listdm"><input type="button" value="Danh sách"></a>
</div>
</form>
</div>
</div>
