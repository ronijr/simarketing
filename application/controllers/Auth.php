<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model("model_auth");
	
	}
	
	public function index()
	{
		$this->login();
	}

	public function login()
	{
		$this->secure->is_login_admin();

		$data = array(
			'results'		=> ''
		);

		$config = array(
			array(
				'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|trim|callback_username_check',
                'errors' => array(
                    'required' => '%s tidak boleh kosong.',
                )
			),
			array(
				'field' => 'password',
                'label' => 'Password',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s tidak boleh kosong.',
                )
			)
		);

		// Initialize
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() === FALSE) 
		{
			$this->load->view("login/login");

		} else
		{
			$username		= $this->input->post('username');
			$password		= $this->input->post('password');

			if ($this->model_auth->active_user($username))
			{
				$data_user = $this->model_auth->profile($username)->result();

				$data = array(
					'uname_admin' 		=> $data_user[0]->us_uname,
					'is_login_admin'	=> TRUE
				);

				$this->session->set_userdata($data);

				// insert log
				put_logs('Login', $username);

				$redirect = ($this->input->post('redirect')!=NULL) ? $this->input->post('redirect'): base_url('dashboard');

				redirect($redirect);

				// redirect(base_url('dsb0605'));

			} else
			{
				// insert log
				put_logs('Login: '.$username.' (Akun belum aktif)', $username);

				$this->session->set_flashdata('login_error', 'Akun belum aktif.');
                
                redirect(base_url('auth'));
			}
		}
	}

	// callback method
	public function username_check()
	{
		if ($this->model_auth->username_check())
		{
			return true;

		} else
		{
			// set error
			$this->form_validation->set_message('username_check', 'Username/Password Salah!');
			
			// insert log
			put_logs('Login: Username atau Password Salah.', $this->input->post('username'));

			return false;
		}
	}

	public function logout()
	{
		// Insert Log
		put_logs('Logout');

		// $this->session->sess_destroy();
		unset($_SESSION['is_login_admin']);
		unset($_SESSION['uname_admin']);

		redirect(base_url('auth'));
	}
}