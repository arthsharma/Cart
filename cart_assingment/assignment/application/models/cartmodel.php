<?php
class CartModel extends CI_Model{

	public function buy_pro($id){
	$this->db->select("*");
	$this->db->where("id", $id);
	$this->db->from("products");

	$query = $this->db->get(); 
	return $query->result();

}
}