<?php defined('BASEPATH') OR exit ('No direct access script allowed');

class Controllogaktifitas extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->log();
	}


	public function log(){
			
			$data = array(
				'title'		=> 'Log Aktifitas',

				'url_datatable_log'	=> $this->data_log(),
			);

			$this->template->backend("logaktifitas/logaktifitas", $data);
		}

		public function data_log()
		{
			$array_data = array();
			$file = LOG_PATH_FILE;

			$current = file_get_contents($file);

			$xlinelog = explode("\n", $current);
			$xlinelog = array_filter($xlinelog);
			$count = count($xlinelog);
			// $i = 1;
			foreach ($xlinelog as $key => $value) 
			{
				$row = explode("*", $value);

				$aktifitas 	= (array_key_exists(0, $row)) ? $row[0]: '';
				$tanggal 	= (array_key_exists(1, $row)) ? $row[1]: '';
				$ip 		= (array_key_exists(2, $row)) ? $row[2]: '';
				$device 	= (array_key_exists(4, $row)) ? $row[4]: '';
				$table 		= (array_key_exists(5, $row)) ? $row[5]: '';
				$admin 		= (array_key_exists(6, $row)) ? $row[6]: '';


				$dt['aktifitas']	= $aktifitas;
				$dt['tanggal']		= $tanggal;
				$dt['ip']			= $ip;
				$dt['device']		= $device;
				$dt['table']		= $table;
				$dt['admin']		= $admin;
				$array_data[] 		= $dt;

				// $i++;
			}

			 $response = array("data" => $array_data);
			 return $response;

			
		}
}