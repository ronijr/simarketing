<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Model_booking extends CI_Model {

	private static $table_booking = 'booking';
	private static $table_kavling = 'kavling';
	private static $table_konsumen = 'konsumen';
	private static $table_user = 'users';

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

	public function select_booking_join(){
		$this->db->select("*");
		$this->db->from(self::$table_booking);
		$this->db->join(self::$table_kavling, self::$table_kavling.'.kavling_id='.self::$table_booking.'.kavling_fk_id','INNER');
		$this->db->join(self::$table_konsumen, self::$table_konsumen.'.konsumen_id='.self::$table_booking.'.konsumen_fk_id','INNER');
		$this->db->join(self::$table_user, self::$table_user.'.us_id='.self::$table_booking.'.us_fk_id','INNER');
		$this->db->order_by('tanggal','ASC');
		return $this->db->get();
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

	public function get_kavling(){
		$this->db->where('status',0);
		return $this->db->get(self::$table_kavling);
	}

	public function get_konsumen(){
	return $this->db->get(self::$table_konsumen);
	}

	public function get_konsumen_byid($id){
	$this->db->where('konsumen_id',$id);
	return $this->db->get(self::$table_konsumen);
	}

	public function get_user($username){
		$this->db->where('us_uname',$username);
		return $this->db->get(self::$table_user);
	}

	

}
