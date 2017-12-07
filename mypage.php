
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

<br>

	<ul class="days">
      <form action="./calendar.php"><input type="submit" value="New Rout/Exer"/></form>
      <form action="./record_routine.php"><input type="submit" value="Record Routine"/></form>
      <form action="./maxes.php"><input type="submit" value="View Maxes"/></form>
	</ul>

	<h2>Upcoming Routines</h2>

<center>
	<?php
		//This table is here to show the user potential exercise's to choose
	include 'connectvarsEECS.php';
		//Checks the connection
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn){
			die('Could not connect: ' . mysql_error());
		}
		//Query whole exercise table
		//We may update to only show personal exercises
		$query = "SELECT * FROM Routine";
		$result = mysqli_query($conn, $query);

		//Builds top of table
		$fields_num = mysqli_num_fields($result);
		echo "<h3>Table: Routine </h3>";
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
		mysqli_close($conn);
	?>
</center>
<br>


</div>
</main>
