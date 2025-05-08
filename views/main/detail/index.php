<?php
include_once('views/main/navbar.php');
$id = $_GET['id'];
foreach ($products as $product) {
    if ($id == $product->id) {
?>
<?php
        // Map typeid to label and link
        $crumbMap = [
            0 => ['label' => 'Men',   'url' => 'index.php?page=main&controller=menproducts&action=index'],
            1 => ['label' => 'Women', 'url' => 'index.php?page=main&controller=womenproducts&action=index'],
            2 => ['label' => 'Shoes', 'url' => 'index.php?page=main&controller=shoesproducts&action=index'],
        ];
        $middle = $crumbMap[$product->typeid] ?? null;
        ?>
<style>
.card-img-top:hover {
    transform: scale(0.9);
    transition: transform 0.3s ease;
}

.breadcrumb-nav {
    margin-top: 76px;
    padding: .5rem 0;
}

.breadcrumb {
    background: transparent;
    padding: 0;
    margin-bottom: 0;
}

.breadcrumb-item+.breadcrumb-item::before {
    content: ">";
    color: #6c757d;
}

.breadcrumb-item a {
    color: #0d6efd;
    text-decoration: none;
}

.breadcrumb-item a:hover {
    text-decoration: underline;
}

.breadcrumb-item.active {
    color: #495057;
    font-weight: 600;
}

.product-thumb {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 6px;
    border: 2px solid transparent;
    transition: transform .2s, border-color .2s;
    cursor: pointer;
}

.product-thumb:hover {
    transform: scale(1.1);
}

.product-thumb.active {
    border-color: #0d6efd;
    /* Bootstrap primary */
}

.feature-icon {
    width: 48px;
    height: 48px;
}

.nav-tabs .nav-link {
    color: #6c757d;
}

/* keep the active tab in Bootstrap’s blue */
.nav-tabs .nav-link.active {
    color: rgb(0, 0, 0);
}

/* optional: darker on hover */
.nav-tabs .nav-link:hover {
    color: #495057;
}
</style>
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="index.php?page=main&controller=layouts&action=index">Home</a>
            </li>

            <?php if ($middle): ?>
            <li class="breadcrumb-item">
                <a href="<?= $middle['url'] ?>"><?= $middle['label'] ?></a>
            </li>
            <?php endif; ?>

            <li class="breadcrumb-item active" aria-current="page">
                <?= htmlspecialchars($product->name, ENT_QUOTES) ?>
            </li>
        </ol>
    </div>
</nav>
<div class="container-fluid py-2 px-5" style="margin-top:20px">
    <section class="product">
        <div class="container1">
            <div class="product-content row">
                <div class="product-content-left">
                    <!-- 1. WRAPPER: flex container -->
                    <div class="d-flex align-items-start mb-4">
                        <!-- 2. THUMBNAILS: vertical list -->
                        <div class="d-flex flex-column gap-3" style="flex: 0 0 120px;">
                            <?php
                                    $imgs = [$product->img, $product->img1, $product->img2, $product->img3];
                                    foreach ($imgs as $i => $url): ?>
                            <img src="<?= htmlspecialchars($url, ENT_QUOTES) ?>"
                                class="product-thumb <?php if ($i === 0) echo 'active'; ?>" data-index="<?= $i ?>"
                                alt="Thumbnail <?= $i + 1 ?>">
                            <?php endforeach; ?>
                        </div>

                        <!-- 3. MAIN CAROUSEL -->
                        <div class="flex-grow-1 ms-3">
                            <div id="productCarousel" class="carousel slide" data-bs-interval="false">
                                <div class="carousel-inner rounded shadow-sm">
                                    <?php foreach ($imgs as $i => $url): ?>
                                    <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                                        <img src="<?= htmlspecialchars($url, ENT_QUOTES) ?>" class="d-block w-100"
                                            alt="Product image <?= $i + 1 ?>">
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                    <span class="visually-hidden">Prev</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-content-right">
                    <div>
                        <!-- Product Name & Brand -->
                        <h1 class="text-uppercase fs-3 fs-md-2 fw-bold mb-1">
                            <?= htmlspecialchars($product->name, ENT_QUOTES) ?>
                        </h1>
                        <p class="text-muted mb-3">Thương hiệu: Routine</p>
                    </div>

                    <div class="d-flex align-items-baseline mb-4">
                        <!-- Discounted price -->
                        <span class="fs-2 fw-bold">
                            <?= number_format(
                                        ($product->price * (100 - $product->sale)) / 100,
                                        0,
                                        ',',
                                        '.'
                                    ) ?>₫
                        </span>

                        <!-- Original price, only if there’s a sale -->
                        <?php if ($product->sale > 0): ?>
                        <span class="ms-3 fs-5 text-muted text-decoration-line-through">
                            <?= number_format($product->price, 0, ',', '.') ?>₫
                        </span>
                        <?php endif; ?>
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
                            <!-- Size selector -->
                            <div class="product-size mb-4">
                                <!-- <div class="d-flex justify-content-between align-items-center mb-3">
                                    <label for="size-options" class="fw-semibold mb-0">Size:</label>
                                    <a href="#" class="text-decoration-underline text-secondary" data-bs-toggle="modal"
                                        data-bs-target="#sizeGuideModal">
                                        <i class="bi bi-pen-fill"></i> Hướng dẫn chọn size
                                    </a>
                                </div> -->
                                <div id="size-options" class="d-flex flex-wrap gap-2">
                                    <?php
                                            $sizes = ['S', 'M', 'L', 'XL', 'XXL'];
                                            foreach ($sizes as $i => $sz):
                                            ?>
                                    <input type="radio" class="btn-check" name="size" id="size-<?= $sz ?>"
                                        value="<?= $sz ?>" autocomplete="off" <?= $i === 0 ? 'checked' : '' ?>>
                                    <label class="btn btn-outline-secondary" for="size-<?= $sz ?>">
                                        <?= $sz ?>
                                    </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Hidden product data -->
                            <input type="hidden" name="product_id" value="<?= $product->id ?>">
                            <input type="hidden" name="product_name"
                                value="<?= htmlspecialchars($product->name, ENT_QUOTES) ?>">
                            <input type="hidden" name="product_image"
                                value="<?= htmlspecialchars($product->img, ENT_QUOTES) ?>">
                            <input type="hidden" name="product_price" value="<?= $product->price ?>">
                            <input type="hidden" name="product_sale" value="<?= $product->sale ?>">

                            <!-- Add to Cart -->
                            <div class="mb-3">
                                <button type="submit" name="addcart" id="addToCartBtn"
                                    class="btn btn-dark w-100 py-3 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-bag-fill me-2"></i>
                                    <span class="fw-medium">Thêm vào giỏ hàng</span>
                                </button>
                            </div>
                        </form>

                        <div class="product-in4">
                            <div class="row gx-4 gy-4 pt-4">
                                <!-- 1 -->
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="feature-icon rounded-circle bg-light d-flex justify-content-center align-items-center flex-shrink-0">
                                            <i class="bi bi-truck fs-4 text-dark"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="fw-semibold mb-1 small">Giao hàng nhanh</p>
                                            <p class="small text-muted mb-0">Từ 2 – 5 ngày</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- 2 -->
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="feature-icon rounded-circle bg-light d-flex justify-content-center align-items-center flex-shrink-0">
                                            <i class="bi bi-award fs-4 text-dark"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="fw-semibold mb-1 small">Miễn phí vận chuyển</p>
                                            <p class="small text-muted mb-0">Đơn hàng từ 399 K</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- 3 -->
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="feature-icon rounded-circle bg-light d-flex justify-content-center align-items-center flex-shrink-0">
                                            <i class="bi bi-arrow-counterclockwise fs-4 text-dark"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="fw-semibold mb-1 small">Đổi trả linh hoạt</p>
                                            <p class="small text-muted mb-0">Với sản phẩm không áp dụng khuyến mãi</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- 4 -->
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="feature-icon rounded-circle bg-light d-flex justify-content-center align-items-center flex-shrink-0">
                                            <i class="bi bi-credit-card fs-4 text-dark"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="fw-semibold mb-1 small">Thanh toán dễ dàng</p>
                                            <p class="small text-muted mb-0">Nhiều hình thức</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- 5 -->
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="feature-icon rounded-circle bg-light d-flex justify-content-center align-items-center flex-shrink-0">
                                            <i class="bi bi-telephone fs-4 text-dark"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="fw-semibold mb-1 small">Hotline hỗ trợ</p>
                                            <p class="small mb-0">039 9999 365</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="product-detail container my-4">
                            <!-- Section title -->
                            <h2 class="h5 mb-3">THÔNG TIN SẢN PHẨM</h2>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs mb-3" id="productTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="intro-tab" data-bs-toggle="tab"
                                        data-bs-target="#intro" type="button" role="tab">Giới thiệu</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="detail-tab" data-bs-toggle="tab"
                                        data-bs-target="#detail" type="button" role="tab">Chi tiết</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="care-tab" data-bs-toggle="tab" data-bs-target="#care"
                                        type="button" role="tab">Bảo quản</button>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="intro" role="tabpanel"
                                    aria-labelledby="intro-tab">
                                    <p>Áo sơ mi cổ trụ, thiết kế phối bèo tiểu thư phù hợp cho các nàng công sở yêu
                                        thích
                                        kiểu nữ tính dịu dàng.</p>
                                    <p>Tay áo dài, có xếp ly nhỏ tạo độ bồng nhẹ. Viền cổ tay nhỏ, đính khuy kim loại cố
                                        định, mang đến sự thanh thoát, khá tinh tế.</p>
                                    <p>Áo lựa chọn chất liệu lụa mềm mại, mặc nhẹ và thoải mái. Bạn hãy mix áo cùng quần
                                        Tây, chân váy...để có ngay một Outfit thời thượng khi đi làm hay đi gặp mặt bạn
                                        bè.
                                    </p>
                                    <hr>
                                    <h6>Thông tin mẫu</h6>
                                    <ul class="list-unstyled mb-0">
                                        <li><strong>Chiều cao:</strong> 167 cm</li>
                                        <li><strong>Cân nặng:</strong> 50 kg</li>
                                        <li><strong>Số đo ba vòng:</strong> 83-65-93 cm</li>
                                    </ul>
                                    <p class="small text-muted mt-2">Mẫu mặc size M. Lưu ý: Màu sắc thực tế có thể chênh
                                        lệch do ánh sáng và màn hình.</p>
                                </div>

                                <div class="tab-pane fade" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                                    <p>Khi hoàn thành mua sắm tại Website, đơn hàng sẽ lập tức được đóng gói và chuẩn bị
                                        tiến hành giao hàng.</p>
                                    <p>Hàng đặt sẽ được chuyển giao cho bên thứ ba và xác nhận sẽ được giao chậm nhất là
                                        5
                                        ngày cho một đơn hàng.</p>
                                </div>

                                <div class="tab-pane fade" id="care" role="tabpanel" aria-labelledby="care-tab">
                                    <p><strong>Chi tiết bảo quản sản phẩm:</strong></p>
                                    <ul>
                                        <li>Các sản phẩm cao cấp (Senora) và áo khoác chỉ giặt khô, tuyệt đối không giặt
                                            ướt.</li>
                                        <li>Vải dệt kim: phơi ngang tránh bai giãn.</li>
                                        <li>Vải voan, lụa, chiffon nên giặt tay.</li>
                                        <!-- … tiếp các mục … -->
                                    </ul>
                                </div>
                            </div>

                            <!-- Rating form (only if guest) -->
                            <?php if (isset($_SESSION["guest"])): ?>
                            <form action="<?php
                                                        switch ($product->typeid) {
                                                            case 0:
                                                                echo 'index.php?page=main&controller=menproducts&action=vote';
                                                                break;
                                                            case 1:
                                                                echo 'index.php?page=main&controller=womenproducts&action=vote';
                                                                break;
                                                            case 2:
                                                                echo 'index.php?page=main&controller=shoesproducts&action=vote';
                                                                break;
                                                        }
                                                        ?>" method="POST" class="mt-4 border-top pt-4">
                                <input type="hidden" name="product_id" value="<?= $id ?>">
                                <input type="hidden" name="starRating" id="starRatingInput" value="">

                                <label class="form-label">Đánh giá sản phẩm</label>
                                <div id="starRating" class="mb-3">
                                    <!-- 5 stars -->
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <i class="bi bi-star fs-3 text-muted me-2" data-value="<?= $i ?>"
                                        style="cursor: pointer;"></i>
                                    <?php endfor; ?>
                                    <span id="ratingText" class="ms-2 text-secondary">Chưa chọn</span>
                                </div>

                                <button type="submit" id="submitRating" class="btn btn-dark" disabled>Gửi đánh
                                    giá</button>
                            </form>
                            <?php endif; ?>
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
        foreach ($products as $product) {
            $max += 1;
        }
        $arr = array();
        for ($s = 0; $s < 4; $s++) {
            $temp = rand(1, $max);
            while (in_array($temp, $arr)) {
                $temp = rand(1, $max);;
            }
            array_push($arr, $temp);
        }
        $count = 0;
        foreach ($products as $product) {
            $count += 1;
            foreach ($arr as $i) {
                if ($id != $product->id && $i == $count) {
                    echo '
                        <div class="col-12 col-lg-3 col-md-6 mb-3 mt-3">
                        <a href="index.php?page=main&controller=detail&id=' . $product->id . '&action=index"
                            class="card h-100 text-decoration-none">';
                    if ($product->sale)
                        echo  '<div class="badge bg-dark text-light position-absolute" style="top: 0.5rem; right: 0.5rem">SALE ' . $product->sale . '%</div>';
                    echo '  <!-- Product image-->
                    <img class="card-img-top" src="' . $product->img . '" alt="...">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
(function() {
    const stars = document.querySelectorAll('#starRating .bi');
    const input = document.getElementById('starRatingInput');
    const btn = document.getElementById('submitRating');
    const txt = document.getElementById('ratingText');
    let rating = 0;

    // helper to repaint
    function paint(r) {
        stars.forEach(s => {
            const v = +s.getAttribute('data-value');
            if (v <= r) {
                s.classList.replace('bi-star', 'bi-star-fill');
                s.classList.replace('text-muted', 'text-warning');
            } else {
                s.classList.replace('bi-star-fill', 'bi-star');
                s.classList.replace('text-warning', 'text-muted');
            }
        });
        txt.textContent = r ? `${r} sao` : 'Chưa chọn';
        btn.disabled = !r;
        input.value = r;
    }

    stars.forEach(s => {
        s.addEventListener('click', () => {
            rating = +s.getAttribute('data-value');
            paint(rating);
        });
        s.addEventListener('mouseover', () => paint(+s.getAttribute('data-value')));
        s.addEventListener('mouseout', () => paint(rating));
    });

    // init
    paint(0);
})();
</script>

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
document.addEventListener('DOMContentLoaded', () => {
    const carouselEl = document.getElementById('productCarousel');
    const carousel = new bootstrap.Carousel(carouselEl);
    const thumbs = Array.from(document.querySelectorAll('.product-thumb'));
    const items = Array.from(carouselEl.querySelectorAll('.carousel-item'));

    // Clicking a thumb still moves the carousel
    thumbs.forEach((thumb, idx) => {
        thumb.addEventListener('click', () => {
            carousel.to(idx);
        });
    });

    // When carousel finishes sliding, update the active thumb
    carouselEl.addEventListener('slid.bs.carousel', (e) => {
        // e.relatedTarget is the new active .carousel-item
        const newIndex = items.indexOf(e.relatedTarget);
        thumbs.forEach(t => t.classList.remove('active'));
        if (thumbs[newIndex]) thumbs[newIndex].classList.add('active');
    });
});
</script>
<?php
        include_once('views/main/footer.php');
        ?>