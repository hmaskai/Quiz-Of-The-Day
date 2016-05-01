<?php

class MyFunction {
	//public $json_d;
	
	public function json_convert($q) {

		//----- QUERY FOR TAGS OF ALL QUESTIONS [TO FIND THE COUNT OF ALL QUESTIONS]--------
		//$q = "select lower(tags) as tags from questions";
		
		//----- QUERY FOR TAGS OF ALL CORRECT ANSWERS OF LOGGED IN STUDENT------------------
		//$q = "select lower(q.tags) from questions q, student_questions sq where sq.user_id = $session->user_id and q.question_id = sq.question_id and sq.answer = q.correct_answer"
		
		//----- QUERY FOR TAGS OF ALL IN-CORRECT ANSWERS OF LOGGED IN STUDENT---------------
		//$q = "select lower(q.tags) from questions q, student_questions sq where sq.user_id = $session->user_id and q.question_id = sq.question_id and sq.answer != q.correct_answer"
		
		//$result = $database->query($q);
		$result = mysql_query($q);
		$r = mysql_fetch_array($result);

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

	public function csv_correct_incorrect_unattempted(){
		
		//$result = mysql_query($q);
		//$r = mysql_fetch_array($result);

		$str = "Question ID,Correct,Incorrect,Unattempted";
		
		$correct = "select q.question_id, count(s.question_id) correct from questions q left outer join student_questions s on q.question_id = s.question_id and s.answer = q.correct_answer and s.answer != -1 GROUP BY q.question_id";
		
		$incorrect = "select q.question_id, count(s.question_id) incorrect from questions q left outer join student_questions s on q.question_id = s.question_id and s.answer != q.correct_answer and s.answer != -1 GROUP BY q.question_id";
		
		$unattempted = "select q.question_id, count(s.question_id) unattempted from questions q left outer join student_questions s on q.question_id = s.question_id and s.answer = -1 GROUP BY q.question_id";
		
		$correct_count = mysql_query($correct);
		$incorrect_count = mysql_query($incorrect);
		$unattempted_count = mysql_query($unattempted);
		
		//$cc = mysql_fetch_assoc($correct_count);
		//$ic = mysql_fetch_assoc($incorrect_count);
		//$uc = mysql_fetch_assoc($unattempted_count);
		
		//$my_arary = array();
		while($row_c = mysql_fetch_array($correct_count)){
			$row_in = mysql_fetch_array($incorrect_count);
			$row_un = mysql_fetch_array($unattempted_count);
			$str = $str.$row_c["question_id"].','.$row_c["correct"].','.$row_in["incorrect"].','.$row_un["unattempted"].'\n';
		}
		return $str;
	}
	
	public function student_accuracy(){
		
		//error_reporting(0);
		
		//----- QUERY FOR TAGS OF ALL QUESTIONS [TO FIND THE COUNT OF ALL QUESTIONS]--------
		//$q = "select lower(tags) as tags from questions";
		
		//----- QUERY FOR TAGS OF ALL CORRECT ANSWERS OF LOGGED IN STUDENT------------------
		//$q = "select lower(q.tags) from questions q, student_questions sq where sq.user_id = $session->user_id and q.question_id = sq.question_id and sq.answer = q.correct_answer"
		
		//----- QUERY FOR TAGS OF ALL IN-CORRECT ANSWERS OF LOGGED IN STUDENT---------------
		//$q = "select lower(q.tags) from questions q, student_questions sq where sq.user_id = $session->user_id and q.question_id = sq.question_id and sq.answer != q.correct_answer"
		
		//$result = $database->query($q);
		$result = mysql_query("select lower(tags) as tags from questions");
		$r = mysql_fetch_array($result);

		$str = "";

		while($row = mysql_fetch_array($result)){
			$str = $str.",".$row["tags"];
		}
		$str = str_replace(", ", ",", $str);
		$str = substr($str, 1);

		$str = str_replace(",", ", ", $str);
		//echo $str."</br>";
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
		$Arrays = "Array";
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
		
		$users = mysql_query("SELECT user_id, CONCAT( fname, ' ', lname ) as name from login order by user_id");
		$final = '[';
		
		while($u = mysql_fetch_array($users)){
			$user_correct = mysql_query("select lower(q.tags) tags from questions q, student_questions sq where sq.user_id = ".$u['user_id']." and q.question_id = sq.question_id and sq.answer = q.correct_answer");
			
			$str = "";

			while($row = mysql_fetch_array($user_correct)){
				$str = $str.",".$row["tags"];
			}
			$str = str_replace(", ", ",", $str);
			$str = substr($str, 1);

			$str = str_replace(",", ", ", $str);
			//echo $str;
			//echo "</br>";
			
			$Class_count_user=substr_count(strtolower($str),strtolower($Class));
			$Object_count_user=substr_count(strtolower($str),strtolower($Object));
			$Variables_count_user=substr_count(strtolower($str),strtolower($Variables));
			$Wrapper_Classes_count_user=substr_count(strtolower($str),strtolower($Wrapper_Classes));
			$String_count_user=substr_count(strtolower($str),strtolower($String));
			$Constants_count_user=substr_count(strtolower($str),strtolower($Constants));
			$Primitive_Data_Type_count_user=substr_count(strtolower($str),strtolower($Primitive_Data_Type));
			$Boolean_Expressions_count_user=substr_count(strtolower($str),strtolower($Boolean_Expressions));
			$Arithmetic_Expressions_count_user=substr_count(strtolower($str),strtolower($Arithmetic_Expressions));
			$Two_Dimensional_Array_count_user=substr_count(strtolower($str),strtolower($Two_Dimensional_Array));
			$ArrayList_count_user=substr_count(strtolower($str),strtolower($ArrayList));
			$Arrays_count_user=substr_count(strtolower($str),strtolower($Arrays));
			$Exceptions_count_user=substr_count(strtolower($str),strtolower($Exceptions));
			$Nested_Loops_count_user=substr_count(strtolower($str),strtolower($Nested_Loops));
			$For_Loop_count_user=substr_count(strtolower($str),strtolower($For_Loop));
			$Do_While_Loop_count_user=substr_count(strtolower($str),strtolower($Do_While_Loop));
			$Switch_Statement_count_user=substr_count(strtolower($str),strtolower($Switch_Statement));
			$Decision_Types_count_user=substr_count(strtolower($str),strtolower($Decision_Types));
			$Interface_count_user=substr_count(strtolower($str),strtolower($Interface));
			$Inheritance_count_user=substr_count(strtolower($str),strtolower($Inheritance));
			
			
			
			$final .= "{Name:'".$u["name"]."',freq:{";
			$final = $final.$Class.":".round($Class_count!=0 ? (100 * $Class_count_user)/$Class_count : 0, 2).", ";
			$final = $final.$Object.":".round($Object_count!=0 ? (100 * $Object_count_user)/$Object_count : 0, 2).", ";
			$final = $final.$Variables.":".round($Variables_count!=0 ? (100 * $Variables_count_user)/$Variables_count : 0, 2).", ";
			$final = $final.$Wrapper_Classes.":".round($Wrapper_Classes_count!=0 ? (100 * $Class_count_user)/$Wrapper_Classes_count : 0, 2).", ";
			$final = $final.$String.":".round($String_count!=0 ? (100 * $Class_count_user)/$String_count : 0, 2).", ";
			$final = $final.$Constants.":".round($Constants_count!=0 ? (100 * $Class_count_user)/$Constants_count : 0, 2).", ";
			$final = $final.$Primitive_Data_Type.":".round($Primitive_Data_Type_count!=0 ? (100 * $Class_count_user)/$Primitive_Data_Type_count : 0, 2).", ";
			$final = $final.$Boolean_Expressions.":".round($Boolean_Expressions_count!=0 ? (100 * $Class_count_user)/$Boolean_Expressions_count : 0, 2).", ";
			$final = $final.$Arithmetic_Expressions.":".round($Arithmetic_Expressions_count!=0 ? (100 * $Class_count_user)/$Arithmetic_Expressions_count : 0, 2).", ";
			$final = $final.$Two_Dimensional_Array.":".round($Two_Dimensional_Array_count!=0 ? (100 * $Class_count_user)/$Two_Dimensional_Array_count : 0, 2).", ";
			$final = $final.$ArrayList.":".round($ArrayList_count!=0 ? (100 * $Class_count_user)/$ArrayList_count : 0, 2).", ";
			$final = $final.$Arrays.":".round($Arrays_count!=0 ? (100 * $Class_count_user)/$Arrays_count : 0, 2).", ";
			$final = $final.$Exceptions.":".round($Exceptions_count!=0 ? (100 * $Class_count_user)/$Exceptions_count : 0, 2).", ";
			$final = $final.$Nested_Loops.":".round($Nested_Loops_count!=0 ? (100 * $Class_count_user)/$Nested_Loops_count : 0, 2).", ";
			$final = $final.$For_Loop.":".round($For_Loop_count!=0 ? (100 * $Class_count_user)/$For_Loop_count : 0, 2).", ";
			$final = $final.$Do_While_Loop.":".round($Do_While_Loop_count!=0 ? (100 * $Class_count_user)/$Do_While_Loop_count : 0, 2).", ";
			$final = $final.$Switch_Statement.":".round($Switch_Statement_count!=0 ? (100 * $Class_count_user)/$Switch_Statement_count : 0, 2).", ";
			$final = $final.$Decision_Types.":".round($Decision_Types_count!=0 ? (100 * $Class_count_user)/$Decision_Types_count : 0, 2).", ";
			$final = $final.$Interface.":".round($Interface_count!=0 ? (100 * $Class_count_user)/$Interface_count : 0, 2).", ";
			$final = $final.$Inheritance.":".round($Inheritance_count!=0 ? (100 * $Class_count_user)/$Inheritance_count : 0, 2)."}},</br>";
		}
		$final .= ']';
		
		$final = str_replace("Wrapper Classes", "Wrapper_Classes", $final);
		$final = str_replace("Primitive Data Type", "Primitive_Data_Type", $final);
		$final = str_replace("Boolean Expressions", "Boolean_Expressions", $final);
		$final = str_replace("Arithmetic Expressions", "Arithmetic_Expressions", $final);
		$final = str_replace("Two Dimensional Array", "Two_Dimensional_Array", $final);
		$final = str_replace("Nested Loops", "Nested_Loops", $final);
		$final = str_replace("For Loop", "For_Loop", $final);
		$final = str_replace("Do-While Loop", "Do_While_Loop", $final);
		$final = str_replace("Switch Statement", "Switch_Statement", $final);
		$final = str_replace("Decision Types", "Decision_Types", $final);
		
		echo $final;
		
	}
	
}
	$functions = new MyFunction();
?>