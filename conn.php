<?php
$con = @mysql_connect("localhost","root","");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("shudong", $con);
mysql_query("SET NAMES utf8");

//$result = mysql_query("SELECT * FROM content");

//mysql_close($con);

/*
while($row = mysql_fetch_array($result))
  {
  echo $row['sid'] . " " . $row['text'];
  echo "<br />";
  }
*/
