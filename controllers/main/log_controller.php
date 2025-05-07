<?php
require_once('controllers/main/base_controller.php');

class LogController extends BaseController
{
	function __construct()
	{
		$this->folder = 'log';
	}

	public function index()
	{
		$this->render('index');
	}
}