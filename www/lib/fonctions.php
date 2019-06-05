<?php

function random($nombre) {
	$string = "";
	$chaine = "abcdefghijklmnpqrstuvwxy1234567890";
	srand((double)microtime()*1000000);
	for($i=0; $i<$nombre; $i++)
		$string .= $chaine[rand()%strlen($chaine)];
	return $string;
}

// Formater URL pour le référencement
function formater_url($url){
	$url = utf8_decode($url);
	$url = strtolower(strtr($url, utf8_decode('ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ()[]\'"~$&%*@ç!?;,:/\^¨€{}<>|+.- '),  'aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn    --      c  ---    e       --'));
	$url = str_replace(' ', '', $url);
	$url = str_replace('---', '-', $url);
	$url = str_replace('--', '-', $url);
	$url = trim($url,'-');
	return $url;
}

function _substr($str, $length, $minword = 3){
	$sub = '';
	$len = 0;
	foreach (explode(' ', $str) as $word){
		$part = (($sub != '') ? ' ' : '') . $word;
		$sub .= $part;
		$len += strlen($part);
		if (strlen($word) > $minword && strlen($sub) >= $length){
			break;
		}
	}
	return $sub . (($len < strlen($str)) ? '...' : '');
}