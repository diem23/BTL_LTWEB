<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: index.php?page=admin&controller=login&action=index");
}
?>

<?php
require_once('views/admin/header.php'); ?>

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
                    <li class="breadcrumb-item active">Quản lý Sản phẩm Giày</li>
                </ol>
            </div>
        </div>
        <div class="container-fluid row">
            <div class="my-3">
                <p class="row">
                <h1 class="text-center">Quản lý Sản phẩm Giày</h1>
                </p>
            </div>
        </div>
    </section>
    <hr>
    <!-- Main content-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="shadow p-2 rounded">
                    <div class="">
                        <button class="btn btn-primary mb-2" type="button" data-bs-toggle="modal" data-bs-target="#addUserModal">Thêm mới</button>
                        <div class="modal fade" id="addUserModal" aria-labelledby="addUserModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Thêm mới sản phẩm</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form id="form-add-product" action="index.php?page=admin&controller=shoesproducts&action=add" enctype="multipart/form-data" method="post">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-6"><label>Tên sản phẩm</label><input class="form-control my-2" type="text" placeholder="Tên sản phẩm" name="name" required/></div>
                                                <div class="col-6"><label>Giá</label><input class="form-control my-2" type="number" placeholder="Giá" name="price" required/></div>
                                            </div>
                                            <div class="form-group"><label>Sale</label><input class="form-control my-2" type="number" placeholder="Sale" name="sale" required/></div>
                                            <div class="form-group"> <label>Mô tả</label> <textarea class="form-control my-2" name="description" rows="5" required></textarea></div>
                                            <div class="form-group"> <label>Nội dung</label> <textarea class="form-control my-2" name="content" rows="5" required></textarea></div>
                                            <div class="form-group"> <label>Hình ảnh </label>&nbsp <input class="form-control my-2" type="file" name="fileToUpload" id="fileToUpload" required/></div>
                                            <div class="form-group"> <label>Hình ảnh phụ 1 </label>&nbsp <input class="form-control my-2" type="file" name="fileToUpload1" id="fileToUpload1" required/></div>

                                            <div class="form-group"> <label>Hình ảnh phụ 2</label>&nbsp <input class="form-control my-2" type="file" name="fileToUpload2" id="fileToUpload2" required/></div>

                                            <div class="form-group"> <label>Hình ảnh phụ 3</label>&nbsp <input class="form-control my-2" type="file" name="fileToUpload3" id="fileToUpload3" required/></div>

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng</button>
                                            <button class="btn btn-primary" type="submit">Thêm mới</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <table id="tab-product" class="table table-bordered table-striped mt-3 shadow">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col" class="d-none d-lg-table-cell">STT</th>
                                    <th scope="col" >Tên sản phẩm</th>
                                    <th scope="col" class="d-none d-lg-table-cell">Giá </th>
                                    <th scope="col" class="d-none d-lg-table-cell">Mô tả</th>
                                    <th scope="col" class="d-none d-lg-table-cell">Nội dung</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Hình ảnh phụ 1</th>
                                    <th scope="col">Hình ảnh phụ 2</th>
                                    <th scope="col">Hình ảnh phụ 3</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                $index = 1;

                                foreach ($shoesproducts as $shoesproduct) {  ?>

                                    
                                   
                                    <tr class="text-center">
                                                    <td class="d-none d-lg-table-cell">
                                                    <?php  echo $index ; ?>
                                                   </td>
                                                    <td>
                                                    <?php  echo $shoesproduct->name ; ?>  
                                                    </td>
                                                    <td class="d-none d-lg-table-cell">
                                                    <?php  echo $shoesproduct->price  ; ?>  
                                                    </td>
                                                    <td class="d-none d-lg-table-cell">
                                                    <?php  echo  $shoesproduct->description  ; ?>  
                                                    </td>
                                                    <td class="d-none d-lg-table-cell">
                                                    <?php  echo  $shoesproduct->content  ; ?>     
                                                    </td>
                                                    <td >
                                                        <img style="width: 100px; height:100px;" src=<?php echo $shoesproduct->img ;?>>
                                                    </td>
                                                    <td >
                                                        <img style="width: 100px; height:100px;"  src=<?php echo $shoesproduct->img1 ;?>>
                                                    </td>
                                                    <td >
                                                        <img style="width: 100px; height:100px;"  src=<?php echo $shoesproduct->img2 ;?>>
                                                    </td>
                                                    <td >
                                                        <img style="width: 100px; height:100px;"  src=<?php echo $shoesproduct->img3 ;?>>
                                                    </td>
                                                    
                                                    <td>
                                                    <button class="btn-edit btn btn-primary btn-xs" style="margin-right: 5px" data-bs-id= <?php echo $shoesproduct->id ;?> data-bs-name=<?php echo $shoesproduct->name ;?> data-bs-price=<?php echo $shoesproduct->price ;?> data-bs-description=<?php echo $shoesproduct->description ;?> data-bs-content=<?php echo $shoesproduct->content ; ?> data-bs-sale=<?php echo $shoesproduct->sale ;?> data-bs-img=<?php echo $shoesproduct->img ;?> data-bs-target='#EditProductModal' data-bs-toggle='modal'><svg xmlns='http://www.w3.org/2000/svg' width='13' height='13' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                                  </svg></button> 

                                                  <div>  
                                                  <form  action="index.php?page=admin&controller=shoesproducts&action=delete"  method="post">
                                                  <div class="modal-body" style="margin-top:10px ;">
                                                  <div class="col-12"> <input class="form-control my-2" type="hidden"  name="id" value = <?php echo $shoesproduct->id ; ?> readonly /></div>
                                                  </div>
                                                  <div class="modal-foot"><button class="btn btn-primary formedit" type="submit">Xóa</button></div>
                                                  </form>
                                                  <div>  
                                                  
                                                  
                                            
                                                </td>
                                                </tr>
                                                <?php
                                                $index++;
                                }
                                ?>
                            </tbody>
                            <div class="modal fade" id="EditProductModal" tabindex="-1" role="dialog" aria-labelledby="EditproductModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Chỉnh sửa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form id="form-edit-product" action="index.php?page=admin&controller=shoesproducts&action=edit" enctype="multipart/form-data" method="post">
                                            <div class="modal-body">
                                                <div class="col-12"><label>ID</label> <input class="form-control my-2" type="text" placeholder="Name" name="id" readonly /></div>
                                                <div class="row">
                                                    <div class="col-6"><label>Tên sản phẩm</label><input class="form-control my-2" type="text" placeholder="Tên sản phẩm" name="name" required/></div>
                                                    <div class="col-6"><label>Giá</label><input class="form-control my-2" type="number" placeholder="Giá" name="price" required/></div>
                                                </div>

                                                <div class="form-group"><label>Sale</label><input class="form-control my-2" type="number" placeholder="Sale" name="sale" required/></div>
                                                <div class="form-group"> <label>Mô tả</label> <textarea class="form-control my-2" name="description" rows="5" required></textarea></div>
                                                <div class="form-group"> <label>Nội dung</label> <textarea class="form-control my-2" name="content" rows="5" required></textarea></div>
                                                <div class="form-group"> <label> Hình ảnh </label>&nbsp <input type="file" class="form-control my-2" name="fileToUpload" id="fileToUpload"/></div>
                                                <div class="form-group"> <label> Hình ảnh phụ 1 </label>&nbsp <input type="file" class="form-control my-2" name="fileToUpload1" id="fileToUpload1"/></div>
                                                <div class="form-group"> <label> Hình ảnh phụ 2</label>&nbsp <input type="file" class="form-control my-2" name="fileToUpload2" id="fileToUpload2"/></div>
                                                <div class="form-group"> <label> Hình ảnh phụ 3</label>&nbsp <input type="file" class="form-control my-2" name="fileToUpload3" id="fileToUpload3"/></div>

                                            
                                            
                                            </div>
                                            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Đóng</button><button class="btn btn-primary formedit" type="submit">Chỉnh sửa</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                           
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>




</div>


<?php
require_once('views/admin/footer.php'); ?>
<script src="assets/javascripts/product/index.js"></script>
<!-- Add Javascript-->


</body>

</html>