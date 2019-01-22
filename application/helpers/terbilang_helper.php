<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('number_to_words'))
{
	function number_to_words($number)
	{
		$before_comma = trim(to_word($number));
		$after_comma = trim(comma($number));
		return ucwords($results = $before_comma." RUPIAH");
	}

	function to_word($number)
	{
		$words = "";
		$arr_number = array(
		"",
		"SATU",
		"DUA",
		"TIGA",
		"EMPAT",
		"LIMA",
		"ENAM",
		"TUJUH",
		"DELAPAN",
		"SEMBILAN",
		"SEPULUH",
		"SEBELAS");

		if($number<12)
		{
			$words = " ".$arr_number[$number];
		}
		else if($number<20)
		{
			$words = to_word($number-10)." BELAS";
		}
		else if($number<100)
		{
			$words = to_word($number/10)." PULUH".to_word($number%10);
		}
		else if($number<200)
		{
			$words = " SERATUS".to_word($number-100);
		}
		else if($number<1000)
		{
			$words = to_word($number/100)." RATUS".to_word($number%100);
		}
		else if($number<2000)
		{
			$words = " SERIBU".to_word($number-1000);
		}
		else if($number<1000000)
		{
			$words = to_word($number/1000)." RIBU".to_word($number%1000);
		}
		else if($number<1000000000)
		{
			$words = to_word($number/1000000)." JUTA".to_word($number%1000000);
		} 
		else if ($number<1000000000000) {
			$words = to_word($number/1000000000). " MILYAR".to_word(fmod($number,1000000000));
		} 
		else if ($number<1000000000000000) {
			$words = to_word($number/1000000000000). " TRILYUN".to_word(fmod($number,1000000000000));
		} 
		else
		{
			$words = "undefined";
		}
		return $words;
	}

	function comma($number)
	{
		$after_comma = stristr($number,',');
		$arr_number = array(
		"nol",
		"satu",
		"dua",
		"tiga",
		"empat",
		"lima",
		"enam",
		"tujuh",
		"delapan",
		"sembilan");

		$results = "";
		$length = strlen($after_comma);
		$i = 1;
		while($i<$length)
		{
			$get = substr($after_comma,$i,1);
			$results .= " ".$arr_number[$get];
			$i++;
		}
		return $results;
	}
}