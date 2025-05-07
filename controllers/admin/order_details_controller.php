<?php
require_once('controllers/admin/base_controller.php');
require_once('models/order.php');

class OrderDetailsController extends BaseController
{
	function __construct()
	{ 
        $this->folder = 'order_details';
    }
	public function index()
	{
	
		$this->render('index');
	}
    public function order_details($order_code)
	{   
        
        $data['order_details'] = Order::list_order_details($order_code) ;
		return $data['order_details'] ;
	
	
	}
	public function order_infos($order_code)
	{   
        
        $data['order_details'] = Order::list_order_infos($order_code) ;
		return $data['order_details'] ;
	
	
	}
	public function confirm()
	{   
        $order_code = $_POST["order_code"] ;
		Order::confirm_status($order_code) ;
		header('Location: index.php?page=admin&controller=order&action=index');

        
	
	}
	
	
	



}
