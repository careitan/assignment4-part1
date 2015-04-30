<?php 
	$minMult = 0; /* Min Multiplicand */
	$maxMult = 0; /* Max Multiplicand */
	$minMultip = 0; /* Min Multiplier */
	$maxMultip = 0; /* Max Multiplier */

	/* PHP Online Language Reference - http://us2.php.net/manual/en/index.php */
	/* BEGIN - Check for parameters and populate variables */
	if ($_GET['min-multiplicand']) {
		$minMult += $_GET['min-multiplicand'];
	} else {
		echo "<p>Missing parameter min-multiplicand.";
	}
	if ($_GET['max-multiplicand']) {
		$maxMult += $_GET['max-multiplicand'];
	} else {
		echo "<p>Missing parameter max-multiplicand.";
	}
	if ($_GET['min-multiplier']) {
		$minMultip += $_GET['min-multiplier'];
	} else {
		echo "<p>Missing parameter min-multiplier.";
	}
	if ($_GET['max-multiplier']) {
		$maxMultip += $_GET['max-multiplier'];
	} else {
		echo "<p>Missing parameter max-multiplier.";
	}
	/* END - Check for parameters and populate variables */

	/* BEGIN - Check for parameters being positive integers */
	if ($minMult < 1 || !is_integer($minMult)) {
		echo "<p>min-multiplicand must be an integer.";
	}
	if ($maxMult < 1 || !is_int($maxMult))  {
		echo "<p>max-multiplicand must be an integer.";
	}
	if ($minMultip < 1 || !is_int($minMultip)) {
		echo "<p>min-multiplier must be an integer.";
	}
	if ($maxMultip < 1 || !is_int($maxMultip))  {
		echo "<p>max-multiplier must be an integer.";
	}
	/* END - Check for parameters being positive integers */

	/* BEGIN - Check for parameters being positive integers */
	if ($maxMult <= $minMult) {
		echo "<p>Maximum Multiplicand must be greater then Minimum Multiplicand.";
	}
	if ($maxMultip <= $minMultip) {
		echo "<p>Maximum Multiplier must be greater then Minimum Multiplier.";
	}
	/* END - Check for parameters being positive integers */

	?>

	<!DOCTYPE html>
	<html>
		<head>
			<title>CS 290 Assignment 4 Multiplication Table</title>
			<link rel="stylesheet" href="styles.css" type="text/css">
		</head>
		<body>
			<?php
			echo "<p>A Multiplication Table<table>";
			for ($j=0; $j < ($maxMultip - $minMultip + 2); $j++) { 
				for ($i=0; $i < ($maxMult - $minMult + 2); $i++) { 
					/* BEGIN - Open Row */
					if ($j == 0 && $i == 0) {
						echo "<thead><th></th>";
					} elseif ($j == 0) {
						/* Table Head Row */
						echo "<th>".($minMult + $i - 1)."</th>";
					} elseif ($j == 1 && $i == 0) {
						/* First Table Body Row */
						echo "<tbody><tr><td>".($minMultip + $j - 1)."</td>";
					} elseif ($j > 1 && $i == 0) {
						/* Left edge of table */
						echo "<tr><td>".($minMultip + $j - 1)."</td>";
					} elseif ($j > 0 && $i > 0) {
						/* Multiplication Cell */
						$product = ($minMultip + $j - 1) * ($minMult + $i - 1);
						echo "<td>".$product."</td>";
					} else {
						echo "<td></td>";
					}
				}
				/* END - Close Row */
				if ($j == 0) {
					/* Header Row */
					echo "</thead>";
				} else {
					/* Regular Row */
					echo "</tr>";
				}
			}
		echo "</tbody></table>";
		?>
		</body>
	</html>