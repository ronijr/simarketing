<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('put_logs'))
{
	function put_logs($content="", $user="", $table_name="")
	{
		$ci =& get_instance();

		/*BROWSER*/
		if ($ci->agent->is_browser())
		    $agent = 'Browser '.$ci->agent->browser().'.<br/>Version '.$ci->agent->version();
		elseif ($ci->agent->is_robot())
		    $agent = $ci->agent->robot();
		elseif ($ci->agent->is_mobile())
		    $agent = $ci->agent->mobile();
		else
		    $agent = 'Unidentified User Agent';

		/*CONTENT*/
		$content = ($content=="") ? "none": $content;

		/*DATE TIME*/
		$log_datetime = date('Y-m-d H:i:s');

		/*IP ADDRESS*/
		$log_remote_addr = $ci->input->ip_address();

		/*AGENT*/
		$log_user_agent = $agent;

		/*AGENT STRING*/
		$log_user_agent_string = $ci->agent->agent_string();

		/*PLATFORM*/
		$log_platform = $ci->agent->platform();

		/*TABLE AFFECTED*/
		$log_table_affected = ($table_name=="") ? 'n/a': $table_name;

		/*USERNAME*/
		$user = ($user=="") ? $ci->session->userdata('uname_admin'): $user;
		$log_admin_uname = $user;

		// WRITE LOG
		$write_log = $content.'*'.$log_datetime.'*'.$log_remote_addr.'*'.$log_user_agent.'('.$log_user_agent_string.')*'.$log_platform.'*'.$log_table_affected.'*'.$log_admin_uname."\n";

		/*FILE*/
		$file = LOG_PATH_FILE;

		$current = file_get_contents($file);

		file_put_contents($file, $write_log, FILE_APPEND | LOCK_EX);
	}
}

if ( ! function_exists('get_logs'))
{
	function get_logs()
	{
		/*FILE*/
		$file = LOG_PATH_FILE;

		$current = file_get_contents($file);

		return $current;
	}
}