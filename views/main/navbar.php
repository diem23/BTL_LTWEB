<?php
if (!isset($_SESSION)) {
  session_start();
} 
  if (isset($_SESSION['guest']))
  {
    require_once('models/user.php');
    $data = User::get($_SESSION['guest']);
  }
  
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>ROUTINE - Thương Hiệu Quần Áo Thời Trang Cao Cấp, Đồ Công Sở Đẹp</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Logo -->
    <link href="https://routine.vn/media/favicon/default/output-onlinejpgtools.png" rel="icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link href="assets/stylesheets/style.css" rel="stylesheet">
    <link href="assets/stylesheets/stylesheet.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/stylesheets/star_rating.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.js"
        integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Link CSS -->
    <link rel="stylesheet" href="assets/stylesheets/main/services.css">
    <link rel="stylesheet" href="assets/stylesheets/delivery.css">
    <link rel="stylesheet" href="assets/stylesheets/finish.css">
    <link rel="stylesheet" href="assets/stylesheets/product.css">
    <link rel="stylesheet" href="assets/stylesheets/cart.css">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>



</head>

<body>
    <?php
  if (isset($_SESSION['guest']))
  {
  echo '
    <div class="modal fade" id="EditUserModal" tabindex="-1" role="dialog" aria-labelledby="EditUserModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Chỉnh sửa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="index.php?page=main&controller=register&action=editInfo" enctype="multipart/form-data" method="post">
          <div class="modal-body">
            <input type="hidden" name="email">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <div class="row"> </div>
                  <label>Họ và tên lót</label>
                  <input class="form-control my-2" type="text" placeholder="Họ và tên lót" name="fname" value="' . $data->fname . '"/>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="row"> </div>
                  <label>Tên</label>
                  <input class="form-control my-2" type="text" placeholder="Tên" name="lname" value="' . $data->lname . '"/>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tuổi</label>
                  <input class="form-control my-2" type="number" placeholder="Tuổi" name="age" value="' . $data->age . '"/>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Giới tính:</label>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender"' . (($data->gender == '1')?'checked':"") . ' value="1" />
                        <label>Nam</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender"' . (($data->gender == '0')?'checked':"") . ' value="0" />
                        <label>Nữ</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Số điện thoại</label>
              <input class="form-control my-2" type="number" placeholder="Số điện thoại" name="phone" value="' . $data->phone . '"/>
            </div>
            <div class="form-group">
              <label>Đường dẫn hiện tại </label>
              <input class="form-control my-2" type="text" name="img" readonly value="' . $data->profile_photo . '" />
            </div>
            <div class="form-group">
            <label>Hình ảnh hiện tại </label> <br>
            <img src = "'. $data->profile_photo .'" style = "height: 100px; width: 100px;">
              <input type="file" class="form-control my-2" name="fileToUpload" id="fileToUpload" />
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng lại</button>
            <button class="btn btn-primary" type="submit">Cập nhật</button>
          </div>
        </form>
      </div>
    </div>
  </div>';
  }
  ?>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">

        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="public/assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav class="navbar navbar-expand-lg navbar-light bd-subnavbar py-2">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php?page=main&controller=layouts&action=index">
                    <img style="width: 100px; height: 100%;"
                        src="https://routine.vn/media/amasty/webp/logo/websites/1/logo-black-2x_png.webp" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-target="#navbarContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=main&controller=womenproducts&action=index">NỮ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=main&controller=menproducts&action=index">NAM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=main&controller=shoesproducts&action=index">GIÀY
                                HOT</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="index.php?page=main&controller=sale&action=index"
                                style="color: red !important">THÁNG
                                12 - SALE ĐẬM SÂU</a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="index.php?page=main&controller=blog&action=index">TIN TỨC</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=main&controller=contact&action=index">LIÊN HỆ</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="index.php?page=main&controller=about&action=index">VỀ CHÚNG
                                TÔI</a>
                        </li> -->
                    </ul>
                    <form class="search_product d-flex" action="index.php?page=main&controller=products&action=index"
                        method="post" autocomplete="off">
                        <input class="form-control me-2" type="search" name="search_product" placeholder="Tìm kiếm"
                            required>
                        <button class="btn btn-secondary" type="submit" name="search_button"><i
                                class="bi bi-search"></i></button>
                    </form>
                    <?php if (!isset($_SESSION["guest"])) { ?>
                    <a href="index.php?page=main&controller=register&action=index" data-bs-toggle="tooltip"
                        data-bs-placement="bottom" title="Đăng ký" class="nav-link"><i class="fas fa-user-plus"
                            style="font-size: 18px;"></i></a>
                    <a href="index.php?page=main&controller=login&action=index" data-bs-toggle="tooltip"
                        data-bs-placement="bottom" title="Đăng nhập" class="nav-link box-arrow-in-right"><i
                            class="fas fa-user" style="font-size: 18px;"></i></a>
                    <?php } else { ?>
                    <a href="" data-bs-toggle="modal" data-bs-target="#EditUserModal" class="nav-link"><i
                            class="fas fa-edit" style="font-size: 18px;"></i></a>
                    <a href="index.php?page=main&controller=login&action=logout" class="nav-link box-arrow-in-right"><i
                            class="fa fa-sign-out" style="font-size: 18px;"></i></a>
                    <a href="index.php?page=main&controller=log&action=index" class="nav-link box-arrow-in-right"><i
                            class="fa fa-history" style="font-size: 18px;"></i></a>
                    <?php } ?>
                    <div>
                        <li id="cart" class="menu">
                            <a data-bs-toggle="tooltip" data-bs-placement="bottom"
                                <?php if(isset($_SESSION["guest"])) {?>
                                href="index.php?page=main&controller=cart&action=index" <?php } else ?>
                                href="index.php?page=main&controller=login&action=index">
                                <i class="fa fa-shopping-bag" style="font-size: 18px;"></i>
                            </a>
                        </li>
                    </div>
                </div>
            </div>
        </nav>

    </header><!-- End Header -->