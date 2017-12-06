<head>
	<meta charset="utf-8">
	<title>Workout Tracker</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:100,400" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="screen">
	<link rel="stylesheet" href="./style.css">

	<!-- Style sheet for the calendar -->
	<!--  <link rel="stylesheet" href="/calendar.css"> -->

</head>

<header>
<center><h1 class="site-title">Workout Tracker</h1></center>
</header>

<center><nav class="navbar">
	<ul class="navlist">
		<li class="navitem"><a href="./">Home</a></li>
		<li class="navitem"><a href="./mypage.php">My Page</a></li>
		<li class="navitem"><a href="./account.php">Account</a></li>
	</ul>
</center>

<main class="home-page">
<div class="title-container">
<center>
<form action="./insert_routine.php" method="post">
<p><label><b>Routine Name</b></label>
<input type="text" placeholder="Enter name of routine - ex. Leg Day" name="routine" required></p>

<p><label><b>Type</b></label>
<input type="text" placeholder="Enter type of routine - ex. Squats" name="exercise" required></p>

<p><label><b>Calories</b></label>
<input type="text" placeholder="Enter calories - ex. 250" name="calories" required></p>



<p><label><b>Exercise Id 1</b></label>
<input type="text" placeholder="Enter Id - ex. 200" name="exr1"></p>
<p><label><b>Exercise Id 2</b></label>
<input type="text" placeholder="Enter Id - ex. 250" name="exr2"></p>
<p><label><b>Exercise Id 3</b></label>
<input type="text" placeholder="Enter Id - ex. 300" name="exr3"></p>

<div class="clearfix">
   <button type="button"  class="cancelbtn">Reset</button>
   <button type="submit" class="signupbtn">Submit</button>
</form>

<?php
include 'connectvarsEECS.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn){
		die('Could not connect: ' . mysql_error());
	}

	$query = "SELECT * FROM Exercises";
	$result = mysqli_query($conn, $query);

	$fields_num = mysqli_num_fields($result);
	echo "<h3>Table: Exercises </h3>";
	echo "<table border ='1'><tr>";


	for($i=0; $i<$fields_num; $i++){
		$field = mysqli_fetch_field($result);
		echo "<td><b>$field->name</b></td>";
	}
	echo "</tr>\n";
	while($row = mysqli_fetch_row($result)) {
		echo "<tr>";
		foreach($row as $cell)
			echo "<td>$cell</td>";
		echo "</td>\n";
	}

	mysqli_free_result($result);
	mysqli_close($conn);
?>

</div>
</div>
</center>
