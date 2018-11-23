<?php

const NULL_COLOUR = "rgb(0, 0, 0)";
const BOOLEAN_COLOUR = "rgb(0, 0, 125)";
const DOUBLE_COLOUR = "rgb(125, 0, 0)";
const INTEGER_COLOUR = "rgb(200, 0, 0)";
const STRING_COLOUR = "rgb(0, 125, 0)";
const OBJECT_COLOUR = "rgb(255, 180, 180)";

function d_var_dump($arr){
	echo '<pre style="font-size:17px">';
	_v($arr, "");
	echo "</pre>";
}
function _v($arr, $p){
	$t = gettype($arr);
	switch($t){
		case "NULL":
			echo '<span style="color:'.NULL_COLOUR.'"><b>';
			echo "NULL</b></span>";
			break;
		case "boolean":
			echo '<span style="color:'.BOOLEAN_COLOUR.'">';
			echo "Bool </span>";
			echo ' '.($arr == 0 ? "false" : "true");
			break;
		case "double":
			echo '<span style="color:'.DOUBLE_COLOUR.'">';
			echo "Double </span>";
			echo ' '.$arr;
			break;
		case "integer":
			echo '<span style="color:'.INTEGER_COLOUR.'">';
			echo "Integer </span>";
			echo ' '.$arr;
			break;
		case "string":
			echo '<span style="color:'.STRING_COLOUR.'">';
			echo "String(".strlen($arr).")</span>";
			echo ' "'.$arr.'"';
			break;
		case "array":
			echo "Array(".sizeof($arr).") {\r\n";
			for($i = 0; $i < sizeof($arr); $i++){
				echo $p."\t"."[".$i."] => ";
				_v($arr[$i], $p."\t");
				echo "\r\n";
			}
			echo $p."}";
			break;
		case "object":
			$class = get_class($arr);
			echo '<span style="color:'.OBJECT_COLOUR.'">';
			echo "Object";
			echo "</span>(".$class."){\r\n";
			$o = (array)$arr;
			foreach($o as $k => $v){
				$type = "";
				$name = "";
				if(substr($k, 1, 1) == "*"){
					$type = "protected";
					$name = substr($k, 2);
				}else if(substr($k, 1, strlen($class)) == $class){
					$type = "private";
					$name = substr($k, strlen($class) + 1);
				}else{
					$type = "public";
					$name = $k;
				}
				echo $p."\t"."[<u>".$type."</u> : ".$name."] => ";
				_v($v, $p."\t");
				echo "\r\n";
			}
			echo $p."}";
			break;
		default:
			break;
	}
}
?>