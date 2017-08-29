<?php 
class MainController extends CI_Controller{
	
	
	public function main(){
		$cid = $this->uri->segment(3);
		//echo $cid;
		$this->load->model('mainmodel');
		
		$this->data['details']=$this->mainmodel->our_pro($cid);
		$this->load->view('mainview',$this->data);
	}

	
}