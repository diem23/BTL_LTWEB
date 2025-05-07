<?php
require_once('controllers/main/base_controller.php');
require_once('models/product.php');

class ShoesproductsController extends BaseController
{
	function __construct()
	{
		$this->folder = 'shoesproducts';
	}

	public function index()
	{
		$shoesproducts = Product::getAllShoes();
		$data = array('shoesproducts' => $shoesproducts);
		$this->render('index', $data);
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

		header('Location: index.php?page=main&controller=shoesproducts&action=index');
	
	}
	public function sortByPriceHighToLow()
    {
        $shoesproducts = Product::sortByPriceHighToLowShoes();
        $data = array('shoesproducts' => $shoesproducts);
        $this->render('index', $data);
    }
	public function sortByPriceLowToHigh()
    {
        $shoesproducts = Product::sortByPriceLowToHighShoes();
        $data = array('shoesproducts' => $shoesproducts);
        $this->render('index', $data);
    }
}