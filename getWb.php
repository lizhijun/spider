<?php

	header("Content-type: text/html; charset=utf-8");
		
	$url = file_get_contents("http://hot.weibo.com/hot");


	$pregText = "#<div class=\"WB_text\" node-type=\"feed_list_content\">(.*)</div>#iUs";
	$pregPic = "#<img class=\"bigcursor\" alt=\"\" src=\"(.*)\" node-type=\"feed_list_media_bgimg\">#iUs";

	preg_match_all($pregText,$url,$arrText);
	preg_match_all($pregPic,$url,$arrPic);

	//var_dump($arrPic);

	//$num = count($arrText[1]) >= count($arrPic[1]) ? count($arrPic[1]) : count($arrText[1]);
	
	for($i=0;$i<1;$i++) {
		$pic = str_replace("thumbnail", "bmiddle", $arrPic[1][$i]);
		echo $arrText[1][$i]."<img src=".$pic." /><br>";
	}