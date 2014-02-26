<?php
	header("Content-type: text/html; charset=utf-8");
    //获得服务端系统时间
	//date_default_timezone_set(PRC);
	 
	 //echo $nowtime=date("Y-m-d");

	 //标准时间转为时间戳
	 // echo $dateline=strtotime($nowtime);
	 //时间戳转为标准时间
	 // echo $nowtime=date('H:i:s',$dateline);


	 //echo str_replace("world","earth","Hello world!");

	 //mb_regex_encoding('EUC-CN');
	 //echo $str=mb_eregi_replace("今天","测试","今天哦也");

	 //echo str_replace("今天","12323","今天哦也");


echo strtotime("2009-10-21 16:00:10");	//输出 1256112010
echo strtotime("10 September 2008")."<br>";	//输出 1220976000
echo date("Y-m-d",strtotime("-1 day")). "<br />";	//输出明天此时的时间戳

