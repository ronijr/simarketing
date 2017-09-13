<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Model_booking extends CI_Model {

	private static $table_booking = 'booking';

	public function insert_booking($data){
		$this->db->insert(self::$table_booking, $data);
	}

	public function update_booking($id,$data){
		$this->db->where('booking_id',$id);
		$this->db->update(self::$table_booking, $data);
	}

	public function delete_booking($id){
		$this->db->where('booking_id',$id);
		$this->db->delete(self::$table_booking);
	}

	public function select_booking(){
		return $this->db->get(self::$table_booking);
	}

	public function select_booking_byid($id){
		$this->db->where('booking_id',$id);
		return $this->db->get(self::$table_booking);
	}


	public function check_id_booking($id){
		$this->db->where('booking_id',$id);
		$query = $this->db->get(self::$table_booking);
		return ($query->num_rows() == 1 ) ? true : false;
	}
}