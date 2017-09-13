<?php defined('BASEPATH') OR exit ('No direct access script allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_konsumen');
		$this->load->model('model_kavling');
		$this->load->model('model_marketing');
		$this->load->model('model_booking');
	}

	public function index(){
		$data=array(
				'total_user'		=> $this->model_marketing->select_marketing()->num_rows(),
				'total_konsumen'	=> $this->model_konsumen->select_konsume_all()->num_rows(),
				'total_kavling'		=> $this->model_kavling->select_kavling()->num_rows(),
				'total_booking'		=> $this->model_booking->select_booking()->num_rows(),
			);
		$this->template->backend('dashboard/dashboard',$data);
	}
}
