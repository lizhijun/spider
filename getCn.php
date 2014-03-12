<?php

	header("Content-type: text/html; charset=utf-8");
		
	$url = file_get_contents("http://www.cnbeta.com/top10.htm");


	$preg = "#</i>
                            <a href=\"(.*)\" target=\"_blank\">(.*)</a>
                            <p>
#iUs";

	preg_match_all($preg,$url,$arr);

	//var_dump($arr);
	
	
	for($i=10;$i<20;$i++) {
		
		echo "http://www.cnbeta.com".$arr[1][$i].$arr[2][$i]."<br>";
	}
	