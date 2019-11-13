<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('target_url'))
{
	function target_url(){
		$url = 'http://localhost/tembaga_resmi/index.php/';
		// $url = 'http://kmp.tanghosting.net/index.php/';
		return $url;
	}

	function target_url_cv($id){
		switch ($id) {
			case 1:
				$url = 'http://localhost/tembaga_cv/index.php/';
				break;

			case 2:
				$url = 'http://localhost/tembaga_cv2/index.php/';
				break;

			case 3:
				$url = 'http://localhost/tembaga_resmi/index.php/';
				break;

			case 4:
				$url = 'http://localhost/tembaga_resmi/index.php/';
				break;

			case 5:
				$url = 'http://localhost/tembaga_resmi/index.php/';
				break;

			case 6:
				$url = 'http://localhost/tembaga_resmi/index.php/';
				break;

			case 7:
				$url = 'http://localhost/tembaga_resmi/index.php/';
				break;

			case 8:
				$url = 'http://localhost/tembaga_resmi/index.php/';
				break;
			
			default:
				$url = '';
				break;
		}
		
		// return $url;

		// switch ($id) {
		// 	case 1:
		// 		$url = 'http://tsc.kmprakasa.com/index.php/';
		// 		break;

		// 	case 2:
		// 		$url = 'http://tlys.kmprakasa.com/index.php/';
		// 		break;

		// 	case 3:
		// 		$url = 'http://timi.kmprakasa.com/index.php/';
		// 		break;

		// 	case 4:
		// 		$url = 'http://tpkm.kmprakasa.com/index.php/';
		// 		break;

		// 	case 5:
		// 		$url = 'http://tscn.kmprakasa.com/index.php/';
		// 		break;

		// 	case 6:
		// 		$url = 'http://tamj.kmprakasa.com/index.php/';
		// 		break;

		// 	case 7:
		// 		$url = 'http://tkrw.kmprakasa.com/index.php/';
		// 		break;

		// 	case 8:
		// 		$url = 'http://tmtu.kmprakasa.com/index.php/';
		// 		break;
			
		// 	default:
		// 		$url = '';
		// 		break;
		// }
		
		return $url;
	}
}