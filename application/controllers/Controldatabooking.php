<?php defined('BASEPATH') OR exit ('No direct access script allowed');

class Controldatabooking extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_booking');
	}

	public function index(){
		$this->list_booking();
	}


	public function list_booking(){
		$this->secure->isnot_login_be();
		$data= array(

		);
		$this->template->backend('booking/lihat_booking',$data);
	}

	public function create_booking(){
		$this->secure->isnot_login_be();
		$data=array(
			'get_kavling'	=> $this->model_booking->get_kavling()->result(),
			'get_konsumen'	=> $this->model_booking->get_konsumen()->result(),
		);
		$this->template->addCss(base_url().'vendors/select2/dist/css/select2.min.css');
		$this->template->addJs(base_url().'vendors/validator/validator.js');
		$this->template->addJs(base_url().'vendors/select2/dist/js/select2.min.js');
		$this->template->backend('booking/tambah_booking',$data);
	}
}
