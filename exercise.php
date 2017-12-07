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


	<form action="./insert_exercise.php" method="post">
	  <div class="container-exercise">

	    <p><label><b>Exercise</b></label>
	    <input type="text" placeholder="Enter Exercise" name="exercise" required></p>

		 <p><label><b>Author</b></label>
	    <input type="text" placeholder="Enter Author" name="author" required></p>

	    <p><label><b>Muscle</b></label>
	    <input type="text" placeholder="Enter Muscle" name="muscle" required></p>

		 <p><label><b>Intensity</b></label>
		 <input type="text" placeholder="Enter Intensity" name="intensity" required></p>

		 <p><label><b>Reps</b></label>
	    <input type="text" placeholder="Enter Reps" name="reps" required></p>


	    <div class="clearfix">
	      <button type="submit" class="signupbtn">Submit Exercise</button>
	    </div>

	  </div>
	</form>
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
		$query = "SELECT * FROM Exercises";
		$result = mysqli_query($conn, $query);

		//Builds top of table
		$fields_num = mysqli_num_fields($result);
		echo "<h3>Table: Exercises </h3>";
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

</div>
</main>
<!--
<h4>Top Gym Member Results</h4>
try to beat them! <br>
<p>
<ul class="weeks-grid">
	Bella
	<li>Bench Press 230</li>
	<li>Deadlift 322</li>
	<li>Running 11</li>
</ul>
<ul class="weeks-grid">
	Liam
	<li>Bench Press 228</li>
	<li>Deadlift 319</li>
	<li>Running 8</li>
</ul>
<ul class="weeks-grid">
	Noah
	<li>Bench Press 220</li>
	<li>Deadlift 315</li>
	<li>Running 7</li>
</ul>
<ul class="weeks-grid">
	Lucy
	<li>Bench Press 205</li>
	<li>Deadlift 298</li>
	<li>Running 5</li>
</ul>
</p>
</p>
	   </div>

	   </main>
	   -->
