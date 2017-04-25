<?php
function convert_string_number($string){
	$len_of_string = strlen($string);
	$i = 0;
	$number = '';
	for($i=0; $i<$len_of_string; $i++){
		if($string[$i] != ".") $number .= $string[$i];
	}
	$number = str_replace(",",".",$number);
	doubleval($number);
	return $number;
}

function transfers_to($url){ 	header('Location: ' . $url); }

function format_number($number){
	return number_format($number, 0, ",", ".");
}

function format_decimal($number, $dec){
	return number_format($number, $dec, ",", ".");
}
function format_date($date){
	return date("d/m/Y",strtotime($date));
}

function show_gioitinh($gioitinh){
	if($gioitinh == 1) return 'Nam';
	else return 'Nữ';
}

function quote_smart($value){
    if(get_magic_quotes_gpc()){
		$value=stripcslashes($value);    
    }
	$value=addslashes($value);
	return $value;    
}

function convert_date_yyyy_mm_dd($str_date){
	$s = explode ("/", $str_date);
	return strtotime($s[2] . '-'. $s[1] . '-' . $s[0] . ' 00:00:00');
}
function convert_date_mm_yyyy($string_date){
	$s = explode ("/", $string_date);
	return strtotime($s[1] . '-'. $s[0] . '-01 00:00:00');
}

function convert_date_dd_mm_yyyy($string_date){
	if(strlen($string_date) >= 8){
		$s = explode ("/", $string_date);
		if($s[2] && $s[1] && $s[0]){
			return strtotime($s[2].'-'.$s[1].'-'.$s[0] . ' 00:00:00');
		} else {
			return '';
		}
	} else {
		return strtotime($string_date . '-01-01 00:00:00');
	}
}

function checkDateTime($data) {
    if (date('Y-m-d H:i:s', strtotime($data)) == $data) {
        return true;
    } else {
        return false;
    }
}
?>