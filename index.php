<?php
/*
# Decimal-Binary-Converter

*************************
Author: Arhis Onlight

Date: 21.01.18
*************************

What features this app has?


1) It converts numbers between binary and decimal range in both directions.

2) It has special system of checking like:

a) It checks if both fields were filled during one request

b) It checks has user typed digits at all. 

c) If it was digits for decimals, the app checks if they are proper.

d) It searches for zero digits at the beginning and any dots in it. 

e) It checks like did user type a signed or unsigned digit, and it makes absolute value of it to work with it further.

f) If user typed binary digits it checks if  they are digits in first priority, then do they contain any of digits that are distinguishable to 0 or 1 or it has the dots inside. 

g) If the app found any of discrepancy the system said the message to user that an error occured to provoke his re-typing in correct way.
*/

require_once 'Form.php';				 //connecting with HTML-form to display it
require_once 'Check_results.php';        //connecting with the cheker to check some results.

$result = (new Check_results)->check();  //Start checking if the user was typing something, if yes, it does furhter actions
Form::show_form($result); //Showing HTML-form and if there is a result of the conversion it send it to form to display it on the page.

?>

