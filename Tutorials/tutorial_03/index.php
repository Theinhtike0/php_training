<?php 
$res = false;
if (isset($_POST["submit"])) {
	$dob_val = $_POST["dob"];
	$dob = new DateTime($dob_val);
	$today = new DateTime('today');
	$obj = date_diff($dob, $today, FALSE);
	$msgres = "<p> Your DOB is $dob_val  And Age is : $obj->y </p>";
	$msgres .= "<p>Year : ".$obj->y." Months : ".$obj->m." Days : ".$obj->d."</p>";
	$res = true;
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Age Calculate</title>
	</head>
	<body>
		<div id="php">
			<form method="post">
				<p> Select Your Date Of Birth : <input type="date" name="dob" required /></p>
				<p> <input type="submit" name="submit" value="Calculate Age"> </p>
			</form>
		</div>
		<?php
	if ($res) {
		echo "<div class='resultdiv'>  $msgres </div>";
	}
		?>
	</body>
</html>