<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_konsumen extends CI_Model {

	private static $table_konsumen = 'konsumen';
	private static $table_user = 'users';

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

	public function select_konsumen($id,$level){
		if($level == 1){
			$this->db->select("*");
			$this->db->from(self::$table_konsumen);
			$this->db->join(self::$table_user, self::$table_user.'.us_id='.self::$table_konsumen.'.us_fk_id','INNER');
			return $this->db->get();
		} else{
			$this->db->select("*");
			$this->db->from(self::$table_konsumen);
			$this->db->join(self::$table_user, self::$table_user.'.us_id='.self::$table_konsumen.'.us_fk_id','INNER');
			$this->db->where('us_fk_id',$id);
			return $this->db->get();
		}
	}

		public function select_konsume_all(){

				$this->db->select("*");
				$this->db->from(self::$table_konsumen);
				$this->db->join(self::$table_user, self::$table_user.'.us_id='.self::$table_konsumen.'.us_fk_id','INNER');
				return $this->db->get();
	}

	public function select_konsumen_byid($id){
		$this->db->where('konsumen_id',$id);
		return $this->db->get(self::$table_konsumen);
	}

	public function get_user($username){
		$this->db->where('us_uname',$username);
		return $this->db->get(self::$table_user);
	}


	public function check_id_konsumen($id){
		$this->db->where('konsumen_id',$id);
		$query = $this->db->get(self::$table_konsumen);
		return ($query->num_rows() == 1 ) ? true : false;
	}


}
