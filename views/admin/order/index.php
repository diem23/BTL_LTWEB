<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: index.php?page=admin&controller=login&action=index");
}
?>
<?php
require_once('views/admin/header.php'); 
include_once('controllers/admin/order_controller.php') ;
$data = new OrderController ;
$order = $data->order() ;


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
                <h1 class="text-center">Đơn đặt hàng</h1>
                </p>
            </div>
        </div>
    </section>
    <hr>
    <!-- Main content-->
    <section class="content">
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
                                                <th class="d-none d-lg-table-cell">STT</th>
                                                <th class="d-none d-lg-table-cell">Code đơn hàng</th>
                                                <th class="d-none d-lg-table-cell">Ngày đặt</th>
                                                <th class="d-none d-lg-table-cell">Tình trạng</th>
                                                <th class="d-none d-lg-table-cell">Chi tiết</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                           $i = 0 ;

                                            foreach ($order as $key => $ord) { ?>
                                                
                                                <tr class="text-center">
                                                  <?php $i++ ; ?>
                                                    <td class="d-none d-lg-table-cell">
                                                        <?php echo $i ; ?>
                                                    </td>
                                                    <td class="d-none d-lg-table-cell">
                                                       <?php echo $ord['order_code'] ?>
                                                    </td>
                                                    <td class="d-none d-lg-table-cell">
                                                         <?php echo $ord['order_date'] ?>
                                                    </td>   
                                                    <td class="d-none d-lg-table-cell">
                                                         <?php if($ord['order_status'] == 0){echo "Đơn hàng mới";} else{echo "Đã xử lý";} ?>
                                                    </td>   
                                                    <td class="d-none d-lg-table-cell">
                                
                                                        <a href="index.php?page=admin&controller=order_details&id=<?php echo $ord['order_code'] ?>&action=index"> Xem đơn hàng </a>
                                                    </td>   
                                                                                                                                                                                                                    
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                        
                                    </table>
                                </div>
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