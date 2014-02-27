<?php

	header("Content-type: text/html; charset=utf-8");
		
	$url = file_get_contents("http://news.cnblogs.com/n/digg.aspx?startdate=2014/2/1");


	$preg = "#<div class=\"content\">
                                        <h2 class=\"news_entry\">
                                            <a href=\"(.*)\" class=\"big skyblue\">
                                                (.*)</a>
                                        </h2>
#iUs";

	preg_match_all($preg,$url,$arr);

	//var_dump($arr);
	
	for($i=0;$i<count($arr[1]);$i++) {
		
		echo "http://news.cnblogs.com".$arr[1][$i].$arr[2][$i]."<br>";
	}
	