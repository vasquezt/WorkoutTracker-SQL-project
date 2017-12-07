
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

<?php

	session_start();
	include 'connectvarsEECS.php';

	//Check if able to connect to database

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn){
		die('Could not connect: ' . mysql_error());
	}

	//Check if session is in progress

	if($_SESSION){
		$user = $_SESSION['user'];

		//Query for recorded routines

		echo "$user :";

		$query = "SELECT * FROM Recorded WHERE username = '$user' ORDER BY day;";
		$result = mysqli_query($conn, $query);

		if($result){

			//For each result, we will display data

			while($row = mysqli_fetch_array($result)) {

				//We are gabing the name's of the routines
				echo "\nID: $row[1], ";

				$the_query = "SELECT routine FROM Routine WHERE routine_id = '$row[1]';";
				$value = mysqli_query($conn, $the_query);
				if($value){
					echo "found";
					echo "Name: $value";
				}else{
					echo "failed to find";
				}


			}
		}else{
			echo "You need to add some routines to your page";
		}
	}else{
		echo "You need to log in to view Routines";
	}

	mysqli_close($conn);
?>

<br>


</div>
</main>
