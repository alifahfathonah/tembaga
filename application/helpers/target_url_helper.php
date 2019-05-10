<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('target_url'))
{
	function target_url(){
		$url = 'http://localhost/tembaga_resmi/index.php/';
		return $url;
	}

	function target_url_cv($id){
		switch ($id) {
			case 1:
				$url = 'http://localhost/tembaga_cv1/index.php/';
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
			
			// default:
			// 	# code...
			// 	break;
		}
		
		return $url;
	}
}