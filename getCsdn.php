<?php

	header("Content-type: text/html; charset=utf-8");
		
	$url = file_get_contents("http://geek.csdn.net/");
	$preg = "#<li (.*)<a href=\"(.*)\" (.*) target=\"_blank\">(.*)</a>#iUs";

	preg_match_all($preg,$url,$arr);

	//var_dump($arr);
	
	for($i=0;$i<count($arr[2]);$i++) {
		
		$domain = str_ireplace('www.', '', parse_url($arr[2][$i], PHP_URL_HOST));
		echo $arr[2][$i].$arr[4][$i].$domain."<br>";
	}
	
