</head>
<style>
#sidebarMenu .nav-item:hover{
  background-color: #bbb;
  color: var(--primary);
}
</style>

<body>
    <header class="navbar navbar-dark sticky-top bg-light flex-md-nowrap p-2 shadow">
        <a class="  col-md-3 col-lg-2 me-0 px-3 fs-4  text-decoration-none" href="#">
            <div class="font-weight-bold text-dark "> <strong>ROUTINE</strong></div>
        </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#" id="title">Administrator</a>
            </div>
        </div>

    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-2 sidebar-sticky">
                    <h6
                        class="p-2 sidebar-heading d-flex justify-content-between align-items-center px-3 mt-1 mb-1 fs-5 text-muted text-uppercase">
                        <span>Quản lý thành viên</span>
                    </h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link fs-6" href="index.php?page=admin&controller=admin&action=index">
                                <i class="fas fa-user-secret m-2"></i>
                                Thành viên
                            </a>
                        </li>
                        <li class="nav-item fs-6">
                            <a class="nav-link" href="index.php?page=admin&controller=user&action=index">
                                <i class="fas fa-user m-2"></i>
                                Khách hàng
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <h6
                        class="p-2 sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 fs-5 text-muted text-uppercase">
                        <span>Dịch vụ</span>
                        <i class="link-secondary" href="index.php?page=admin&controller=comments&action=index"
                            aria-label="Add a new report">

                        </i>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item fs-6">
                            <a class="nav-link" href="index.php?page=admin&controller=womenproducts&action=index">
                                <i class="fas fa-shopping-bag m-2"></i>
                                Sản phẩm nữ
                            </a>
                        </li>
                        <li class="nav-item fs-6">
                            <a class="nav-link" href="index.php?page=admin&controller=menproducts&action=index">
                                <i class="fas fa-shopping-bag m-2"></i>
                                Sản phẩm nam
                            </a>
                        </li>
                        
                        <li class="nav-item fs-6">
                            <a class="nav-link" href="index.php?page=admin&controller=order&action=index">
                                <i class="fas fa-file-invoice m-2"></i>
                                Đơn đặt hàng
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="nav flex-column mb-2 dropdown justify-content-between align-items-center">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" data-bs-reference="parent">
                            <?php
							echo $_SESSION["user"]
							?><img class="border rounded-circle p-1 mx-2 dropdown-toggle" src="assets\images\admin_logo.png" alt=""
                                width="35" height="35">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item"
                                    href="index.php?page=admin&controller=login&action=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
