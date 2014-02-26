<?php

	header("Content-type: text/html; charset=utf-8");
	
	include "conn.php";

    $sql = "SELECT sid,renren_page_id,is_new FROM school";
	
	$result = mysql_query($sql);
	  
	  
	while($row = @mysql_fetch_array($result)){

		//echo $row['sid'].$row['renren_page_id']."<br>"; 

		
		if($row['is_new']){
			
			$sql = grapFromRenrenNew($row['renren_page_id'],$row['sid']);

			$result = mysql_query($sql);
			/*
			if($result) {
				//=>log
			} else{
				//=>log
			}*/
		} else{
			
			$sql = grapFromRenrenOld($row['renren_page_id'],$row['sid']);

			$result = mysql_query($sql);
		}
	}
	
	//$page_id = 601694006;
	function grapFromRenrenNew($page_id,$sid){
		
		$url = file_get_contents("http://page.renren.com/".$page_id);
		$preg = "#<span class=\"status-detail\">(.*)<\/span>(.*)<span class=\"pulish-time\">(.*)</span>#iUs";
		preg_match_all($preg,$url,$arr);
		//var_dump($arr);
		
		$values_str = "";
		for($i=0;$i<count($arr[1]);$i++) {
			
			//echo $i.$arr[1][$i].strtotime($arr[3][$i])."<br>";
			$values_str .=  "(NULL,".$sid.",".$arr[1][$i].",".strtotime($arr[3][$i])."),";
		}

		return $sql_str = "INSERT IGNORE INTO content VALUES".$values_str;
	}
	
	function grapFromRenrenOld($page_id,$sid){

		$url = file_get_contents("http://page.renren.com/".$page_id);
		$preg = "#</a>&nbsp;:&nbsp;(.*)</h3><div class=\"details ui-new\">(.*)<span class=\"duration\">(.*)</span><a class=\"share_new_ui\"#iUs";
		
		preg_match_all($preg,$url,$arr);

		$search = array("今天", "昨天","分钟前");  //31
		$replace = array(date("Y-m-d"), date("Y-m-d",strtotime("-1 day")),"");
		
		//var_dump($arr);
		
		$values_str = "";
		for($i=0;$i<count($arr[1]);$i++) {

			$arr[3][$i] = iconv("utf-8","gbk",$arr[3][$i]); //gbk		
			$pub_time = str_replace($search,$replace,$arr[3][$i]); //only support by gbk
			
			if(strlen($pub_time)<3){
				$pub_time = date('Y-m-d',strtotime(date("Y-m-d"))-$pub_time*60);
			} else if(strlen($pub_time)>3 && strlen($pub_time)<12) {
				$pub_time = date("Y")."-".$pub_time;				
			}
			
			//echo $pub_time."<br>";
			//echo $i.$arr[1][$i].strtotime($pub_time)."<br>";

			$values_str .=  "(NULL,".$sid.",'".$arr[1][$i]."',".strtotime($pub_time)."),";	
		}

		return $sql_str = "INSERT IGNORE INTO content VALUES".$values_str;
	}