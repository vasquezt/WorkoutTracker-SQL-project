
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

<?php
	session_start();
	include 'connectvarsEECS.php';


	//Check connection

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn){
		die('Could not connect: ' .mysql_error());
	}

	//Get and escape post variables for security

	$username = mysqli_real_escape_string($conn, $_POST['usrname']);
	$password = mysqli_real_escape_string($conn, $_POST['fname']);

	//Will query for the salt that is associated with user

	$query = "SELECT salt FROM Users WHERE username = '$username'";
	$result = mysqli_query($conn, $query);
	if ($row = mysqli_fetch_assoc($result)){
		$salt = $row['salt'];

		// Will apply salt and check password

		$hash = hash(MD5, $password.$salt);
		$saltSql = "SELECT * FROM Users WHERE username = '$username' AND hashed_pass = '$hash'";
		$final = mysqli_query($conn, $saltSql);
		if($finalrow = mysqli_fetch_assoc($final)){

			//If valid, start new session with user

			echo "Valid user login";
			$_SESSION['user'] = $username;
			$_SESSION['pass'] = $hash;
		}else{
			echo "Invalid login: Invalid password";
		}
	}else{
		echo "Invalid login: User doesn't exist";
	}

	// Close the connection

	mysqli_close($conn);
?>	

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
