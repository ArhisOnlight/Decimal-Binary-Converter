<?php 

/*
	This is a module that checks to delete anything undesirable which can make an influence on application's code
*/

class Secure {

	static function sanitize_string($str) { //it cleans the string
		$str = stripcslashes($str);
		$str = strip_tags($str);
		$str = htmlentities($str);
		return $str; //it returns the string to further operating with it
	}
}






?>
