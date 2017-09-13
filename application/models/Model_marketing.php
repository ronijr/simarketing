<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Login Model Class
 *
 */
class Model_marketing extends CI_Model {

	private static $table_marketing = 'users';

	public function insert_marketing($data){
		$this->db->insert(self::$table_marketing, $data);
	}

	public function update_marketing($id,$data){
		$this->db->where('us_id',$id);
		$this->db->update(self::$table_marketing, $data);
	}

	public function delete_marketing($id){
		$this->db->where('us_id',$id);
		$this->db->delete(self::$table_marketing);
	}

	public function select_marketing(){
		$this->db->where('us_level',2);
		return $this->db->get(self::$table_marketing);
	}

	public function select_marketing_byid($id){
		$this->db->where('us_id',$id);
		return $this->db->get(self::$table_marketing);
	}


	public function check_id_marketing($id){
		$this->db->where('us_id',$id);
		$query = $this->db->get(self::$table_marketing);
		return ($query->num_rows() == 1 ) ? true : false;
	}
}