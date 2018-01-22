<?php
/*
	This is a cod converter, the application sent user text to this converter to convert typing according to user needs.
*/
class Cod_converter {
	function decimal_to_binary($decimal) {  //The metod that does operation to convert decimal digits to binary ones.
		if($this->check_decimal_input($decimal) == $decimal) { // it checks if user admitted any of errors in his typing and if anything is correct it commit next steps
			define('DEVIDER', 2);    //declaring of a constant with the value that equals: 2 for furher calculations
			$decimal = abs($decimal); //it makes absolute value of the number.
			$sum = $decimal; //Making a variable to do further operations to canculate what binary number is.
			$result = array(); //This array will content results of calculations.

			if ($decimal <=1) {     //If user input digits that equal: 1 or 0
				switch ($decimal) {
					case '0':
						$result[] = 0;
						$result[] = 0;
						break;
					
					case '1':
						$result[] = 1;
						$result[] = 0;
						break;
				}
			}
			if($decimal >= 2) { //if user input digits that are more than or equal two
/********************Calculation BEGINS***************************/
				while($sum >= DEVIDER) {
					if($sum % DEVIDER == 1) {
						$sum = (int) ($sum /2);
						$result[] = 1;
					}

					if($sum % DEVIDER == 0) {
						$sum /= 2;
						$result[]= 0;	
					}
				}

				if ($sum == DEVIDER-1) {
					$result[] = 1;
				}	
			}
/********************Calculation ENDED***************************/
			
			$str_result = implode(array_reverse($result)); //making a variable to content the reverse array with result digits as a string
			return $str_result;	//return finished result to futher operation with it
		} else { 
			return $this->check_decimal_input($decimal); //if user typing was wrong it will back the error with advice as a result (to see how it works take a look at check_decimal_input method below)
		}		
    }

	function binary_to_decimal($bin) {	//The metod that does operation to convert binary digits to decimal ones.	 
			
			if ($this->check_binary_input($bin) == $bin) { // it checks if user admitted any of errors in his typing and if anything is correct it commit next steps
/********************Calculation BEGINS***************************/
				$exp = (strlen($bin))-1;
				$sum = 0;
				for($i = 0; $i <=$exp; $i++) {
					$sum += $bin[$i]*pow(2, ($exp-$i));
				}
/********************Calculation ENDED***************************/
				return $sum; //return finished result to futher operation with it
			} else {
				return $this->check_binary_input($bin); //if user typing was wrong it will back the error with advice as a result (to see how it works take a look at check_binary_input method below)
			}					 	
	}

	private function check_binary_input($bin) { //it checks if user typing was correct and proper
		if(is_numeric($bin)) { //if the typing was numeric do next
			if(!preg_match("/[2-9a-zA-Z\.а-яА-Я_ ]+/", $bin)) { //it checks if the user typing does not contain any of symbols that are not proper
				return $bin; //it returns the typing to further calculations with it
			} else { 
				return $bin = "Not a proper number (it should content only (0-1)"; //if it was found any of discrepancies it returns this message about it
			}
		} else {
			return $bin = "You wrote not a number, please try again"; //if the user typing was not numeric it returns this message about it
		}
	} 

	private function check_decimal_input($decimal) { //it checks if user typing was correct and proper
		if (is_numeric($decimal)) { //if the typing was numeric do next
			if(!preg_match("/^0|\./", $decimal)) { //it checks if the user typing does not contain any of symbols that are not proper
				return $decimal; //it returns the typing to further calculations with it
			} else {
				return $decimal = "Your typing should not content dots or zeros as the first symbols, please try again"; //if it was found any of discrepancies it returns this message about it
			}

		} else {
			return $decimal = "You typed not a number, please try again"; //if the user typing was not numeric it returns this message about it
		}

	}
}

?>