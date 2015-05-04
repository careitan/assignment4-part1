<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
/*header('Content-Type: text/plain');
/* PHP Online Language Reference - http://us2.php.net/manual/en/index.php */
/* REFACTORED From CS494 Lecture WK 5 Sessions Lecture*/
session_start();
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
	$_SESSION['logged'] = 0;
	$_SESSION = array();
	session_destroy();
	$filepath = explode('/',$_SERVER['PHP_SELF'],-1);
	$filepath = implode('/', $filepath);
	$redirect = "http://".$_SERVER['HTTP_HOST'].$filepath;
	header("Location: {$redirect}/login.php", true);
	die("Session Start Header");
}
/* END of Refactored code */
?>
<!DOCTYPE html>
<head>
	<title>CS 290 Content PHP Assignment</title>
	<link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
	<?php
	if (session_status() == PHP_SESSION_ACTIVE) {
		if (!isset($_POST['username']) && !isset($_SESSION['logged'])){
			/* USERNAME is not logged on or verifiable. */
			echo '<h2>A username must be entered. Click <a href="login.php">
			here</a> to return to the login screen.';
		} else {

			if (isset($_POST['username']) && strlen($_POST['username']) > 0) {
				$_SESSION['username'] = $_POST['username'];
				if (!isset($_SESSION['logged'])) {
					$_SESSION['logged'] = 1;
				}
			} else {
				if (!isset($_SESSION['logged'])) {
					$_SESSION['logged'] = 0;
				}
			}

			if (!isset($_SESSION['visits'])) {
				$_SESSION['visits'] = 0;
			}

			/* USERNAME is logged on and verifed. */
			if ($_SESSION['logged'] = 1) {
				echo '<h2>Click <a href="content1.php>here</a> to visit Content1.PHP page.<br>Hello '.$_SESSION['username'].', 
				you have visited this page '.$_SESSION['visits'].' times before.';
				/*echo 'Click <a href="content1.php>here</a> to visit Content1.PHP page.';*/
				echo 'Click <a href="content2.php?action=logout">here</a> to logout.';
				$_SESSION['visits']++;
			}
		}
	}
	?>
</body>