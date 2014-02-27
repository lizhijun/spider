<?php

	header("Content-type: text/html; charset=utf-8");
		
	$url = file_get_contents("http://geek.csdn.net/");


	//$preg = "#onclick=\"update_click_num((.*));\" target=\"_blank\">(.*)</a>#iUs"; //title

	$preg = "#<h4 id=\"title_(.*)\">
																					<a href=\"(.*)\" (.*) target=\"_blank\">(.*)</h4>#iUs"; //url

	preg_match_all($preg,$url,$arr);

	var_dump($arr);
	
	for($i=0;$i<count($arr[1]);$i++) {
		
		echo $arr[1][$i].$arr[3][$i]."<br>";
	}
	