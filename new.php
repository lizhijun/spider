<?php

	header("Content-type: text/html; charset=utf-8");
	
	
	$page_id = 601694006;
	
	
	function getFromRenrenNew($page_id){
		
		$url = file_get_contents("http://page.renren.com/".$page_id);

	
		$preg = "#<span class=\"status-detail\">(.*)<\/span>(.*)<span class=\"pulish-time\">(.*)</span>#iUs";
	
		preg_match_all($preg,$url,$arr);
	
		//var_dump($arr);
	
		for($i=0;$i<count($arr[1]);$i++) {
			
			echo $i.$arr[1][$i].strtotime($arr[3][$i])."<br>";
		}
	}


	

	getFromRenrenNew($page_id);
	