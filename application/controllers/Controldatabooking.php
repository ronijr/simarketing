<?php defined('BASEPATH') OR exit ('No direct access script allowed');

class Controldatabooking extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->list_booking();
	}


	public function list_booking(){
		$this->secure->isnot_login_be();
		$data= array();
		$this->template->backend('booking/lihat_booking',$data);
	}

	public function create_booking(){
		$this->secure->isnot_login_be();
		$data=array();
		$this->template->backend('booking/tambah_booking',$data);
	}
}