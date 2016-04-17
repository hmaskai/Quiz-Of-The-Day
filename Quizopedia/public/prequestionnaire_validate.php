<?php
include_once("../includes/session.php");
include_once("../includes/config.php");
include_once("../includes/database.php");


$q = "INSERT INTO `demographics` (`asu_id`, `confidence`, `courses_completed`, `description`, `gender`, `age`, `mother_tongue`, `country_of_residence`, `other_country`) VALUES ('".$_POST["usr"]."', '".$_POST["programmingSkill"]."', '".$_POST["coursesCompleted"]."', '".$_POST["characteristic"]."', '".$_POST["gender"]."', '".$_POST["age"]."', '".$_POST["motherTongue"]."', '".$_POST["country"]."', '".$_POST["countryResidence"]."')";
echo $q;

echo "<br>";

$database->query($q);
//header("Location: homepage.php");
//exit();


?>