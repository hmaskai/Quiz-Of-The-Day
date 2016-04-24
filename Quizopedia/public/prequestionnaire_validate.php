<?php
include_once("../includes/session.php");
include_once("../includes/config.php");
include_once("../includes/database.php");



$_GLOBAL["pre1"]= "INSERT INTO `demographics` (`asu_id`, `confidence`, `courses_completed`, `description`, `gender`, `age`, `mother_tongue`, `country_of_residence`, `other_country`) VALUES ('".$session->user_id."', '".$_POST["programmingSkill"]."', '".$_POST["coursesCompleted"]."', '".$_POST["characteristic"]."', '".$_POST["gender"]."', '".$_POST["age"]."', '".$_POST["motherTongue"]."', '".$_POST["country"]."', '".$_POST["countryResidence"]."')";



header("Location: pre_test.php");
exit();


?>