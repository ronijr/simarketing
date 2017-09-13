<?php defined('BASEPATH') OR exit ('No direct access script allowed');

class Controldatamarketing extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_marketing');
	}

	public function index(){
		$this->list_marketing();
	}


	public function list_marketing(){
		$this->secure->isnot_login_be();
		$data= array(
				'result'	=> $this->model_marketing->select_marketing()->result(),
			);
		$this->template->backend('marketing/lihat_marketing',$data);
	}

	public function create_marketing(){
		$this->secure->isnot_login_be();
		$data=array();
		$this->template->addJs(base_url().'vendors/validator/validator.js');
		$this->template->backend('marketing/tambah_marketing',$data);
	}

	public function update_marketing($id=""){
		$this->secure->isnot_login_be();

 		if(! $this->model_marketing->check_id_marketing($id) or empty($id)){
 			$this->session->set_flashdata('warning','ID marketing tidak ditemukan.');
 			redirect(base_url('controldatamarketing'));
 		} else {

 			$data = array(
 					'get_marketing'	=> $this->model_marketing->select_marketing_byid($id)->result(),
 				);
 			$this->template->addJs(base_url().'vendors/validator/validator.js');
 			$this->template->backend('marketing/ubah_marketing',$data);
 		}
	}

	public function delete_marketing($id=""){
		$this->secure->isnot_login_be();

 		if(! $this->model_marketing->check_id_marketing($id) or empty($id)){
 			$this->session->set_flashdata('warning','ID Marketing tidak ditemukan.');
 			redirect(base_url('controldatamarketing'));
 		} else {

 			$data_marketing = $this->model_marketing->select_marketing_byid($id)->result();
 			$this->model_marketing->delete_marketing($id);
 			$this->session->set_flashdata('success','Data marketing <b>'.$data_marketing[0]->us_uname.'</b> berhasil dihapus.');
 			put_logs('Menghapus data marketing <strong>'.$data_marketing[0]->us_uname.'</strong>','','marketing');
 			redirect(base_url('controldatamarketing'));
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
						'field'	=> 'email',
						'label'	=> 'Email',
						'rules'	=> 'required|trim',
						'errors' => array(
								'required'	=> '%s Tidak boleh kosong',
								
							)

					),

				array(
						'field'	=> 'username',
						'label'	=> 'Username',
   						'rules' => 'required|trim|alpha_dash|min_length[5]|max_length[15]|is_unique[users.us_uname]',
		                'errors' => array(
		                    'required' 		=> '%s Tidak boleh kosong.',
		                    'alpha_dash'	=> '%s Hanya boleh huruf-angka, underscores(_), dan dashes(-).',
		                    'min_length'	=> '%s Minimal 5 karakter.',
		                    'max_length'	=> '%s Maksimal 15 karakter.',
		                    'is_unique'		=> '%s Sudah ada yang punya.'

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
						'field' => 'password',
		                'label' => 'Password',
		                'rules' => 'required|trim|min_length[5]',
		                'errors' => array(
		                    'required' 		=> '%s tidak boleh kosong.',
		                    'min_length'	=> '%s minimal 5 karakter.'
		                )
					),

		           array(
						'field' => 'password2',
		                'label' => 'Ulangi Password',
		                'rules' => 'required|trim|min_length[5]',
		                'errors' => array(
		                    'required' 		=> '%s tidak boleh kosong.',
		                    'min_length'	=> '%s minimal 5 karakter.'
		                )
					),

			);

		$this->form_validation->set_rules($config);
		if($this->form_validation->run() === FALSE){
			$this->create_marketing();

		} else{
			$data = array(
						'us_uname'				=> $this->input->post('username', TRUE),
						'us_pass'				=> $this->encrypt->encode($this->input->post('password')),
						'us_name'				=> $this->input->post('nama', TRUE),
						'us_email'				=> $this->input->post('email', TRUE),
						'us_level'				=> 2,
						'us_date_create'		=> $this->config->item('DEF_DATE'),
						'jenis_kelamin'			=> $this->input->post('jk'),
						'no_hp'					=> $this->input->post('phone'),
						'alamat'				=> $this->input->post('alamat')
				);
			$this->model_marketing->insert_marketing($data);
			$this->session->set_flashdata('success','Data berhasil datambahkan');
			put_logs('Menambahkan data marketing <strong>'.$this->input->post('nama', TRUE).'</strong>','','marketing');
			redirect(base_url().'controldatamarketing/create_marketing');
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
						'field'	=> 'email',
						'label'	=> 'Email',
						'rules'	=> 'required|trim',
						'errors' => array(
								'required'	=> '%s Tidak boleh kosong',
								
							)

					),

				array(
						'field'	=> 'username',
						'label'	=> 'Username',
   						'rules' => 'required|trim|alpha_dash|min_length[5]|max_length[15]',
		                'errors' => array(
		                    'required' 		=> '%s Tidak boleh kosong.',
		                    'alpha_dash'	=> '%s Hanya boleh huruf-angka, underscores(_), dan dashes(-).',
		                    'min_length'	=> '%s Minimal 5 karakter.',
		                    'max_length'	=> '%s Maksimal 15 karakter.',
		                    
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
						'field' => 'password',
		                'label' => 'Password',
		                'rules' => 'trim|min_length[5]',
		                'errors' => array(
		            
		                    'min_length'	=> '%s minimal 5 karakter.'
		                )
					),

		           array(
						'field' => 'password2',
		                'label' => 'Ulangi Password',
		                'rules' => 'trim|min_length[5]|matches[password]',
		                'errors' => array(
		                    'matches'		=> 'Password tidak sama',
		                    'min_length'	=> '%s minimal 5 karakter.'
		                )
					),

			);

		$this->form_validation->set_rules($config);
		if($this->form_validation->run() === FALSE){
			$this->update_marketing($id);

		} else{
			$data="";
			if($this->input->post('password') == ""){
				$data = array(
						'us_uname'				=> $this->input->post('username', TRUE),
						'us_name'				=> $this->input->post('nama', TRUE),
						'us_email'				=> $this->input->post('email', TRUE),
						'us_level'				=> 2,
						'us_date_create'		=> $this->config->item('DEF_DATE'),
						'jenis_kelamin'			=> $this->input->post('jk'),
						'no_hp'					=> $this->input->post('phone'),
						'alamat'				=> $this->input->post('alamat')
				);
			} else{
				$data = array(
						'us_uname'				=> $this->input->post('username', TRUE),
						'us_pass'				=> $this->encrypt->encode($this->input->post('password')),
						'us_name'				=> $this->input->post('nama', TRUE),
						'us_email'				=> $this->input->post('email', TRUE),
						'us_level'				=> 2,
						'us_date_create'		=> $this->config->item('DEF_DATE'),
						'jenis_kelamin'			=> $this->input->post('jk'),
						'no_hp'					=> $this->input->post('phone'),
						'alamat'				=> $this->input->post('alamat')
				);
			}
			
			$this->model_marketing->update_marketing($id,$data);
			$this->session->set_flashdata('success','Data berhasil diubah');
			put_logs('Mengubah data marketing <strong>'.$this->input->post('nama', TRUE).'</strong>','','marketing');
			redirect(base_url().'controldatamarketing/update_marketing/'.$id);
		}
	}
}