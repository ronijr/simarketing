<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Widget Class
 *
 * @author      Cecep Aprilianto
 * @copyright	Copyright (c) 2017
 * @link        http://sibatur.com
 */
class Widget {

	protected $CI;

	public function __construct()
	{
		// Assign the CodeIgniter super-object
		$this->CI =& get_instance();

		// LOAD LIBRARY

	}

	public function admin_level($level='')
	{
		switch ($level) {
			case '1': return 'Superadmin'; break;
			case '2': return 'Superuser'; break;
			case '3': return 'User'; break;
			default: return 'Unavaiable'; break;
		}
	}


	public function number_id($number=1000000, $jumlah_desimal="0")
    {
    	// $jumlah_desimal ="0";
		$pemisah_desimal =",";
		$pemisah_ribuan =".";

    	return number_format($number, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan);
    }

    public function next_time($date, $time, $opt="ALL")
    {
        $date_exp           = explode("-", $date);
        $time_exp           = explode(":", $time);

        /*tentukan waktu tujuan*/
        $waktu_tujuan       = mktime($time_exp[0], $time_exp[1], $time_exp[2], $date_exp[1], $date_exp[2], $date_exp[0]);
        /*$waktu_tujuan         = mktime(11,0,0,2,30,2016);*/

        /*tentukan waktu saat ini*/
        $waktu_sekarang     = mktime(date('H'), date('i'), date('s'), date('m'), date('d'), date('Y'));

        /*hitung selisih kedua waktu*/
        $selisih_waktu      = $waktu_tujuan - $waktu_sekarang;

        /*Untuk menghitung jumlah dalam satuan hari:*/
        $jumlah_hari        = floor($selisih_waktu/86400);

        /*Untuk menghitung jumlah dalam satuan jam:*/
        $sisa               = $selisih_waktu % 86400;
        $jumlah_jam         = floor($sisa/3600);

        /*Untuk menghitung jumlah dalam satuan menit:*/
        $sisa               = $sisa % 3600;
        $jumlah_menit       = floor($sisa/60);

        /*Untuk menghitung jumlah dalam satuan detik:*/
        $sisa               = $sisa % 60;
        $jumlah_detik       = floor($sisa/1);

        if ($opt=="ALL") return $jumlah_hari.' Hari '.$jumlah_jam.' Jam '.$jumlah_menit.' Menit '.$jumlah_detik.' Detik lagi';
        else if ($opt=="days") return $jumlah_hari.' Hari lagi';
        else if ($opt=="hours") return $jumlah_jam.' Jam lagi';
        else if ($opt=="minutes") return $jumlah_menit.' Menit lagi';
        else if ($opt=="seconds") return $jumlah_detik.' Detik lagi';
        else return 'Undefined';

        /*echo "Tanggal saat ini: ".date(“d-m-Y H:i:s”)."<br>";*/
        /*echo "Tanggal pelaksanaan: “.date(“20-9-2012 08:00:00″).”<br>”;*/
        /*echo "Waktu menjelang pelaksanaan tinggal: “.$jumlah_hari.” hari “.$jumlah_jam.” jam “.$jumlah_menit.” menit “.$jumlah_detik.” detik lagi</b>”;*/
    }

     public function selisih_hari($date='')
    {
        $now        = explode("-", date('Y-m-d'));
        $tgl        = explode("-", $date);

        $date1      = GregorianToJD($now[1], $now[2], $now[0]);
        $date2      = GregorianToJD($tgl[1], $tgl[2], $tgl[0]);

        $selisih    = $date2 - $date1;
        /*$jumlah_hari= floor($selisih/86400);*/

        if (($date2 < $date1)||$selisih==0) {
            $show   = ($selisih==0) ? '': abs($selisih).' Hari yang lalu';
        } else {
            $show   = $selisih.' Hari lagi';
        }

        return $show;
    }

    public function timeago($date, $shortdate=FALSE)
    {
        $tanggalasli = $date;
    	$date = strtotime($date);

    	$stf = 0;

		$cur_time = time();
		
		$diff = $cur_time - $date;
		
		$phrase = array('Detik','Menit','Jam','Hari','Minggu','Bulan','Tahun','Dekade');
		
		$length = array(1,60,3600,86400,604800,2630880,31570560,315705600);
		
		for($i =sizeof($length)-1; ($i >=0)&&(($no =  $diff/$length[$i])<=1); $i--); if($i < 0) $i=0; $_time = $cur_time  -($diff%$length[$i]);
		$no = floor($no); if($no <> 1) $phrase[$i] .=''; $value=($phrase[$i]=="Bulan") ? $this->waktu_id2($tanggalasli): sprintf("%d %s ",$no,$phrase[$i]);
		
		if(($stf == 1)&&($i >= 1)&&(($cur_time-$_time) > 0)) $value .= timeago($_time);
		
		return ($shortdate==FALSE) ? $value.' yang lalu ': $value;
    }

    public function date_id($fulldateYmd)
    {
        $ubah = gmdate($fulldateYmd, time()+60*60*8);

        $pecah = explode("-",$ubah);

        $tanggal = $pecah[2];

        $bulan = $this->bulan($pecah[1]);

        $tahun = $pecah[0];

        return $tanggal.' '.$bulan.' '.$tahun;
    }

    public function nama_hari($tanggal)
    {
        $ubah = gmdate($tanggal, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tgl = $pecah[2];
        $bln = $pecah[1];
        $thn = $pecah[0];

        $nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
        $nama_hari = "";
        if($nama=="Sunday") {$nama_hari="Minggu";}
        else if($nama=="Monday") {$nama_hari="Senin";}
        else if($nama=="Tuesday") {$nama_hari="Selasa";}
        else if($nama=="Wednesday") {$nama_hari="Rabu";}
        else if($nama=="Thursday") {$nama_hari="Kamis";}
        else if($nama=="Friday") {$nama_hari="Jumat";}
        else if($nama=="Saturday") {$nama_hari="Sabtu";}
        return $nama_hari;
    }

    public function month_id($month)
    {
        return $this->bulan($month);
    }

    public function waktu_id($date_time)
    {
        $exp        = explode(" ", $date_time);

        $showtime   = date('H:i', strtotime($exp[1]));

        $showdate   = $this->nama_hari($exp[0]).', '.$this->date_id($exp[0]).' Pkl. '.$showtime.' WIB';
        
        return $showdate;
    }

    public function jam_id($date_time)
    {
        $exp        = explode(" ", $date_time);

        $showtime   = date('H:i', strtotime($exp[1]));

        return $showtime;
    }

    public function waktu_id2($date_time)
    {
        $exp        = explode(" ", $date_time);

        $showtime   = date('H:i', strtotime($exp[1]));

        $showdate   = $this->date_id($exp[0]);
        
        return $showdate;
    }

    public function bulan($bulan)
    {
        switch ($bulan)
        {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }
}
