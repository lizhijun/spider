<?php

	header("Content-type: text/html; charset=utf-8");
		
	$url = file_get_contents("http://wemedia.so.com/");


	$preg = "#<p class=\"title\"><a href=\"(.*)\" target=\"_blank\" title=\"(.*)\">#iUs";

	preg_match_all($preg,$url,$arr);

	//var_dump($arr);
	
	for($i=1;$i<21;$i++) {
		
		echo $arr[1][$i].$arr[2][$i]."<br>";
	}