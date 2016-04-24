<?php
include_once("../includes/session.php");
include_once("../includes/config.php");
include_once("../includes/database.php");

	function json_convert($q) {

		//$q = "select lower(tags) as tags from questions";
		$result = $database->query($q);
		$r = $database->fetch_array($result);

		$str = "";

		while($row = mysql_fetch_array($result)){
			$str = $str.",".$row["tags"];
		}
		$str = str_replace(", ", ",", $str);
		$str = substr($str, 1, -1);

		$str = str_replace(",", ", ", $str);
		//echo $str;
		// formatting string complete

		// code to find the occurance of each concept in the string

		$Class = "Class";
		$Object = "Object";
		$Variables = "Variables";
		$Wrapper_Classes = "Wrapper Classes";
		$String = "String";
		$Constants = "Constants";
		$Primitive_Data_Type = "Primitive Data Type";
		$Boolean_Expressions = "Boolean Expressions";
		$Arithmetic_Expressions = "Arithmetic Expressions";
		$Two_Dimensional_Array = "Two Dimensional Array";
		$ArrayList = "ArrayList";
		$Arrays = "Arrays";
		$Exceptions = "Exceptions";
		$Nested_Loops = "Nested Loops";
		$For_Loop = "For Loop";
		$Do_While_Loop = "Do-While Loop";
		$Switch_Statement = "Switch Statement";
		$Decision_Types = "Decision Types";
		$Interface = "Interface";
		$Inheritance = "Inheritance";


		$Class_count=substr_count(strtolower($str),strtolower($Class));
		$Object_count=substr_count(strtolower($str),strtolower($Object));
		$Variables_count=substr_count(strtolower($str),strtolower($Variables));
		$Wrapper_Classes_count=substr_count(strtolower($str),strtolower($Wrapper_Classes));
		$String_count=substr_count(strtolower($str),strtolower($String));
		$Constants_count=substr_count(strtolower($str),strtolower($Constants));
		$Primitive_Data_Type_count=substr_count(strtolower($str),strtolower($Primitive_Data_Type));
		$Boolean_Expressions_count=substr_count(strtolower($str),strtolower($Boolean_Expressions));
		$Arithmetic_Expressions_count=substr_count(strtolower($str),strtolower($Arithmetic_Expressions));
		$Two_Dimensional_Array_count=substr_count(strtolower($str),strtolower($Two_Dimensional_Array));
		$ArrayList_count=substr_count(strtolower($str),strtolower($ArrayList));
		$Arrays_count=substr_count(strtolower($str),strtolower($Arrays));
		$Exceptions_count=substr_count(strtolower($str),strtolower($Exceptions));
		$Nested_Loops_count=substr_count(strtolower($str),strtolower($Nested_Loops));
		$For_Loop_count=substr_count(strtolower($str),strtolower($For_Loop));
		$Do_While_Loop_count=substr_count(strtolower($str),strtolower($Do_While_Loop));
		$Switch_Statement_count=substr_count(strtolower($str),strtolower($Switch_Statement));
		$Decision_Types_count=substr_count(strtolower($str),strtolower($Decision_Types));
		$Interface_count=substr_count(strtolower($str),strtolower($Interface));
		$Inheritance_count=substr_count(strtolower($str),strtolower($Inheritance));


		$json_d = '{';
		$json_d = $json_d.'  "name": "Java Concepts",';
		$json_d = $json_d.'  "children": [';
		$json_d = $json_d.'    {';
		$json_d = $json_d.'      "name": "Basic Concepts",';
		$json_d = $json_d.'     "children": [';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "size": '.$Class_count.',';
		$json_d = $json_d.'          "name": "Class"';
		$json_d = $json_d.'        },';
		$json_d = $json_d.'       {';
		$json_d = $json_d.'          "size": '.$Object_count.',';
		$json_d = $json_d.'          "name": "Object"';
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "size": '.$Variables_count.',';
		$json_d = $json_d.'          "name": "Variable"';
		$json_d = $json_d.'        }';
		$json_d = $json_d.'      ]';
		$json_d = $json_d.'    },';
		$json_d = $json_d.'   {';
		$json_d = $json_d.'      "name": "Data Types",';
		$json_d = $json_d.'      "children": [';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "size": '.$Wrapper_Classes_count.',';
		$json_d = $json_d.'          "name": "Wrapper Classes"';
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "size": '.$String_count.',';
		$json_d = $json_d.'          "name": "String"';
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "size": '.$Constants_count.',';
		$json_d = $json_d.'          "name": "Constants"';
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'         "size": '.$Primitive_Data_Type_count.',';
		$json_d = $json_d.'          "name": "Primitive Data Type"';
		$json_d = $json_d.'       }';
		$json_d = $json_d.'      ]';
		$json_d = $json_d.'    },';
		$json_d = $json_d.'    {';
		$json_d = $json_d.'      "name": "Operations",';
		$json_d = $json_d.'      "children": [';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "name": "Boolean Expressions",';
		$json_d = $json_d.'          "size": '.$Boolean_Expressions_count;
		$json_d = $json_d.'        },';
		$json_d = $json_d.'       {';
		$json_d = $json_d.'          "name": "Arithmetic Expressions",';
		$json_d = $json_d.'          "size": '.$Arithmetic_Expressions_count;
		$json_d = $json_d.'        }';
		$json_d = $json_d.'      ]';
		$json_d = $json_d.'    },';
		$json_d = $json_d.'    {';
		$json_d = $json_d.'      "name": "Control Structuures",';
		$json_d = $json_d.'      "children": [';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "name": "Exceptions",';
		$json_d = $json_d.'          "size": '.$Exceptions_count;
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "name": "Nested Loops",';
		$json_d = $json_d.'          "size": '.$Nested_Loops_count;
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "name": "For Loop",';
		$json_d = $json_d.'          "size": '.$For_Loop_count;
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "name": "Do-While Loop",';
		$json_d = $json_d.'          "size": '.$Do_While_Loop_count;
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "name": "Switch Statement",';
		$json_d = $json_d.'          "size": '.$Switch_Statement_count;
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "name": "Decision Types",';
		$json_d = $json_d.'         "size": '.$Decision_Types_count;
		$json_d = $json_d.'        }';
		$json_d = $json_d.'      ]';
		$json_d = $json_d.'    },';
		$json_d = $json_d.'    {';
		$json_d = $json_d.'      "name": "Arrays",';
		$json_d = $json_d.'     "children": [';
		$json_d = $json_d.'       {';
		$json_d = $json_d.'          "name": "Two Dimensional Array",';
		$json_d = $json_d.'          "size": '.$Two_Dimensional_Array_count;
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "name": "ArrayList",';
		$json_d = $json_d.'          "size": '.$ArrayList_count;
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "size": '.$Arrays_count.',';
		$json_d = $json_d.'          "name": "Arrays"';
		$json_d = $json_d.'        }';
		$json_d = $json_d.'      ]';
		$json_d = $json_d.'    },';
		$json_d = $json_d.'    {';
		$json_d = $json_d.'      "name": "Interface & Inheritance",';
		$json_d = $json_d.'      "children": [';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "name": "Interface",';
		$json_d = $json_d.'          "size": '.$Interface_count;
		$json_d = $json_d.'        },';
		$json_d = $json_d.'        {';
		$json_d = $json_d.'          "name": "Inheritance",';
		$json_d = $json_d.'          "size": '.$Inheritance_count;
		$json_d = $json_d.'        }';
		$json_d = $json_d.'      ]';
		$json_d = $json_d.'    }';
		$json_d = $json_d.'  ]';
		$json_d = $json_d.'}';

		return $json_d;
	}

?>