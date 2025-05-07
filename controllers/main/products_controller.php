<?php
require_once('controllers/main/base_controller.php');
require_once('models/product.php');

class ProductsController extends BaseController
{
	function __construct()
	{
		$this->folder = 'products';
	}

	public function index()
	{
		$products = Product::getAll();
		$data = array('products' => $products);
		$this->render('index', $data);
	}
	public function menproduct()
	{
		$products = Product::getAllMen();
		$data = array('products' => $products);
		$this->render('menproduct', $data);
	}
	public function womenproduct()
	{
		$products = Product::getAllWomen();
		$data = array('products' => $products);
		$this->render('womenproduct', $data);
	}
	public function shoesproduct()
	{
		$products = Product::getAllShoes();
		$data = array('products' => $products);
		$this->render('shoesproduct', $data);
	}
	public function search()
    {
    $search_keyword = $_POST['search_product']; // Lấy giá trị từ ô tìm kiếm trong form
    $search_result = Product::search($search_keyword);
    $data = array('search_result' => $search_result);
    $this->render('search', $data);
    }
	public function vote(){
		session_start() ;
		$id= $_POST['product_id'] ;
		$star= $_POST['starRating'] ;
		Product::addvotebyid($id,$star) ;

		header('Location: index.php?page=main&controller=menproducts&action=index');
	
	}
}
