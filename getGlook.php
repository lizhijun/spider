<?php

	header("Content-type: text/html; charset=utf-8");
		
	$url = file_get_contents("http://www.gamelook.com.cn/");


	$preg = "#</span>
			<a href=\"(.*)\" target=\"_blank\" title=\"(.*)\" rel=\"bookmark\">(.*)</a>
		</li>
#iUs";

	preg_match_all($preg,$url,$arr);

	//var_dump($arr);

	for($i=0;$i<count($arr[1]);$i++) {
		
		echo $arr[1][$i].$arr[3][$i]."<br>";
	}
	