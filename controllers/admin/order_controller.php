<?php
require_once('controllers/admin/base_controller.php');
require_once('models/order.php');

class OrderController extends BaseController
{
	function __construct()
	{ 
        $this->folder = 'order';
    }
	public function index()
	{
	
		$this->render('index');
	}
    public function order()
	{   
        $data['order'] = Order::list_order() ;
		return $data['order'] ;
	
	
	}
	
	
	



}
