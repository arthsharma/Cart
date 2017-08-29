<?php
class MainModel extends CI_Model{
	
	public function our_pro($cid){

		$this->db->select("*");
		$this->db->where("cid",$cid);
		$this->db->from("products");

		$query = $this->db->get();
		return $query->result();
	}
}