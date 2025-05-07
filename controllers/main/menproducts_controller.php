<?php
require_once('controllers/main/base_controller.php');
require_once('models/product.php');

class MenproductsController extends BaseController
{
	function __construct()
	{
		$this->folder = 'menproducts';
	}

	public function index()
	{
		$menproducts = Product::getAllMen();
		$data = array('menproducts' => $menproducts);
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

		header('Location: index.php?page=main&controller=menproducts&action=index');
	
	}
	public function sortByPriceHighToLow()
    {
        $menproducts = Product::sortByPriceHighToLowMen();
        $data = array('menproducts' => $menproducts);
        $this->render('index', $data);
    }
	public function sortByPriceLowToHigh()
    {
        $menproducts = Product::sortByPriceLowToHighMen();
        $data = array('menproducts' => $menproducts);
        $this->render('index', $data);
    }
}