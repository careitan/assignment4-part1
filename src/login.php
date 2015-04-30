<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	/* PHP Online Language Reference - http://us2.php.net/manual/en/index.php */
	?>
	<!DOCTYPE html>
	<head>
		<title>CS 290 Login PHP Assignment</title>
		<link rel="stylesheet" href="styles.css" type="text/css">
	</head>
	<body>
		<?php
				echo '<form action="content1.php" method="post">';
				echo '<fieldset><label>Username:</label>';
				echo '<input type="text" name="username" />';
				echo '<input type="submit" value="Login" /></fieldset></form>';
			?>
	</body>