<?php

include_once("../includes/session.php");
include_once("../includes/config.php");
include_once("../includes/database.php");

$q = "select lower(tags) as tags from questions";
$result = $database->query($q);
$r = $database->fetch_array($result);

$str = "";

while($row = mysql_fetch_array($result)){
	$str = $str.",".$row["tags"];
}
//echo $str;
$a = $elements = explode(',', $str);
foreach($a as $r)
	//echo $r;
$e = array_count_values($elements);
//print_r($e);
foreach($e as $el)
	//echo trim($el)."</br>";

foreach(array_keys($e) as $paramName)
  //echo $paramName. "<br>";
  
/* foreach ($a as $k => $v) {
    echo "$k -> $v";
	echo "</br>";
} */
$a=array("A","Cat","Dog","A","Dog");
print_r(array_keys(array_count_values($a)));
foreach(array_keys(array_count_values($a)) as $a)
	echo $a."</br>";
?>