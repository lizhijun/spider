<?php
        include "conn.php";

        $result = mysql_query("SELECT sid,renren_page_id FROM school");
	  
	  
	    while($row = mysql_fetch_array($result)){

			echo $row['sid'].$row['renren_page_id']."<br>"; 

		}

	  ?>
