<?php

class Homecontroller extends CI_Controller{
	function __construct(){
		parent::__construct();
		 $this->load->database();
		 $this->load->helper('url');
	}
	
	
	public function home(){
		$this->load->model('homemodel');
	$this->data['product'] = $this->homemodel->carts();
	 $this->load->view('homeview',$this->data);

	}
	
}
