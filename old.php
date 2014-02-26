<?php

	header("Content-type: text/html; charset=utf-8");
	
	$url = file_get_contents("http://page.renren.com/601388182");

	
	$preg = "#</a>&nbsp;:&nbsp;(.*)</h3><div class=\"details ui-new\">(.*)<span class=\"duration\">(.*)</span><a class=\"share_new_ui\"#iUs";
	
	preg_match_all($preg,$url,$arr);

	$search = array("今天", "昨天");  //31分钟前
	$replace = array(date("Y-m-d"), date("Y-m-d",strtotime("-1 day")));
	
	var_dump($arr);
	//*
	for($i=0;$i<count($arr[1]);$i++) {
		$arr[3][$i] = iconv("utf-8","gbk",$arr[3][$i]); //gbk
		
		
		
		$pub_time = str_replace($search,$replace,$arr[3][$i]); //only support by gbk
		
		
		if(strlen($pub_time)<12){
			$pub_time = date("Y")."-".$pub_time;
		}
		
		//echo $pub_time."<br>";

		echo $i.$arr[1][$i].strtotime($pub_time)."<br>";
	}
	//*/