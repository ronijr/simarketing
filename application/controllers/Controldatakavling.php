<?php defined('BASEPATH') OR exit ('No direct access script allowed');

class Controldatakavling extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_kavling');
	}

	public function index(){
		$this->list_kavling();
	}


	public function list_kavling(){
		$this->secure->isnot_login_be();
		$data= array(
				'result'	=> $this->model_kavling->select_kavling()->result(),
			);

		$this->template->backend('kavling/lihat_kavling',$data);
	}

	public function create_kavling(){
		$this->secure->isnot_login_be();
		$data=array();
		$this->template->addJs(base_url().'vendors/validator/validator.js');
		$this->template->backend('kavling/tambah_kavling',$data);
	}

		public function update_kavling($id=""){
		$this->secure->isnot_login_be();

 		if(! $this->model_kavling->check_id_kavling($id) or empty($id)){
 			$this->session->set_flashdata('warning','ID kavling tidak ditemukan.');
 			redirect(base_url('controldatakavling'));
 		} else {

 			$data = array(
 					'get_kavling'	=> $this->model_kavling->select_kavling_byid($id)->result(),
 				);
 			$this->template->addJs(base_url().'vendors/validator/validator.js');
 			$this->template->backend('kavling/ubah_kavling',$data);
 		}
	}

	public function delete_kavling($id=""){
		$this->secure->isnot_login_be();

 		if(! $this->model_kavling->check_id_kavling($id) or empty($id)){
 			$this->session->set_flashdata('warning','ID kavling tidak ditemukan.');
 			redirect(base_url('controldatakavling'));
 		} else {

 			$data_kavling = $this->model_kavling->select_kavling_byid($id)->result();
 			$this->model_kavling->delete_kavling($id);
 			$this->session->set_flashdata('success','Data kavling <b>'.$data_kavling[0]->block.'</b> berhasil dihapus.');
 			put_logs('Menghapus data kavling <strong>'.$data_kavling[0]->block.'</strong>','','kavling');
 			redirect(base_url('controldatakavling'));
 			

 		}
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
						'field'	=> 'no_rumah',
						'label'	=> 'No Rumah',
						'rules'	=> 'required|trim',
						'errors' => array(
								'required'	=> '%s Tidak boleh kosong',
								
							)

					),

				array(
						'field'	=> 'tipe',
						'label'	=> 'Tipe',
						'rules'	=> 'required|trim',
						'errors' => array(
								'required'	=> '%s Tidak boleh kosong',
								
							)

					),

			

		           array(
						'field'	=> 'keterangan',
						'label'	=> 'keterangan',
						'rules'	=> 'required|trim',
						'errors' => array(
								'required'	=> '%s Tidak boleh kosong',

							)

					),



			);
		$this->form_validation->set_rules($config);
		if($this->form_validation->run() === FALSE){
			$this->create_kavling();

		} else{
				$data = array(
						'block'			=> $this->input->post('block', TRUE),
						'no_rumah'				=> $this->input->post('no_rumah'),
						'tipe'				=> $this->input->post('tipe', TRUE),
						'keterangan'				=> $this->input->post('keterangan', TRUE),
						
						
				);
			
			$this->model_kavling->insert_kavling($data);
			put_logs('Menambahkan data kavling <strong>'.$this->input->post('block', TRUE).'</strong>','','kavling');
			$this->session->set_flashdata('success','Data berhasil datambahkan');
			redirect(base_url().'controldatakavling/create_kavling');
			
		}

	}


	public function validation_update($id=""){
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
						'field'	=> 'no_rumah',
						'label'	=> 'No Rumah',
						'rules'	=> 'required|trim',
						'errors' => array(
								'required'	=> '%s Tidak boleh kosong',
								
							)

					),

				array(
						'field'	=> 'tipe',
						'label'	=> 'Tipe',
						'rules'	=> 'required|trim',
						'errors' => array(
								'required'	=> '%s Tidak boleh kosong',
								
							)

					),

			

		           array(
						'field'	=> 'keterangan',
						'label'	=> 'keterangan',
						'rules'	=> 'required|trim',
						'errors' => array(
								'required'	=> '%s Tidak boleh kosong',

							)

					),



			);

		$this->form_validation->set_rules($config);
		if($this->form_validation->run() === FALSE){
			$this->update_kavling($id);

		} else{
			$data="";
					$data = array(
						'block'			=> $this->input->post('block', TRUE),
						'no_rumah'				=> $this->input->post('no_rumah'),
						'tipe'				=> $this->input->post('tipe', TRUE),
						'keterangan'				=> $this->input->post('keterangan', TRUE),
						
						
				);
			
			
			
			
			$this->model_kavling->update_kavling($id,$data);
			$this->session->set_flashdata('success','Data berhasil diubah');
			put_logs('Mengubah data kavling <strong>'.$this->input->post('block', TRUE).'</strong>','','kavling');
			redirect(base_url().'controldatakavling/update_kavling/'.$id);
		}
	}
}