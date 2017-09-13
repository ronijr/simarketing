<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kavling extends CI_Model {

	private static $table_kavling = 'kavling';

	public function insert_kavling($data){
		$this->db->insert(self::$table_kavling, $data);
	}

	public function update_kavling($id,$data){
		$this->db->where('kavling_id',$id);
		$this->db->update(self::$table_kavling, $data);
	}

	public function delete_kavling($id){
		$this->db->where('kavling_id',$id);
		$this->db->delete(self::$table_kavling);
	}

	public function select_kavling(){
		return $this->db->get(self::$table_kavling);
	}

	public function select_kavling_byid($id){
		$this->db->where('kavling_id',$id);
		return $this->db->get(self::$table_kavling);
	}

	public function select_kavling_ada($block,$no_rumah){
		$this->db->where('block',$block);
		$this->db->where('no_rumah',$no_rumah);
		$query = $this->db->get(self::$table_kavling);
		return ($query->num_rows() == 1) ? true : false;

	}


	public function check_id_kavling($id){
		$this->db->where('kavling_id',$id);
		$query = $this->db->get(self::$table_kavling);
		return ($query->num_rows() == 1 ) ? true : false;
	}
}
