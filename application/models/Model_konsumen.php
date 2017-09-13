<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_konsumen extends CI_Model {

	private static $table_konsumen = 'konsumen';

	public function insert_konsumen($data){
		$this->db->insert(self::$table_konsumen, $data);
	}

	public function update_konsumen($id,$data){
		$this->db->where('konsumen_id',$id);
		$this->db->update(self::$table_konsumen, $data);
	}

	public function delete_konsumen($id){
		$this->db->where('konsumen_id',$id);
		$this->db->delete(self::$table_konsumen);
	}

	public function select_konsumen(){
		return $this->db->get(self::$table_konsumen);
	}

	public function select_konsumen_byid($id){
		$this->db->where('konsumen_id',$id);
		return $this->db->get(self::$table_konsumen);
	}


	public function check_id_konsumen($id){
		$this->db->where('konsumen_id',$id);
		$query = $this->db->get(self::$table_konsumen);
		return ($query->num_rows() == 1 ) ? true : false;
	}


}