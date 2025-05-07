<?php
  include_once('views/main/navbar.php');
  $id = $_GET['id'];
  foreach ($products as $product) {
    if ($id == $product->id){
?>
<style>
.card-img-top:hover {
    transform: scale(0.9);
    transition: transform 0.3s ease;
}
</style>
<div class="container-fluid py-2" style="margin-top: 100px; background-color: #f6f6f6">
    <div class="container">
        <a href="index.php?page=main&controller=layouts&action=index" class="fw-bold me-2">Home</a>&nbsp;>
        <?php if($product->typeid == 0 ) {?>
        <a href="index.php?page=main&controller=menproducts&action=index"
            class=" fw-bold me-2">&nbsp;&nbsp;Men</a>&nbsp;>
        <?php } ?>
        <?php if($product->typeid == 1 ) {?>
        <a href="index.php?page=main&controller=womenproducts&action=index"
            class=" fw-bold me-2">&nbsp;&nbsp;Women</a>&nbsp;>
        <?php } ?>
        <?php if($product->typeid == 2 ) {?>
        <a href="index.php?page=main&controller=shoesproducts&action=index"
            class=" fw-bold me-2">&nbsp;&nbsp;Shoes</a>&nbsp;>
        <?php } ?>
        <a href="" class=" fw-bold me-2">&nbsp;&nbsp;<?php echo $product->name;?></a>
    </div>
</div>
<div class="container-fluid py-2 px-5" style="margin-top:20px">
    <section class="product">
        <div class="container1">
            <div class="product-content row">
                <div class="product-content-left">
                    <div class="product-content-left-small-img">
                        <img src="<?php echo $product->img;?>" onclick="changeImage(this)" alt="">
                        <img src="<?php echo $product->img1;?>" onclick="changeImage(this)" alt="">
                        <img src="<?php echo $product->img2;?>" onclick="changeImage(this)" alt="">
                        <img src="<?php echo $product->img3;?>" onclick="changeImage(this)" alt="">
                    </div>
                    <div class="product-content-left-big-img" style="margin-left:10px">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <!-- Add more carousel items for other images -->
                                <div class="carousel-item active">
                                    <img id="fullImage" src="<?php echo $product->img;?>" alt="">
                                </div>
                                <div class="carousel-item active">
                                    <img id="fullImage" src="<?php echo $product->img1;?>" alt="">
                                </div>

                                <div class="carousel-item">
                                    <img id="fullImage" src="<?php echo $product->img2;?>" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img id="fullImage" src="<?php echo $product->img3;?>" alt="">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="product-content-right">
                    <div class="product-name">
                        <h1 style="text-transform:uppercase; font-size:26px; line-height:1.1;">
                            <?php echo $product->name;?></h1>
                        <p>Thương hiệu: Routine</p>
                    </div>
                    <div class="product-price">
                        <p style="font-weight:bold;"><?php echo number_format($product->price) ?>đ</p>
                    </div>
                    <div class="special-offer">
                        <div class="offer-content">
                            <p><i class="bi bi-truck"></i> Free shipping cho đơn hàng từ 699k (Tự động áp dụng khi thoả
                                điều kiện)</p>
                            <p><i class="bi bi-gift"></i> Với mỗi hóa đơn từ 699k, khách hàng sẽ được liên hệ để nhận
                                quà tặng là một đôi Nike Air Jordan 1 Netro High OG</p>
                        </div>
                    </div>
                    <div class="product-size">
                        <div class="row">
                            <div class="col-md-6">
                                <p style="font-weight:bold;">Size:</p>
                            </div>
                            <div class="col-md-6 text-end">
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    style="text-decoration: underline;">
                                    <i class="bi bi-pen"></i> Hướng dẫn chọn size
                                </a>
                            </div>
                        </div>
                        <form action="index.php?page=main&controller=cart&action=submit" method="POST">
                            <div class="product-size-input">
                                <label>
                                    <input type="radio" name="size" value="S" checked>
                                    <span>S</span>
                                </label>
                                <label>
                                    <input type="radio" name="size" value="M">
                                    <span>M</span>
                                </label>
                                <label>
                                    <input type="radio" name="size" value="L">
                                    <span>L</span>
                                </label>
                                <label>
                                    <input type="radio" name="size" value="XL">
                                    <span>XL</span>
                                </label>
                                <label>
                                    <input type="radio" name="size" value="XXL">
                                    <span>XXL</span>
                                </label>
                            </div>

                    </div>
                    <br>



                    <input type="hidden" value="<?php echo $product->id ?>" name="product_id">
                    <input type="hidden" value="<?php echo $product->name ?>" name="product_name">
                    <input type="hidden" value="<?php echo $product->img ?>" name="product_image">
                    <input type="hidden" value="<?php echo $product->price ?>" name="product_price">
                    <input type="hidden" value="<?php echo $product->sale ?>" name="product_sale">




                    <div class="mt-2  mb-2 ">
                        <input id="addToCartBtn" class="addCart" type="submit" name="addcart" value="Thêm vào giỏ hàng">
                    </div>
                    </form>
                    <div class="product-in4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="product-feature">
                                    <div class="icon">
                                        <img src="https://routine.vn/static/version1702009271/frontend/Magenest/routine/vi_VN/images/ghn.png"
                                            alt="Giao hàng nhanh">
                                    </div>
                                    <div class="text">
                                        <strong>Giao hàng nhanh</strong>
                                        <p>Từ 2 - 5 ngày</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="product-feature">
                                    <div class="icon">
                                        <img src="https://routine.vn/static/version1702009271/frontend/Magenest/routine/vi_VN/images/free.png"
                                            alt="Freeship toàn quốc từ 399k">
                                    </div>
                                    <div class="text">
                                        <strong>Miễn phí vận chuyển</strong>
                                        <p>Đơn hàng từ 399K</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="product-feature">
                                    <div class="icon">
                                        <img src="https://routine.vn/static/version1702009271/frontend/Magenest/routine/vi_VN/images/order.png"
                                            alt="Theo dõi đơn hàng dễ dàng">
                                    </div>
                                    <div class="text">
                                        <strong>Theo dõi đơn hàng một cách dễ dàng</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Repeat the above structure for the next set of features -->

                        <div class="row">
                            <!-- Feature 4 -->
                            <div class="col-md-4">
                                <div class="product-feature">
                                    <div class="icon">
                                        <img src="https://routine.vn/static/version1702009271/frontend/Magenest/routine/vi_VN/images/returns.png"
                                            alt="Đổi trả tận nơi">
                                    </div>
                                    <div class="text">
                                        <strong>Đổi trả linh hoạt</strong>
                                        <p>Với sản phẩm không áp dụng khuyến mãi</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Feature 5 -->
                            <div class="col-md-4">
                                <div class="product-feature">
                                    <div class="icon">
                                        <img src="https://routine.vn/static/version1702009271/frontend/Magenest/routine/vi_VN/images/pay.png"
                                            alt="Thanh toán dễ dàng">
                                    </div>
                                    <div class="text">
                                        <strong>Thanh toán dễ dàng nhiều hình thức</strong>
                                    </div>
                                </div>
                            </div>
                            <!-- Feature 6 -->
                            <div class="col-md-4">
                                <div class="product-feature">
                                    <div class="icon">
                                        <img src="https://routine.vn/static/version1702009271/frontend/Magenest/routine/vi_VN/images/hotline.png"
                                            alt="Hotline hỗ trợ Routine">
                                    </div>
                                    <div class="text">
                                        <strong>Hotline hỗ trợ</strong>
                                        <p style="font-weight: bold">039 9999 365</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" product-detail">
                        <div class="show-more">
                            <!-- <img src="https://ivymoda.com/assets/images/image-down.png" alt=""> -->
                            THÔNG TIN SẢN PHẨM
                        </div>
                        <?php if(isset($_SESSION["guest"])){
                         if($product->typeid == 0) { ?>
                        <form action="index.php?page=main&controller=menproducts&action=vote" method="POST">
                            <?php } ?>
                            <?php if($product->typeid == 1) { ?>
                            <form action="index.php?page=main&controller=womenproducts&action=vote" method="POST">
                                <?php } ?>
                                <?php if($product->typeid == 2) { ?>
                                <form action="index.php?page=main&controller=shoesproducts&action=vote" method="POST">
                                    <?php } ?>
                                    <div class="mb-3">
                                        <input type="hidden" value="<?php echo $id ?>" name="product_id">

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="starRating" id="star1"
                                                value="1">
                                            <label class="form-check-label" for="star1">1 sao</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="starRating" id="star2"
                                                value="2">
                                            <label class="form-check-label" for="star2">2 sao</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="starRating" id="star3"
                                                value="3">
                                            <label class="form-check-label" for="star3">3 sao</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="starRating" id="star4"
                                                value="4">
                                            <label class="form-check-label" for="star4">4 sao</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="starRating" id="star5"
                                                value="5">
                                            <label class="form-check-label" for="star5">5 sao</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                                </form>
                                <?php } ?>

                                <div class="product-detail-container activeB">
                                    <div class="product-tab-box">
                                        <button class="product-tab-btn active">Giới thiệu</button>
                                        <button class="product-tab-btn">Chi tiết</button>
                                        <button class="product-tab-btn">Bảo quản</button>
                                        <div class="line"></div>
                                    </div>

                                    <div class="product-content-box">
                                        <div class="product-tab-content active">
                                            <p>Áo sơ mi cổ trụ, thiết kế phối bèo tiểu thư phù hợp cho các nàng
                                                công sở yêu
                                                thích kiểu nữ tính dịu dàng. </p>
                                            <br>
                                            <p>Tay áo dài, có xếp ly nhỏ tạo độ bồng nhẹ. Viền cổ tay nhỏ, đính
                                                khuy kim loại cố
                                                định, mang đến sự thanh thoát, khá tinh tế.</p>
                                            <br>
                                            <p>Áo lựa chọn chất liệu lụa mềm mại, mặc nhẹ và thoải mái. Bạn hãy
                                                mix áo cùng quần
                                                Tây, chân váy...để có ngay một Outfit thời thượng khi đi làm hay
                                                đi gặp mặt bạn
                                                bè. </p>
                                            <br>
                                            <p style="font-weight: bold;">Thông tin mẫu</p>
                                            <br>
                                            <p><span style="font-weight: bold;">Chiều cao</span>: 167 cm</p>
                                            <br>
                                            <p><span style="font-weight: bold;">Cân nặng</span>: 50 kg</p>
                                            <br>
                                            <p><span style="font-weight: bold;">Số đo ba vòng</span>: 83-65-93
                                                cm</p>
                                            <br>
                                            <p>Mẫu mặc size M Lưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh
                                                lệch nhỏ so với ảnh
                                                do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình
                                                máy tính/ điện
                                                thoại.</p>
                                        </div>

                                        <div class="product-tab-content">
                                            <p>Khi hoàn thành mua sắm tại Website, đơn hàng sẽ lập tức được đóng gói và
                                                chuẩn bị
                                                tiến hành giao hàng.</p>
                                            <br>
                                            <p>Hàng đặt sẽ được chuyển giao cho bên thứ ba và xác nhận sẽ được giao chậm
                                                nhất là
                                                5 ngày cho một đơn hàng.</p>
                                            <br>
                                        </div>

                                        <div class="product-tab-content">
                                            <p>Chi tiết bảo quản sản phẩm:</p>
                                            <br>
                                            <p style="font-weight: bold;">* Các sản phẩm thuộc dòng cao cấp
                                                (Senora) và áo khoác
                                                (dạ, tweed, lông, phao) chỉ giặt khô, tuyệt đối không giặt ướt.
                                            </p>
                                            <br>
                                            <p>* Vải dệt kim: sau khi giặt sản phẩm phải được phơi ngang tránh
                                                bai giãn.</p>
                                            <br>
                                            <p>* Vải voan, lụa, chiffon nên giặt bằng tay.</p>
                                            <br>
                                            <p>* Vải thô, tuytsi, kaki không có phối hay trang trí đá cườm thì
                                                có thể giặt máy.
                                            </p>
                                            <br>
                                            <p>* Vải thô, tuytsi, kaki có phối màu tương phản hay trang trí
                                                voan, lụa, đá cườm
                                                thì cần giặt tay.</p>
                                            <br>
                                            <p>* Đồ Jeans nên hạn chế giặt bằng máy giặt vì sẽ làm phai màu
                                                jeans. Nếu giặt thì
                                                nên lộn trái sản phẩm khi giặt, đóng khuy, kéo khóa, không nên
                                                giặt chung cùng
                                                đồ sáng màu, tránh dính màu vào các sản phẩm khác. </p>
                                            <br>
                                            <p>* Các sản phẩm cần được giặt ngay không ngâm tránh bị loang màu,
                                                phân biệt màu và
                                                loại vải để tránh trường hợp vải phai. Không nên giặt sản phẩm
                                                với xà phòng có
                                                chất tẩy mạnh, nên giặt cùng xà phòng pha loãng.</p>
                                            <br>
                                            <p>* Các sản phẩm có thể giặt bằng máy thì chỉ nên để chế độ giặt
                                                nhẹ, vắt mức trung
                                                bình và nên phân các loại sản phẩm cùng màu và cùng loại vải khi
                                                giặt.</p>
                                            <br>
                                            <p>* Nên phơi sản phẩm tại chỗ thoáng mát, tránh ánh nắng trực tiếp
                                                sẽ dễ bị phai
                                                bạc màu, nên làm khô quần áo bằng cách phơi ở những điểm gió sẽ
                                                giữ màu vải tốt
                                                hơn.</p>
                                            <br>
                                            <p>* Những chất vải 100% cotton, không nên phơi sản phẩm bằng mắc áo
                                                mà nên vắt
                                                ngang sản phẩm lên dây phơi để tránh tình trạng rạn vải.</p>
                                            <br>
                                            <p>* Khi ủi sản phẩm bằng bàn là và sử dụng chế độ hơi nước sẽ làm
                                                cho sản phẩm dễ
                                                ủi phẳng, mát và không bị cháy, giữ màu sản phẩm được đẹp và bền
                                                lâu hơn. Nhiệt
                                                độ của bàn là tùy theo từng loại vải. </p>
                                            <br>

                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
            }
            ?>
    <?php
        }
    ?>





    <div class="row" style="height: 100px">
    </div>
    <div class="row">
        <h2 class="text-center fw-bold">SẢN PHẨM TƯƠNG TỰ</h2>
        <?php 
        $max = 0;
        foreach($products as $product){
            $max += 1;
        }
        $arr = array();
        for($s = 0; $s < 4; $s++){
            $temp = rand(1, $max);
            while(in_array($temp, $arr)){
                $temp = rand(1, $max);;
            }
            array_push($arr,$temp);
        }
        $count= 0;
        foreach ($products as $product) {
            $count += 1;
            foreach($arr as $i){
            if ($id != $product->id && $i == $count){
                echo '
                        <div class="col-12 col-lg-3 col-md-6 mb-3 mt-3">
                        <a href="index.php?page=main&controller=detail&id=' . $product->id . '&action=index"
                            class="card h-100 text-decoration-none">';
                        if ($product->sale) 
                          echo  '<div class="badge bg-dark text-light position-absolute" style="top: 0.5rem; right: 0.5rem">SALE '. $product->sale .'%</div>';
                              echo'  <!-- Product image-->
                    <img class="card-img-top" src="' . $product->img .'" alt="...">
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                        <p class="product-name text-muted" style="font-size: 1em">' . $product->name .
                        '</p>
                    <span class="fw-bold">' . number_format($product->price * (100 -
                        $product->sale) / 100, 0, ',', '.') . ' đ</span>
                    <span class="text-muted text-decoration-line-through">' .
                        number_format($product->price, 0, ',', '.') . ' đ</span>';

                    if ($product->vote_number == 0) {
                    echo '<p class="product-name text-muted" style="font-size: 1em">' .
                        $product->vote_number . ' lượt đánh giá</p>';
                    } else {
                    echo '<p class="product-name text-muted" style="font-size: 1em">' .
                        $product->vote_number . ' lượt đánh giá</p>
                    <p class="product-name text-muted" style="font-size: 1em">' .
                        $product->total_stars / $product->vote_number . ' đánh giá trung bình
                    </p>';
                    }

                    echo '
                        </div>

                    </div>
                </a>
            </div>';
            }
            }
            }
            ?>
    </div>


</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" id="size-table">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bảng Size</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                <!-- Content of the modal goes here -->
                <div class="tab-content">
                    <!-- Nam -->
                    <div class="tab-pane fade show active" id="namTab" role="tabpanel" aria-labelledby="namTab">
                        <h4>NAM</h4>
                        <h6>SIZE ÁO</h6>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên gọi/Size</th>
                                    <th>S</th>
                                    <th>M</th>
                                    <th>L</th>
                                    <th>XL</th>
                                    <th>XXL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Cổ</td>
                                    <td>36</td>
                                    <td>38</td>
                                    <td>40</td>
                                    <td>42</td>
                                    <td>44</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Vai</td>
                                    <td>44</td>
                                    <td>45</td>
                                    <td>46</td>
                                    <td>47</td>
                                    <td>48</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Ngực</td>
                                    <td>90</td>
                                    <td>94</td>
                                    <td>98</td>
                                    <td>102</td>
                                    <td>106</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Eo</td>
                                    <td>88</td>
                                    <td>92</td>
                                    <td>96</td>
                                    <td>100</td>
                                    <td>104</td>
                                </tr>
                            </tbody>
                        </table>
                        <h6>SIZE QUẦN</h6>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên gọi/Size</th>
                                    <th>S(29)</th>
                                    <th>M(30)</th>
                                    <th>L(31)</th>
                                    <th>XL(32)</th>
                                    <th>XXL(33)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Vòng Eo</td>
                                    <td>76</td>
                                    <td>80</td>
                                    <td>84</td>
                                    <td>86</td>
                                    <td>90</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Vòng Mông</td>
                                    <td>91</td>
                                    <td>95</td>
                                    <td>99</td>
                                    <td>104</td>
                                    <td>109</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Cân nặng (kg)</td>
                                    <td>62-68</td>
                                    <td>68-70</td>
                                    <td>70-74</td>
                                    <td>74-78</td>
                                    <td>78-82</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Chiều cao (cm)</td>
                                    <td>168-168</td>
                                    <td>168-172</td>
                                    <td>172-176</td>
                                    <td>176-180</td>
                                    <td>180-184</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Nữ -->
                    <div class="tab-pane fade" id="nuTab" role="tabpanel" aria-labelledby="nuTab">
                        <h4>NỮ</h4>
                        <h6>SIZE ÁO</h6>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên gọi/Size</th>
                                    <th>S</th>
                                    <th>M</th>
                                    <th>L</th>
                                    <th>XL</th>
                                    <th>XXL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Cổ</td>
                                    <td>36</td>
                                    <td>37</td>
                                    <td>38</td>
                                    <td>39</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Vai</td>
                                    <td>82</td>
                                    <td>86</td>
                                    <td>90</td>
                                    <td>94</td>
                                    <td>98</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Ngực</td>
                                    <td>64</td>
                                    <td>68</td>
                                    <td>72</td>
                                    <td>76</td>
                                    <td>80</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Eo</td>
                                    <td>88</td>
                                    <td>92</td>
                                    <td>96</td>
                                    <td>100</td>
                                    <td>104</td>
                                </tr>
                            </tbody>
                        </table>
                        <h6>SIZE QUẦN</h6>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên gọi/Size</th>
                                    <th>S(29)</th>
                                    <th>M(30)</th>
                                    <th>L(31)</th>
                                    <th>XL(32)</th>
                                    <th>XXL(33)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Vòng Eo</td>
                                    <td>64</td>
                                    <td>68</td>
                                    <td>70</td>
                                    <td>76</td>
                                    <td>80</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Vòng Mông</td>
                                    <td>88</td>
                                    <td>92</td>
                                    <td>96</td>
                                    <td>100</td>
                                    <td>104</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Vòng Bụng</td>
                                    <td>68</td>
                                    <td>72</td>
                                    <td>76</td>
                                    <td>80</td>
                                    <td>84</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Dài Quần</td>
                                    <td>96</td>
                                    <td>97</td>
                                    <td>99</td>
                                    <td>100</td>
                                    <td>101</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Trẻ em -->
                    <div class="tab-pane fade" id="treEmTab" role="tabpanel" aria-labelledby="treEmTab">
                        <h4>TRẺ EM</h4>
                        <h6>SIZE VÁY ÁO TRẺ EM</h6>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Cỡ/Tuổi</th>
                                    <th>4-5</th>
                                    <th>6-7</th>
                                    <th>8-9</th>
                                    <th>10-11</th>
                                    <th>12-13</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Chiều Cao (cm)</td>
                                    <td>110</td>
                                    <td>122</td>
                                    <td>133</td>
                                    <td>150</td>
                                    <td>155</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Cân Nặng (kg)</td>
                                    <td>15-20</td>
                                    <td>20-25</td>
                                    <td>23-29</td>
                                    <td>28-35</td>
                                    <td>34-43</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Rộng Vai</td>
                                    <td>29</td>
                                    <td>30</td>
                                    <td>31</td>
                                    <td>32</td>
                                    <td>33</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Vòng Ngực</td>
                                    <td>59</td>
                                    <td>65</td>
                                    <td>68</td>
                                    <td>74</td>
                                    <td>79</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Vòng Bụng</td>
                                    <td>54</td>
                                    <td>59</td>
                                    <td>62</td>
                                    <td>65</td>
                                    <td>69</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Vòng Mông</td>
                                    <td>61</td>
                                    <td>66</td>
                                    <td>70</td>
                                    <td>75</td>
                                    <td>80</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Dài Tay</td>
                                    <td>40</td>
                                    <td>43</td>
                                    <td>47</td>
                                    <td>59</td>
                                    <td>53</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Chiều Dài Từ Đũng Đến Ống</td>
                                    <td>42</td>
                                    <td>52</td>
                                    <td>59</td>
                                    <td>66</td>
                                    <td>72</td>
                                </tr>
                                <!-- Thêm các dòng khác tương tự -->
                            </tbody>
                        </table>
                        <b>*Số đo trong "BẢNG THÔNG SỐ" là số đo cơ thể không phải số đo quần áo</b>*
                    </div>
                </div>

                <!-- Tabs navigation -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="namTab" data-bs-toggle="tab" href="#namTab" role="tab"
                            aria-controls="namTab" aria-selected="true">Nam</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nuTab" data-bs-toggle="tab" href="#nuTab" role="tab"
                            aria-controls="nuTab" aria-selected="false">Nữ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="treEmTab" data-bs-toggle="tab" href="#treEmTab" role="tab"
                            aria-controls="treEmTab" aria-selected="false">Trẻ em</a>
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
// JavaScript để xử lý sự kiện click
document.getElementById('addToCartBtn').addEventListener('click', function() {
    // Lấy số lượng hiện tại từ logo giỏ hàng
    var currentCount = parseInt(document.getElementById('cartCount').innerText);

    // Cộng thêm 1
    var newCount = currentCount + 1;

    // Hiển thị số lượng mới lên trên logo giỏ hàng
    document.getElementById('cartCount').innerText = newCount;
});
</script>

<!-- Cart tab -->

<script>
const icon_cart = document.querySelector('#cart');
const cart_tab = document.querySelector('.cart-tab');
const close_btn = document.querySelector('.close');

icon_cart.addEventListener('click', () => {
    cart_tab.classList.add('active')
})

close_btn.addEventListener('click', () => {
    cart_tab.classList.remove('active')
})
</script>
<script>
const tabs = document.querySelectorAll('.product-tab-btn')
const all_content = document.querySelectorAll('.product-tab-content')
tabs.forEach((tab, index) => {
    tab.addEventListener('click', (event) => {
        tabs.forEach(tab => {
            tab.classList.remove('active')
        })
        tab.classList.add('active')

        var line = document.querySelector('.line')
        line.style.width = event.target.offsetWidth + "px"
        line.style.left = event.target.offsetLeft + "px"

        all_content.forEach(content => {
            content.classList.remove('active')
        })
        all_content[index].classList.add('active')
    })


})

const button = document.querySelector(".show-more")
if (button) {
    button.addEventListener("click", function() {
        document.querySelector(".product-detail-container").classList.toggle("activeB")
    })
}
</script>
<script>
$(document).ready(function() {
    // Lắng nghe sự kiện khi carousel thay đổi
    $('#carouselExampleControls').on('slid.bs.carousel', function() {
        // Lấy index của carousel item hiện tại
        var currentIndex = $('#carouselExampleControls .carousel-inner .carousel-item.active').index();

        // Loại bỏ đường viền từ tất cả các ảnh nhỏ
        $('.product-content-left-small-img img').css('border', 'none');

        // Thêm đường viền cho ảnh nhỏ tương ứng với carousel item hiện tại
        $('.product-content-left-small-img img').eq(currentIndex).css('border', '2px solid #000');
    });
});
</script>
<?php
   include_once('views/main/footer.php');
?>