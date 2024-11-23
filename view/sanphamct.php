<div class="container product-detail py-5">
    <?php
    // Dữ liệu sản phẩm (thông qua biến PHP)
    $img = $imgpath.$img; // Đảm bảo đường dẫn ảnh đúng
    // Hiển thị nội dung HTML với dữ liệu động
    echo '
    <div class="row">
        <!-- Product Images -->
        <div class="col-lg-6">
            <div class="product-images">
                <img id="main-image" src="' . $img . '" alt="Main Product Image" class="img-fluid mb-3">

            </div>
        </div>

        <!-- Product Details -->
        <div class="col-lg-6">
            <h2 class="product-title">' . $name_sp . '</h2>
     
            <div class="rating mb-3">
                <span>⭐⭐⭐⭐⭐</span> <span>(0 đánh giá)</span>
            </div>
            <h3 class="price text-danger">' . $price . '</h3>

            <!-- Quantity Selector -->
            <div class="quantity-selector mb-4">
                <label for="quantity">Số lượng:</label>
                <div class="d-flex align-items-center">
                   
                    <input type="number" id="quantity" value="1" class="form-control text-center mx-2" style="width: 60px;">
                  
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button class="btn btn-primary px-4 me-3">THÊM VÀO GIỎ</button>
                <button class="btn btn-outline-secondary px-4">MUA HÀNG</button>
            </div>

            <!-- Tabs -->
            <div class="product-tabs mt-5">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#description" class="nav-link active" data-bs-toggle="tab">GIỚI THIỆU</a>
                    </li>
                    <li class="nav-item">
                        <a href="#details" class="nav-link" data-bs-toggle="tab">CHI TIẾT SẢN PHẨM</a>
                    </li>
                    <li class="nav-item">
                        <a href="#care" class="nav-link" data-bs-toggle="tab">BẢO QUẢN</a>
                    </li>
                </ul>
                <div class="tab-content mt-3">
                    <div id="description" class="tab-pane fade show active">
                        <p>' . $mota . '</p>
                    </div>
                    <div id="details" class="tab-pane fade">
                        <p>Chi tiết sản phẩm sẽ hiển thị ở đây.</p>
                    </div>
                    <div id="care" class="tab-pane fade">
                        <p>Hướng dẫn bảo quản sẽ hiển thị ở đây.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';
    ?>
</div>
