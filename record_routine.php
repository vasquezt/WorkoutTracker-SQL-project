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
		<li class="navitem"><a href="./about.php">About</a></li>
	</ul>
</center>

<main class="home-page">
<div class="title-container">
<center>
<form action="./insert_record.php" method="post">
<p><label><b>Routine Id</b></label>
<input type="text" placeholder="Enter routine id" name="routine_id" required></p>

<p><label><b>Time</b></label>
<input type="text" placeholder="Enter time" name="time" required></p>

<p><label><b>Day</b></label>
<input type="text" placeholder="Enter day (only as an integer)" name="day" required></p>

<p><label><b>Month</b></label>
<input type="text" placeholder="Enter month (only as an integer)" name="month" required></p>

<p><label><b>Year</b></label>
<input type="text" placeholder="Enter year (only as an integer)" name="year" required></p>


<div class="clearfix">
   <button type="button"  class="cancelbtn">Reset</button>
   <button type="submit" class="signupbtn">Submit</button>
</form>


<?php
	session_start();
	//This table is here to show the user potential exercise's to choose

include 'connectvarsEECS.php';

	//Checks the connection

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn){
		die('Could not connect: ' . mysql_error());
	}

	if($_SESSION){

		//Query whole exercise table
		//We may update to only show personal exercises

		$user = $_SESSION['user'];
	
		echo "<h3> Your routines on top, all routines below!</h3>";

		$query = "SELECT * FROM Routine WHERE author = '$user'";
		$result = mysqli_query($conn, $query);
		
		//Builds top of table
	
		$fields_num = mysqli_num_fields($result);
		echo "<table border ='1'><tr>";

		//Creates whole table of elements

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
	

		$query = "SELECT * FROM Routine";
		$result = mysqli_query($conn, $query);
		
		//Builds top of table
	
		$fields_num = mysqli_num_fields($result);
		echo "<table border ='1'><tr>";

		//Creates whole table of elements

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


	}else{
		echo "<h3>Make sure to log in before recording!</h3>";
	}	
	mysqli_close($conn);
?>


</div>
</div>
</center>
