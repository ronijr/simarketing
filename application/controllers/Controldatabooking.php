<?php defined('BASEPATH') OR exit ('No direct access script allowed');

class Controldatabooking extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_booking');
		$this->load->model('model_kavling');
	}

	public function index(){
		$this->list_booking();
	}


	public function list_booking(){
		$this->secure->isnot_login_be();
		$data= array(
				'result'	=> $this->model_booking->select_booking_join()->result(),
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

	public function validation_insert(){
		$this->secure->isnot_login_be();
			$config = array(
				array(
						'field'	=> 'block',
						'label'	=> 'Block',
						'rules'	=> 'required|trim',
						'errors' => array(
								'required'	=> '%s Tidak boleh kosong',

							)

					),

				array(
						'field'	=> 'konsumen_id',
						'label'	=> 'Nama Konsumen',
						'rules'	=> 'required|trim',
						'errors' => array(
								'required'	=> '%s Tidak boleh kosong',

							)

					),

				array(
						'field'	=> 'alamat',
						'label'	=> 'alamat',
						'rules'	=> 'required|trim',
						'errors' => array(
								'required'	=> '%s Tidak boleh kosong',

							)

					),



		      array(
						'field'	=> 'phone',
						'label'	=> 'Telepon',
						'rules'	=> 'required|trim',
						'errors' => array(
								'required'	=> '%s Tidak boleh kosong',

							)

					),

					array(
						'field'	=> 'pekerjaan',
						'label'	=> 'Pekerjaan',
						'rules'	=> 'required|trim',
						'errors' => array(
								'required'	=> '%s Tidak boleh kosong',

							)

					),




			);
		$this->form_validation->set_rules($config);
		if($this->form_validation->run() === FALSE){
			$this->create_booking();

		} else{
				$data_user = $this->model_booking->get_user($this->session->userdata('uname_admin'))->result();
				$data = array(
						'konsumen_fk_id'	=> $this->input->post('konsumen_id', TRUE),
						'us_fk_id'				=> $data_user[0]->us_id,
						'kavling_fk_id'		=> $this->input->post('block', TRUE),
						'tanggal'					=> $this->config->item("DEF_DATE"),
				);

				$data_kavaling =array('status'=>1);
				$this->model_kavling->update_kavling($this->input->post('block', TRUE),$data_kavaling);

			$this->model_booking->insert_booking($data);
			put_logs('Menambahkan data Booking','','kavling');
			$this->session->set_flashdata('success','Data berhasil datambahkan');
			redirect(base_url().'controldatabooking/create_booking');

		}

	}

	public function get_konsumen(){
		$id = $this->input->get('id');
		$array_data=array();
		$konsumen = $this->model_booking->get_konsumen_byid($id)->result();

		foreach ($konsumen as $row) {
			$dt['pekerjaan'] = $row->pekerjaan;
			$dt['alamat'] = $row->alamat_konsumen;
			$dt['no_tlp'] = $row->no_tlp;
			$dt['jenis_kelamin'] = $row->jenis_kelamin;
			$array_data = $dt;

		}


		$this->output
				 ->set_content_type('application/json')
				 ->set_output(json_encode($array_data));
	}
}
