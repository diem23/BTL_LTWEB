<?php
require_once('controllers/main/base_controller.php');
require_once('models/order.php');

class CartController extends BaseController
{
	function __construct()
	{ 
	    $data = array() ;
        $this->folder = 'cart';
    }
	public function index()
	{
	
		session_start() ;
		$this->render('index');
	}
	public function submit()
	{
		session_start() ;
		if(!isset($_SESSION["guest"])){
			header('Location: index.php?page=main&controller=login&action=index');
		}
		else{
		if(isset($_SESSION["shopping_cart"])){
			$available = 0 ;
			foreach($_SESSION["shopping_cart"] as $key => $value){
				if($_SESSION["shopping_cart"][$key]['product_id'] == $_POST['product_id'] ){
					$available ++ ;
					$_SESSION["shopping_cart"][$key]['product_quantity'] += $_POST['product_quantity'] ;

				}
				

			}
			if($available == 0) {
				$item = array(
					'product_id' => $_POST["product_id"],
					'product_name' => $_POST["product_name"],
					'product_image' => $_POST["product_image"],
					'product_price' => $_POST["product_price"],
					'product_sale' => $_POST["product_sale"],
					'product_quantity' => $_POST["product_quantity"],
					'product_size' => $_POST["size"]
				);
				$_SESSION["shopping_cart"][] = $item ;

			}

		}
		else{
			$item = array(
				'product_id' => $_POST["product_id"],
				'product_name' => $_POST["product_name"],
				'product_image' => $_POST["product_image"],
				'product_price' => $_POST["product_price"],
				'product_sale' => $_POST["product_sale"],
				'product_quantity' => $_POST["product_quantity"],
				'product_size' => $_POST["size"]
			);
			$_SESSION["shopping_cart"][] = $item ;

		}
		header('Location: index.php?page=main&controller=cart&action=index');
		}
	}

	public function update(){
	
		session_start() ;

		if(isset($_POST["delete_cart"])){
		if(isset($_SESSION["shopping_cart"])){
			foreach($_SESSION["shopping_cart"] as $key => $values){
				if($_SESSION["shopping_cart"][$key]['product_id'] == $_POST['delete_cart'] ){
					unset($_SESSION["shopping_cart"][$key]) ; 

				}
			}
			header('Location: index.php?page=main&controller=cart&action=index');
			

		}
		else{
			header('Location: index.php?page=main&controller=layouts&action=index');

		}
	}
		else {
			foreach($_POST['qty'] as $key => $qty){
				foreach($_SESSION["shopping_cart"] as $session => $values){
					if($values['product_id']==$key  ){
						$_SESSION["shopping_cart"][$session]['product_quantity'] =  $qty ;

					}
				}
		
			}
			header('Location: index.php?page=main&controller=cart&action=index');
    	}
    }
	public function order()
	{
		session_start() ;
		//$table_order_details = "order_details" ;
		//$ordermodel= Order::getAll();
		if (isset($_POST['payment_method'])) {
			$method = $_POST['payment_method'];
		}
		$name = $_POST['name'];
        $phone = $_POST['phone-number'];
        $email = $_POST['email'];
        $tinhThanh = $_POST['province'];
        $quanHuyen = $_POST['district'];
        $phuongXa = $_POST['ward'];
        $diaChi = $_POST['address-detail'];
		$location = $diaChi . ', ' . $phuongXa . ', ' . $quanHuyen . ', ' . $tinhThanh;
        $ngayDatHang = date('Y-m-d');
		$order_code = rand(0,99999999);

		date_default_timezone_set('asia/ho_chi_minh') ;
		$date = date("d/m/Y") ;
		$hour = date("h:i:sa") ;
		$order_date = $date .' '. $hour ;
		$order_status = 0 ;
		$mail = $_POST['email'];
		echo $order_code ;
		echo $order_date ;
		echo $order_status ;
		$result_order = Order::insert($order_code,$order_date,$order_status,$mail); 
		
		$id = (string)date("Y_m_d_h_i_sa"); 
        $fileuploadname = (string)$id;
		$target_dir = "assets/images/";
        $path = $_FILES['fileToUpload']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $fileuploadname .= ".";
        $fileuploadname .= $ext;
        $target_file = $target_dir . basename($fileuploadname);
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Allow certain file formats
        if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
        && $fileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $upload_ok = 0;
        }
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
        }

        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) ;
		

		if(isset($_SESSION["shopping_cart"])){
		
			 foreach($_SESSION["shopping_cart"] as $key => $value){
				
					
				$product_id = $value['product_id'] ;
				$product_quantity = $value['product_quantity'] ;
				$product_size = $value['product_size'];
				
				$result_order_details = Order::insert_details($order_code,$product_id,$product_quantity,$product_size,$name,$phone,$email,$location,$method,$target_file); 

			 }
			 unset($_SESSION["shopping_cart"]);

		}
		if($result_order_details){
			//$message['msg'] = "Đặt hàng thành công" ;
			header('Location: index.php?page=main&controller=cart&action=index');

		}
	}
	
	public function Listorder()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$mail = $_POST['user_mail'];
			$orders = Order::list_order_user($mail);
	
			$data['order'] = $orders;
			return $data['order'];
		}
	
		return []; // Trả về một mảng rỗng nếu không có dữ liệu đầu vào
	}

}