<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: index.php?page=admin&controller=login&action=index");
}
?>
<?php
require_once('views/admin/header.php'); 
$id = $_GET['id'];
include_once('controllers/admin/order_details_controller.php') ;
$datax = new OrderDetailsController ;
$order_details = $datax->order_details($id) ;
$order_info = $datax->order_infos($id) ;
$total = 0 ;
?>

<!-- Add CSS -->


<?php
require_once('views/admin/content_layouts.php'); ?>

<!-- Code -->
<div class="content-wrapper">
    <!-- Add Content -->
    <!-- Content Header (Page header)-->
    <section class="content-header">
        <div class="container-fluid">
            <div class="float-end">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Quản lý Khách hàng</li>
                </ol>
            </div>
        </div>
        <div class="container-fluid row">
            <div class="my-3">
                <p class="row">
                <h1 class="text-center">Xử lý đơn đặt hàng số <?php echo $id ?></h1>
                <?php foreach($order_info as $k => $info) {?>
                <div class="col-12">
                    <table class="table table-bordered table-striped shadow">
                        <thead>
                            <tr class="text-center">
                                <th class="d-none d-lg-table-cell">Tên </th>
                                <th class="d-none d-lg-table-cell">Email </th>
                                <th class="d-none d-lg-table-cell">Địa chỉ </th>
                                <th class="d-none d-lg-table-cell">Số điện thoại </th>
                                <th class="d-none d-lg-table-cell">Phương thức thanh toán </th>
                                <th class="d-none d-lg-table-cell">Minh chứng thanh toán </th>
                            </tr>
                        </thead>
                        <tbody>
                            <th class="d-none d-lg-table-cell" style="text-align:center"><?php echo $info['name']?></th>
                            <th class="d-none d-lg-table-cell" style="text-align:center"><?php echo $info['email']?>
                            </th>
                            <th class="d-none d-lg-table-cell" style="text-align:center"><?php echo $info['location']?>
                            </th>
                            <th class="d-none d-lg-table-cell" style="text-align:center"><?php echo $info['phone']?>
                            </th>
                            <th class="d-none d-lg-table-cell" style="text-align:center"><?php echo $info['method']?>
                            </th>
                            <th class="d-none d-lg-table-cell" style="text-align:center;"><img style=" width: 75px ; height: 75px;"
                                    src="<?php echo $info['proof']?>" alt="proof"> </th>
                        </tbody>
                    </table>
                </div>


                <?php  } ?>
                </p>
            </div>
        </div>
    </section>
    <hr>
    <!-- Main content-->
    <section class=" content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="shadow p-2 rounded">
                        <div class="">


                            <div class="row">
                                <div class="col-12">
                                    <table id="tab-comment" class="table table-bordered table-striped shadow">
                                        <thead>




                                            <tr class="text-center">
                                                <th class="d-none d-lg-table-cell">ID</th>
                                                <th class="d-none d-lg-table-cell">Tên đơn hàng
                                                </th>
                                                <th class="d-none d-lg-table-cell">Hình ảnh</th>
                                                <th class="d-none d-lg-table-cell">Số lượng</th>
                                                <th class="d-none d-lg-table-cell">Size
                                                </th>
                                                <th class="d-none d-lg-table-cell">Đơn giá</th>
                                                <th class="d-none d-lg-table-cell">Khuyến mãi
                                                </th>
                                                <th class="d-none d-lg-table-cell">Thành tiền
                                                </th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                           $i = 0 ;

                                            foreach ($order_details as $key => $ord) { 
                                                $temp = $ord['product_quantity']* $ord['price'] * (100-$ord['sale'])/100 ;
                   
                                                $total += $temp ; 
                                                ?>

                                            <tr class="text-center">
                                                <?php $i++ ; ?>
                                                <td class="d-none d-lg-table-cell">
                                                    <?php echo $i ; ?>
                                                </td>
                                                <td class="d-none d-lg-table-cell">
                                                    <?php echo $ord['name'] ?>
                                                </td>
                                                <td class="d-none d-lg-table-cell">
                                                    <img style="width: 100px; height:100px;"
                                                        src='<?php echo $ord['img'] ?>'>
                                                </td>
                                                <td class="d-none d-lg-table-cell">
                                                    <?php echo $ord['product_quantity'] ?>
                                                </td>
                                                <td class="d-none d-lg-table-cell">
                                                    <?php echo $ord['product_size'] ?>
                                                </td>
                                                <td class="d-none d-lg-table-cell">
                                                    <?php echo $ord['price'] ?>
                                                </td>
                                                <td class="d-none d-lg-table-cell">
                                                    <?php echo $ord['sale'] ?>
                                                </td>
                                                <td class="d-none d-lg-table-cell">
                                                    <?php echo $ord['product_quantity']* $ord['price'] * (100-$ord['sale'])/100 ?>
                                                </td>


                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                </div>
                                <div class="col_table_name" style="text-align: right;">
                                    <h4 class="nomargin" style="font-size: 18px;"> Tổng thanh
                                        toán: <?php echo $total?>
                                        VNĐ </h4>
                                </div>
                                <form method="POST"
                                    action="index.php?page=admin&controller=order_details&action=confirm">
                                    <div class="input">
                                        <input type="hidden" value="<?php echo $id ?>" name="order_code"
                                            id="order_code">
                                        <input type="submit" value="Cập nhật đã thanh toán" name="confirm_cart"
                                            class="btn btn-sm btn-primary" name="formsubmit" id="formsubmit">

                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




</div>


<?php
require_once('views/admin/footer.php'); ?>

<!-- Add Javascripts -->
<script src="assets\javascripts\comment\index.js"></script>

</body>

</html>