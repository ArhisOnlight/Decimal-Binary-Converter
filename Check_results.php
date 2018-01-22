<?php 
/*
	This is a module that checks if user typed something or not and if he did it operates with the input and makes some steps according to the typing.
*/
require_once 'Cod_converter.php'; //adding the cod converter to use it further
require_once 'Secure.php'; //adding the typing checker to avoid all symbols that can break the security of the application

class Check_results {
	function check() //method that checks if user typed something or not, and making some actions according to it or does nothing if user has not sent any typing during a request
	{

		if(!empty($_POST['binary']) &&  //it checks if both fields were filled if yes it returns special message as a result
	   	   !empty($_POST['decimal'])) { 
			$result = "It's possible to type only in one of two fields at the same time";
			return $result;	
		}	   

		if (!empty($_POST['decimal'])) { //if decimal field was filled
			$dec = Secure::sanitize_string($_POST['decimal']); //it checks if the string has any of html-tegs, strips, enteties and return sanitize string to work with.
			$con1 = new Cod_converter(); //making an object to get further results
			$result = $con1->decimal_to_binary($dec); //putting the typing to converter and getting results of calculations
			return $result; //return it to furher operating with it

		}

		if (!empty($_POST['binary'])) { //if binary field was filled
			$bin = Secure::sanitize_string($_POST['binary']); //it checks if the string has any of html-tegs, strips, enteties and return sanitize string to work with.
			$con2 = new Cod_converter(); //making an object to get further results
			$result = $con2->binary_to_decimal($bin); //putting the typing to converter and getting results of calculations
			return $result; //return it to furher operating with it
		}		
	}
}

?>