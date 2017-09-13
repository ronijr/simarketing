<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Login Model Class
 */
class Model_auth extends CI_Model 
{
	private static $table_users = "users";

	public function active_user($username)
	{
		$this->db->where('us_uname', $username);
		$this->db->where('us_active', 'Y');
		$query = $this->db->get(self::$table_users);

		return ($query->num_rows() == 1) ? true: false;
	}

	public function username_check()
	{
		$username		= $this->input->post('username');
		$password		= $this->input->post('password');

		$this->db->where('us_uname', $username);
		$query = $this->db->get(self::$table_users);

		if ($query->num_rows() == 1)
		{
			foreach ($query->result() as $row)
			{
				$db_pass = $this->encrypt->decode($row->us_pass);
			}

			if ($password == $db_pass) return true; else return false;

		} else return false;
	}

	public function profile($username, $byid=FALSE)
	{
		($byid==FALSE) ? $this->db->where('us_uname', $username): $this->db->where('us_id', $username);
		return $this->db->get(self::$table_users);
	}

}
