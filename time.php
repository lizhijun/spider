<?php
	header("Content-type: text/html; charset=utf-8");
    //��÷����ϵͳʱ��
	//date_default_timezone_set(PRC);
	 
	 //echo $nowtime=date("Y-m-d");

	 //��׼ʱ��תΪʱ���
	 // echo $dateline=strtotime($nowtime);
	 //ʱ���תΪ��׼ʱ��
	 // echo $nowtime=date('H:i:s',$dateline);


	 //echo str_replace("world","earth","Hello world!");

	 //mb_regex_encoding('EUC-CN');
	 //echo $str=mb_eregi_replace("����","����","����ŶҲ");

	 //echo str_replace("����","12323","����ŶҲ");


echo strtotime("2009-10-21 16:00:10");	//��� 1256112010
echo strtotime("10 September 2008")."<br>";	//��� 1220976000
echo date("Y-m-d",strtotime("-1 day")). "<br />";	//��������ʱ��ʱ���

