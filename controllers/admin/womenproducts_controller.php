<?php
require_once('controllers/admin/base_controller.php');
require_once('models/product.php');


class WomenproductsController extends BaseController
{
	function __construct()
	{
		$this->folder = 'womenproducts';
	}

	public function index()
	{
        $womenproducts = Product::getAllWomen();
        $data = array('womenproducts' => $womenproducts);
        $this->render('index', $data);
	}
    public function add(){
        $id = (string)date("Y_m_d_h_i_sa");
        $id1 = $id."1" ;
        $id2 = $id."2" ;
        $id3 = $id."3" ;
        $fileuploadname = (string)$id;
        $fileuploadname1 = (string)$id1;
        $fileuploadname2 = (string)$id2;
        $fileuploadname3 = (string)$id3;
        $name = $_POST['name'];
        $sale = $_POST['sale'];
        $price= $_POST['price'];
        $description = $_POST['description'];
        $content = $_POST['content'];
        $target_dir = "assets/images/";
        $path = $_FILES['fileToUpload']['name'];
        $path1 = $_FILES['fileToUpload1']['name'];
        $path2 = $_FILES['fileToUpload2']['name'];
        $path3 = $_FILES['fileToUpload3']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $ext1 = pathinfo($path1, PATHINFO_EXTENSION);
        $ext2 = pathinfo($path2, PATHINFO_EXTENSION);
        $ext3 = pathinfo($path3, PATHINFO_EXTENSION);
        $fileuploadname .= ".";
        $fileuploadname .= $ext;
        $fileuploadname1 .= ".";
        $fileuploadname1 .= $ext1;
        $fileuploadname2 .= ".";
        $fileuploadname2 .= $ext2;
        $fileuploadname3 .= ".";
        $fileuploadname3 .= $ext3;
        $target_file = $target_dir . basename($fileuploadname);
        $target_file1 = $target_dir . basename($fileuploadname1);
        $target_file2 = $target_dir . basename($fileuploadname2);
        $target_file3 = $target_dir . basename($fileuploadname3);
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
        }
        if (file_exists($target_file1)) {
            echo "Sorry, file already exists.";
        }
        if (file_exists($target_file2)) {
            echo "Sorry, file already exists.";
        }
        if (file_exists($target_file3)) {
            echo "Sorry, file already exists.";
        }
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $fileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
        $fileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
        $fileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));
        // Allow certain file formats
        if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
        && $fileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $upload_ok = 0;
        }
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
        }
        if($fileType1 != "jpg" && $fileType1 != "png" && $fileType1 != "jpeg"
        && $fileType1 != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $upload_ok1 = 0;
        }
        if ($_FILES["fileToUpload1"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
        }
        if($fileType2 != "jpg" && $fileType2 != "png" && $fileType2 != "jpeg"
        && $fileType2 != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $upload_ok2 = 0;
        }
        if ($_FILES["fileToUpload2"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
        }
        if($fileType3 != "jpg" && $fileType3 != "png" && $fileType3 != "jpeg"
        && $fileType3 != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $upload_ok3 = 0;
        }
        if ($_FILES["fileToUpload3"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
        }
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1);
        move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2);
        move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file3);
        $vote_number = 0;
        $total_stars = 0 ;
        Product::insertwomen($name, $price, $description, $content, $target_file, $target_file1,$target_file2,$target_file3,$sale,$vote_number,$total_stars);
        header('Location: index.php?page=admin&controller=womenproducts&action=index');
    }
    public function edit(){
        $id = $_POST['id'];
        
        $code = (string)date("Y_m_d_h_i_sa");
        $code1 = $code."1" ;
        $code2 = $code."2" ;
        $code3 = $code."3" ;
        $fileuploadname = (string)$code;
        $fileuploadname1 = (string)$code1;
        $fileuploadname2 = (string)$code2;
        $fileuploadname3 = (string)$code3;
        $name = $_POST['name'];
        $sale = $_POST['sale'];
        $price= $_POST['price'];
        $description = $_POST['description'];
        $content = $_POST['content'];
        $urlcurrent = Product::get((int)$id)->img;
        $urlcurrent1 = Product::get((int)$id)->img1;
        $urlcurrent2 = Product::get((int)$id)->img2;
        $urlcurrent3 = Product::get((int)$id)->img3;

        $vote_number = 0;
        $total_stars = 0 ;
        if (!isset($_FILES["fileToUpload"]) || $_FILES['fileToUpload']['tmp_name'][0] == ""||
        !isset($_FILES["fileToUpload1"]) || $_FILES['fileToUpload1']['tmp_name'][0] == ""||
        !isset($_FILES["fileToUpload2"]) || $_FILES['fileToUpload2']['tmp_name'][0] == ""||
        !isset($_FILES["fileToUpload3"]) || $_FILES['fileToUpload3']['tmp_name'][0] == "")
        {
            Product::update($id, $name, $price, $description, $content, $urlcurrent,$urlcurrent1 ,$urlcurrent2,$urlcurrent3,$sale, $vote_number,$total_stars);
            echo "Dữ liệu upload bị lỗi";
            header('Location: index.php?page=admin&controller=womenproducts&action=index');
            die;
        }
        else{
            $target_dir = "assets/images/";
            $path = $_FILES['fileToUpload']['name'];
            $path1 = $_FILES['fileToUpload1']['name'];
            $path2 = $_FILES['fileToUpload2']['name'];
            $path3 = $_FILES['fileToUpload3']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $ext1 = pathinfo($path1, PATHINFO_EXTENSION);
            $ext2 = pathinfo($path2, PATHINFO_EXTENSION);
            $ext3 = pathinfo($path3, PATHINFO_EXTENSION);
            $fileuploadname .= ".";
            $fileuploadname .= $ext;
            $fileuploadname1 .= ".";
            $fileuploadname1 .= $ext1;
            $fileuploadname2 .= ".";
            $fileuploadname2 .= $ext2;
            $fileuploadname3 .= ".";
            $fileuploadname3 .= $ext3;
            $target_file = $target_dir . basename($fileuploadname);
            $target_file1 = $target_dir . basename($fileuploadname1);
            $target_file2 = $target_dir . basename($fileuploadname2);
            $target_file3 = $target_dir . basename($fileuploadname3);
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
            }
            $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $fileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
            $fileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
            $fileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));
            // Allow certain file formats
            if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
            && $fileType != "gif" &&
            $fileType1 != "jpg" && $fileType1 != "png" && $fileType1 != "jpeg"
            && $fileType1 != "gif" &&
            $fileType2!= "jpg" && $fileType2 != "png" && $fileType2 != "jpeg"
            && $fileType2!= "gif" &&
            $fileType3 != "jpg" && $fileType3 != "png" && $fileType3 != "jpeg"
            && $fileType3 != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $upload_ok = 0;
            }
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
            }
            if ($_FILES["fileToUpload1"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
            }
            if ($_FILES["fileToUpload2"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
            }
            if ($_FILES["fileToUpload3"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
            }
            $file_pointer = $urlcurrent;
            unlink($file_pointer);
            $file_pointer1 = $urlcurrent1;
            unlink($file_pointer1);
            $file_pointer2 = $urlcurrent2;
            unlink($file_pointer2);
            $file_pointer3 = $urlcurrent3;
            unlink($file_pointer3);
           
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1);
            move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2);
            move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file3);
            Product::update($id, $name, $price, $description, $content, $target_file, $target_file1, $target_file2, $target_file3, $sale, $vote_number,$total_stars);
            header('Location: index.php?page=admin&controller=womenproducts&action=index');
        }
    }
    public function delete(){
        
        $id = $_POST['id'];
        $urlcurrent = Product::get((int)$id)->img;
        $urlcurrent1 = Product::get((int)$id)->img1;
        $urlcurrent2 = Product::get((int)$id)->img2;
        $urlcurrent3 = Product::get((int)$id)->img3;
        unlink($urlcurrent);
        unlink($urlcurrent1);
        unlink($urlcurrent2);
        unlink($urlcurrent3);
        Product::delete($id);
        header('Location: index.php?page=admin&controller=womenproducts&action=index');
    }
}
