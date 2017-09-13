<?php defined('BASEPATH') OR exit ('No direct access script allowed');

class Controldatakonsumen extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_konsumen');
	}

	public function index(){
		$this->list_konsumen();
	}


	public function list_konsumen(){
		$this->secure->isnot_login_be();
			$data_user = $this->model_konsumen->get_user($this->session->userdata('uname_admin'))->result();
			$data= array(
				'result'	=> $this->model_konsumen->select_konsumen($data_user[0]->us_id,$data_user[0]->us_level)->result(),
			);
		$this->template->backend('konsumen/lihat_konsumen',$data);
	}

	public function create_konsumen(){
		$this->secure->isnot_login_be();
		$data=array();
		$this->template->addJs(base_url().'vendors/validator/validator.js');
		$this->template->backend('konsumen/tambah_konsumen',$data);
	}

	public function update_konsumen($id=""){
		$this->secure->isnot_login_be();

 		if(! $this->model_konsumen->check_id_konsumen($id) or empty($id)){
 			$this->session->set_flashdata('warning','ID konsumen tidak ditemukan.');
 			redirect(base_url('controldatakonsumen'));
 		} else {

 			$data = array(
 					'get_konsumen'	=> $this->model_konsumen->select_konsumen_byid($id)->result(),
 				);
 			$this->template->addJs(base_url().'vendors/validator/validator.js');
 			$this->template->backend('konsumen/ubah_konsumen',$data);
 		}
	}

	public function delete_konsumen($id=""){
		$this->secure->isnot_login_be();

 		if(! $this->model_konsumen->check_id_konsumen($id) or empty($id)){
 			$this->session->set_flashdata('warning','ID konsumen tidak ditemukan.');
 			redirect(base_url('controldatakonsumen'));
 		} else {

 			$data_konsumen = $this->model_konsumen->select_konsumen_byid($id)->result();
 			$this->model_konsumen->delete_konsumen($id);
 			$this->session->set_flashdata('success','Data konsumen <b>'.$data_konsumen[0]->nama_konsumen.'</b> berhasil dihapus.');
 			put_logs('Menghapus data konsumen <strong>'.$data_konsumen[0]->nama_konsumen.'</strong>','','konsumen');
 			redirect(base_url('controldatakonsumen'));


 		}
	}

	public function validation_insert(){
		$this->secure->isnot_login_be();
			$config = array(
				array(
						'field'	=> 'nama',
						'label'	=> 'Nama',
						'rules'	=> 'required|trim',
						'errors' => array(
								'required'	=> '%s Tidak boleh kosong',

							)

					),

				array(
						'field'	=> 'jk',
						'label'	=> 'Jenis kelamin',
						'rules'	=> 'required|trim',
						'errors' => array(
								'required'	=> '%s Tidak boleh kosong',

							)

					),

				array(
						'field'	=> 'alamat',
						'label'	=> 'Alamat',
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
			$this->create_konsumen();

		} else{
				$data_user = $this->model_konsumen->get_user($this->session->userdata('uname_admin'))->result();
				$data = array(
						'nama_konsumen'			=> $this->input->post('nama', TRUE),
						'pekerjaan'				=> $this->input->post('pekerjaan'),
						'no_tlp'				=> $this->input->post('phone', TRUE),
						'alamat_konsumen'				=> $this->input->post('alamat', TRUE),
						'jenis_kelamin'			=> $this->input->post('jk'),
						'us_fk_id'			=> $data_user[0]->us_id,

				);

			$this->model_konsumen->insert_konsumen($data);
			put_logs('Menambahkan data konsumen <strong>'.$this->input->post('nama', TRUE).'</strong>','','konsumen');
			$this->session->set_flashdata('success','Data berhasil datambahkan');
			redirect(base_url().'controldatakonsumen/create_konsumen');

		}

	}


	public function validation_update($id=""){
			$this->secure->isnot_login_be();
			$config = array(
				array(
						'field'	=> 'nama',
						'label'	=> 'Nama',
						'rules'	=> 'required|trim',
						'errors' => array(
								'required'	=> '%s Tidak boleh kosong',

							)

					),

				array(
						'field'	=> 'jk',
						'label'	=> 'Jenis kelamin',
						'rules'	=> 'required|trim',
						'errors' => array(
								'required'	=> '%s Tidak boleh kosong',

							)

					),

				array(
						'field'	=> 'alamat',
						'label'	=> 'Alamat',
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
			$this->update_konsumen($id);

		} else{


				$data = array(
						'nama_konsumen'			=> $this->input->post('nama', TRUE),
						'pekerjaan'				=> $this->input->post('pekerjaan'),
						'no_tlp'				=> $this->input->post('phone', TRUE),
						'alamat_konsumen'				=> $this->input->post('alamat', TRUE),
						'jenis_kelamin'			=> $this->input->post('jk'),


				);



			$this->model_konsumen->update_konsumen($id,$data);
			$this->session->set_flashdata('success','Data berhasil diubah');
			put_logs('Mengubah data konsumen <strong>'.$this->input->post('nama', TRUE).'</strong>','','konsumen');
			redirect(base_url().'controldatakonsumen/update_konsumen/'.$id);
		}
	}



}
