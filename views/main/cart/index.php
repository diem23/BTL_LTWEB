<?php

include_once('views/main/navbar.php');
$total = 0 ;
$x = 0;  

if (isset($_SESSION["shopping_cart"])) {
    $x = count($_SESSION["shopping_cart"]); 
}
?>

<section class="cart">
    <div class="container">
        <div class="delivery-top-wrap">
            <div class="delivery-top">
                <div class="delivery-top-delivery-adress delivery-top-item"> <span
                        class="bi bi-cart-fill text-muted fs-5 custom-icon1"></span> </div>
                <div class="delivery-top-delivery delivery-top-item"> <span
                        class="bi bi-cash-stack text-muted fs-5 custom-icon"></span> </div>
                <div class="delivery-top-delivery-payment delivery-top-item"> <span
                        class="bi bi-check-circle-fill text-muted fs-5 custom-icon"></span> </div>
            </div>
        </div>
    </div>
    <div class="container1">
        <div class="cart-content-header">
            <p style="font-size:23px;line-height:24px;font-weight:600;">Giỏ hàng của bạn có <span
                    style="color:#d73831;">
                    <?php echo $x; ?> sản phẩm</span></p>
        </div>

        <div class="cart-content row">
            <div class="cart-content-left">
                <table>
                    <tr>
                        <th style="width:180px;">ẢNH</th>
                        <th style="width:200px;">TÊN SẢN PHẨM</th>
                        <th>Size</th>
                        <th>GIÁ</th>
                        <th style="width:80px;padding-left:30px;">SALE</th>
                        <th>SỐ LƯỢNG</th>
                        <th>THÀNH TIỀN</th>
                        <th style="width:60px;"></th>
                    </tr>
                    <form action="index.php?page=main&controller=cart&action=update" method="POST">
                        <?php 
                    if(isset($_SESSION["shopping_cart"])){
                        
                        foreach($_SESSION['shopping_cart'] as $key => $value){ 
                            $temp = $value['product_quantity'] * ($value['product_price'] * (1-$value['product_sale']/100)) ;
                   
                    $total += $temp ; 
                        
                    ?>
                        <tr>
                            <td>
                                <img src="<?php echo $value['product_image'] ?>" alt="" />
                            </td>
                            <td>
                                <p style="text-transform:capitalize;text-align:center;">
                                    <?php echo $value['product_name'] ?></p>
                            </td>
                            <td>
                                <p style="text-transform:capitalize;text-align:center;">
                                    <?php echo $value['product_size'] ?></p>
                            </td>
                            <td>
                                <p style="text-transform:capitalize;text-align:center;">
                                    <?php echo $value['product_price'] ?></p>
                            </td>
                            <td>
                                <p style="text-transform:capitalize;text-align:center;">
                                    <?php echo $value['product_sale'] ?>%</p>
                            </td>
                            <td>
                                <div style="display: flex; align-items: center;">

                                    <input type="number" min="1" class="inputsoluong"
                                        style="width: 60px; font-size: 18px;"
                                        name="qty[<?php echo $value['product_id'] ?>]"
                                        value="<?php echo $value['product_quantity'] ?>">

                                </div>
                            </td>
                            <td>
                                <p style="text-transform:capitalize;text-align:center;">
                                    <?php echo $value['product_quantity'] * ($value['product_price'] * (1-$value['product_sale']/100))?>
                                </p>
                            </td>

                            <td>
                                <button type="submit" value=" <?php echo $value['product_id']  ?>" name="delete_cart"
                                    class="icon-button">
                                    <i class="fas fa-trash" style="color:#ac2f33;font-size:26px;"></i> </button>

                            </td>


                        </tr>
                        <?php
                    }
                }
            ?>
                        <div class="col_table_name" style="text-align: right;">
                            <button type="submit" value=" <?php echo $value['product_id']  ?>" name="update_cart"
                                class="btn btn-sm btn-primary">
                                Update </button>
                        </div>

                    </form>

                </table>

            </div>

            <div class="cart-content-right">
                <div class="total-money-content">
                    <p style="font-size:23px;font-weight:550;color:#221F20;margin-bottom:18px;">Tổng tiền giỏ hàng</p>
                    <table>
                        <tr>
                            <td>Tổng sản phẩm</td>
                            <td style="width: 74%;"> <?php echo $x ; ?></td>
                        </tr>
                        <tr>
                            <td>Tổng tiền hàng</td>
                            <td><?php echo $total?>đ</td>
                        </tr>
                        <tr>
                            <td>Thành tiền</td>
                            <td style="color: black;font-size:18px">
                                <strong><?php echo $total?>đ</strong>
                            </td>
                        </tr>
                    </table>
                    <p style="color: #AC2F33;padding-right:30px;padding-bottom:18px;"><i style="padding-right:10px;"
                            class="fas fa-exclamation-circle"></i>Miễn <b>đổi trả</b> đối với sản phẩm đồng giá /sale
                        trên 50%</p>
                    <p style="color: #28A745;padding-right:30px;"><i style="padding-right:10px;"
                            class="fas fa-check-circle"></i>Đơn hàng của bạn được <b>miễn phí</b> ship</p>
                </div>
                <p id="noProduct" class="noProduct">Giỏ hàng của bạn không có sản phẩm nào</p>
                <div class="cart-content-right-button">
                    <button id="orderButton">ĐẶT HÀNG</button>
                </div>
            </div>
        </div>
    </div>
</section>



<form action="index.php?page=main&controller=cart&action=order" enctype="multipart/form-data" method="POST" id="myForm">
    <section class="delivery" id="deliverySection" style="display: none;">
        <div class="container">
            <div class="delivery-top-wrap">
                <div class="delivery-top">
                    <div class="delivery-top-delivery delivery-top-item"> <span
                            class="bi bi-cart-fill text-muted fs-5 custom-icon"></span> </div>
                    <div class="delivery-top-delivery-adress delivery-top-item"> <span
                            class="bi bi-cash-stack text-muted fs-5 custom-icon1"></span> </div>
                    <div class="delivery-top-delivery-payment delivery-top-item"> <span
                            class="bi bi-check-circle-fill text-muted fs-5 custom-icon"></span> </div>
                </div>
            </div>
        </div>
        <div class="container1">
            <div class="delivery-content row">
                <div class="delivery-content-left">
                    <div class="address-method-delivery" style="display: flex;">
                        <div class="address-delivery">
                            <h3>Địa chỉ giao hàng</h3>

                            <div class="input-address"> <input type="text" name="name" placeholder="Họ tên"
                                    style="width:221px;margin-right:12px" required autofocus> <input type="tel"
                                    name="phone-number" placeholder="Số điện thoại" pattern="[0-9]{10}"
                                    style="width:221px;" required><br> <input type="email" name="email"
                                    placeholder="Email" style="width:100%;" required><br> <input type="text"
                                    name="province" placeholder="Tỉnh/Thành phố" style="width:221px;margin-right:12px"
                                    required> <input type="text" name="district" placeholder="Quận/Huyện"
                                    style="width:221px;" required><br> <input type="text" name="ward"
                                    placeholder="Phường xã" style="width:100%;" required><br> <input type="text"
                                    name="address-detail" placeholder="Địa chỉ chi tiết" style="width:100%;" required>
                            </div>

                        </div>
                        <div class="method-delivery" style="position: relative;">
                            <h3>Phương thức giao hàng</h3>
                            <div style="display: flex; align-items: center;">
                                <p style="margin-right: 10px; display: flex;"><i class="bi bi-check-circle"></i> &nbsp
                                    Express delivery <img src="images/ship.png" alt="momo logo" style="width: 60px;">
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="payment-method">
                        <h3>Phương thức thanh toán</h3>
                        <div class="payment-method-content">
                            <p style="font-size:15px;color:#6c6d70;line-height:16px;margin-bottom:20px;">Mọi giao dịch
                                đều
                                được bảo mật và mã hóa. Thông tin thẻ tín dụng sẽ không bao giờ được lưu lại.</p>
                            <div class="payment-method-options" style="position:relative;">
                                <input type="radio" name="payment_method" value="Thanh toán khi nhận hàng" checked>
                                <label>Thanh toán khi nhận hàng (COD)</label>
                            </div>
                            <div class="payment-method-options" style="position:relative;">
                                <input type="radio" name="payment_method" value="Thanh toán bằng mã QR">
                                <label>Thanh toán qua QR Code</label>
                                <img src="images/QG.png" alt="momo logo">
                            </div>
                            <a href="javascript:void(0);" id="paymentLink" style="display: none;" data-bs-toggle="modal"
                                data-bs-target="#payModal">Thanh toán tại đây</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col_table_name" style="text-align: left; margin-top: 20px;">
            <input type="submit" value=" Gửi đơn hàng" name="update_cart" class="btn btn-sm btn-primary"
                name="formsubmit" id="formsubmit">

        </div>
        <!-- Modal -->
        <div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="payModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thông tin chuyển khoản</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="qr-select">Chọn QR code:</label>
                            <select class="form-control" id="qr-select">
                                <option value="qr1">Momo</option>
                                <option value="qr2">Ngân hàng</option>
                            </select>
                        </div>
                        <div id="qr1" style="text-align: center; margin-top: 30px;">
                            <img src="https://homepage.momocdn.net/img/momo-upload-api-221003112148-638003929084418981.png"
                                alt="QR Code 1" width="200" height="200">
                        </div>
                        <div id="qr2" style="text-align: center; margin-top: 30px; display: none;">
                            <img src="https://img.vietqr.io/image/vietinbank-113366668888-compact.jpg" alt="QR Code 2"
                                width="200" height="200">
                        </div>
                        <div class="form-group">
                            <label>Minh chứng chuyển khoản</label>&nbsp;
                            <input type="file" class="form-control my-2" name="fileToUpload" id="fileToUpload" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng lại</button>
                        <button class="btn btn-primary" type="submit">Cập nhật</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

<script>
function increaseQuantity(productId) {
    var inputElement = document.querySelector('input[name="qty[' + productId + ']"]');
    inputElement.value = parseInt(inputElement.value) + 1;
}

function decreaseQuantity(productId) {
    var inputElement = document.querySelector('input[name="qty[' + productId + ']"]');
    var currentValue = parseInt(inputElement.value);
    if (currentValue > 1) {
        inputElement.value = currentValue - 1;
    }
}
</script>
<script>
document.getElementById("orderButton").addEventListener("click", function() {
    var deliverySection = document.getElementById("deliverySection");
    deliverySection.style.display = "block";
    window.scrollTo({
        top: deliverySection.offsetTop,
        behavior: "smooth"
    });
});
</script>
<script>
document.getElementById('myForm').addEventListener('submit', function(event) {

    alert('Đã đặt hàng thành công');
    setTimeout(function() {
        document.getElementById('myForm').submit();
    }, 500);
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Lắng nghe sự kiện click
    document.querySelector('input[name="payment_method"][value="Thanh toán bằng mã QR"]').addEventListener(
        'click',
        function() {
            // Hiển thị chữ "Thanh toán tại đây" khi chọn phương thức thanh toán bằng chuyển khoản
            document.getElementById('paymentLink').style.display = 'block';
        });
    document.querySelector('input[name="payment_method"][value="Thanh toán khi nhận hàng"]').addEventListener(
        'click',
        function() {
            // Ẩn chữ "Thanh toán tại đây" khi chọn lại phương thức thanh toán khi nhận hàng
            document.getElementById('paymentLink').style.display = 'none';
        });
});

document.getElementById('qr-select').addEventListener('change', function() {
    var selectedQR = this.value;
    if (selectedQR === 'qr1') {
        document.getElementById('qr1').style.display = 'block';
        document.getElementById('qr2').style.display = 'none';
    } else if (selectedQR === 'qr2') {
        document.getElementById('qr1').style.display = 'none';
        document.getElementById('qr2').style.display = 'block';
    }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php
include_once('views/main/footer.php');
?>