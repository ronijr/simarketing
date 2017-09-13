<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Secure Class
 *
 * @author      Cecep Aprilianto
 * @copyright	Copyright (c) 2017
 * @link        http://sibatur.com
 */
class Secure {

	protected $CI;

	public function __construct()
	{
		// Assign the CodeIgniter super-object
		$this->CI =& get_instance();

		// $this->CI->load->model('md_users');
		// $this->CI->load->model('md_menu');
	}

	// public function is_akses_menu($mm_id='')
	// {
	// 	// Profile User
 //        $user   = $this->CI->md_users->profile($this->CI->session->userdata('uname_admin'))->result();
 //        // Otoritas Menu
 //        $om     = $this->CI->md_menu->otoritas_menu($user[0]->us_id, $mm_id)->result();

 //        if($om[0]->is_view != "Y") redirect(base_url());
	// }

	// public function is_superadmin()
 //    {
 //        $profile  = $this->CI->md_users->profile($this->CI->session->userdata('uname_admin'))->result();
        
 //        if ($profile[0]->us_level!=1 )
 //        {
 //            redirect(base_url());
 //        }
 //    }

 //    public function isnot_user()
 //    {
 //        $profile  = $this->CI->md_users->profile($this->CI->session->userdata('uname_admin'))->result();
        
 //        // bisa juga !=1 && !=2
 //        if ($profile[0]->us_level==3) 
 //        {
 //            redirect(base_url());
 //        }
 //    }

	public function is_login_admin()
	{
		if ($this->CI->session->userdata('is_login_admin'))
		{
			redirect(base_url('dashboard'));
		}
	}

	public function isnot_login_be()
    {
    	if (! $this->CI->session->userdata('is_login_admin'))
		{
            redirect(base_url('auth'));
        }
    }
}
