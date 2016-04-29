<?php

/*echo "This page will have all the recommendations";
$_GLOBAL['date']=$_POST['str'];
echo $_GLOBAL['date'];
*/
echo "Hello it's me----------------------";
include_once("../includes/database.php");
//chdir("E:\solr\solr-5.5.0\bin");

//shell_exec("solr start -p 8983");
 
 
//chdir("C:\\xampp\\htdocs\\Quiz-Of-The-Day\\Quizopedia\\public");
$q = "select question_text from questions where question_id =".$_POST['question_id'];
$question = $database->fetch_array($database->query($q));
//echo $question["question_text"];
echo $question["question_text"];
 $output = shell_exec("java -jar solrJarCommandLine1.jar ".$question["question_text"]);
 $recoArray = (explode(",",$output));
 
// string shell_exec ( string $cmd )
 
 echo $recoArray[0];
 
?>