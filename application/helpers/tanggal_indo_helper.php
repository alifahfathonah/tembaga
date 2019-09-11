<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('tanggal_indo'))
{
	function tanggal_indo($tanggal){
		$bulan = array (1 =>   'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
				);
		if($tanggal != 0){
		$split = explode('-', $tanggal);
		return $split[2] . '-' . $bulan[ (int)$split[1] ] . '-' . $split[0];
		}else{
		return '-';
		}
	}

	function bulan_indo($bulan) {
		switch ($bulan) {
			case '01':
				$bulan = 'Januari';
				break;

			case '02':
				$bulan = 'Februari';
				break;

			case '03':
				$bulan = 'Maret';
				break;

			case '04':
				$bulan = 'April';
				break;

			case '05':
				$bulan = 'Mei';
				break;

			case '06':
				$bulan = 'Juni';
				break;
				
			case '07':
				$bulan = 'Juli';
				break;

			case '08':
				$bulan = 'Agustus';
				break;

			case '09':
				$bulan = 'September';
				break;

			case '10':
				$bulan = 'Oktober';
				break;
				
			case '11':
				$bulan = 'November';
				break;
			
			default:
				$bulan = 'Desember';
				break;
		}

		return $bulan;
	}
}