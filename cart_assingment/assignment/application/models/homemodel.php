<?php
class HomeModel extends CI_Model{

	public function carts(){
	

			 $this->db->select("*");
			 $this->db->from("categories");

			 $query=$this->db->get();
	         return $query->result();

	}
	
}