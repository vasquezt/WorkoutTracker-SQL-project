
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


<?php
	session_start();
	include 'connectvarsEECS.php';


	//Check if able to connect to Data base


	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn){
		die('Could not connect: ' . mysql_error());
	}


	// Check if there is a session in progress to atribute user too
	
	if($_SESSION){
		$user = $_SESSION['user'];
	
		// Grab data from post request and cleans it


		$bench = mysqli_real_escape_string($conn, $_POST['bench']);
		$squat = mysqli_real_escape_string($conn, $_POST['squat']);
		$mile = mysqli_real_escape_string($conn, $_POST['2mile']);

		//Call query to update max

		$query = "UPDATE Max_Exercises SET bench_pounds = '$bench', squat_pounds = '$squat', 2_mile_min = '$mile' WHERE username = '$user'";
		if(mysqli_query($conn, $query)){
			echo "Recorded successfully";
		}else{
			echo "Error: " . mysqli_error($conn);
		}
	}else{
		echo "Please log in first!";
	}


	mysqli_close($conn);
?>


</div>
</div>
</center>
