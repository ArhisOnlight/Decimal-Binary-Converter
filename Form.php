<?php 
/*
	This is a HTML-form where an user can type digits and interact with application
*/
class Form {
	function show_form($result) { //showing the HTML-form
		echo <<<_MARK
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<title>Coding decimal to </title>	
			</head>
			<body>
			<form action="" method="post">
				<h2><pre><<<<<<<<<<<<<>>>>>>>>>>>></pre></h2>
				<h2><pre>Decimal-binary Converter</pre></h2>
				<h2><pre><<<<<<<<<<<<<>>>>>>>>>>>></pre></h2>
				<p><input type="text" name="decimal" placeholder="decimal"></p>
				<p><input type="text" name="binary" placeholder="binary"></p>
				<p><input type="submit" value="Show results"></p>
				<p>Results: $result</p>
			</form>	
			</body>
			</html>
_MARK;
		echo '<br />';
	}
}

 ?>