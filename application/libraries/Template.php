<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Template Class
 *
 * @author      Cecep Aprilianto
 * @copyright	Copyright (c) 2017
 * @link        http://sibatur.com
 */
class Template {

	protected $CI;
	private $css;
	private $js;

	public function __construct()
	{
		// Assign the CodeIgniter super-object
		$this->CI 	=& get_instance();
		$this->css 	= array();
		$this->js 	= array();

		$this->CI->load->library('parser');

		$this->CI->load->model("model_auth");
		// $this->CI->load->model("md_menu");
	}

	public function addCss($path){
		$this->css[] = $path;
	}

	public function addJs($path){
		$this->js[] = $path;
	}

	/**
	 * TEMPLATE BACKEND
	 *
	 * Untuk memparsing view yang di split / multiple view
	 *
	 * @param       string 		$template 		direktori untuk me-loading view file, bisa juga di sub-direktori
	 * @param       array 		$data 	NULL 	memasukan data dinamis ke view berupa array (bisa juga object)
	 * @return      mixing
	 */
	public function backend($template, $data=NULL)
	{
		$page               		= $template;
		$exp_page           	    = explode('/', $page);
		$data['site_name_parent']   = $exp_page[0];
		$data['site_name_child']    = $exp_page[1];
		$profile_user 				= $this->CI->model_auth->profile($this->CI->session->userdata('uname_admin'));
        $data['admin']				= $profile_user->result();
        // $data['otoritas_menu']		= $this->CI->md_menu->menu_backend($profile_user->result_array()[0]['us_id'])->result();

        if ($data['admin'][0]->us_active=="N") {
        	redirect(base_url('auth/logout'));
        }

        $data['js_source']			= $this->js;
        $data['css_source']			= $this->css;

		/**
		 * ---------------------------------------------------------------
		 * RETURN VIEW AS DATA
		 * ---------------------------------------------------------------
		 *
		 * Mengembalikan view sebagai DATA
		 *
		 * Parameter ke-3 di set TRUE (boolean) akan mengembalikan data sebagai string
		 * yang di parsing dan akan di tampilkan di browser
		 */

		$data['header']     = $this->CI->load->view("template/header", $data, TRUE);

		$data['menu']       = $this->CI->load->view("template/menu", $data, TRUE);

		$data['top_nav']       = $this->CI->load->view("template/top_nav", $data, TRUE);

		$data['content']    = $this->CI->load->view($template, $data, TRUE);

		$data['footer']     = $this->CI->load->view("template/footer", $data, TRUE);

		// parsing array(header,menu,content,footer) ke sebuah file menggunakan library parser CI
		$this->CI->parser->parse("template/render", $data);
	}
}
