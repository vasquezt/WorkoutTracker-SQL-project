
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
		$username = $_SESSION['user'];
	
	// Grab data from post request and cleans it


		$routine_id = mysqli_real_escape_string($conn, $_POST['routine_id']);
		$time = mysqli_real_escape_string($conn, $_POST['time']);
		$day = mysqli_real_escape_string($conn, $_POST['day']);
		$month = mysqli_real_escape_string($conn, $_POST['month']);
		$year = mysqli_real_escape_string($conn, $_POST['year']);
	
	
		// Grabs largest id in database and incraments
		// This allows for all elements to have unique id
	
		$row_q = "SELECT MAX(recorded_id) AS max FROM Recorded;";
		$rowSQL = mysqli_query($conn, $row_q);
		$row = mysqli_fetch_array($rowSQL);
		$id = $row['max'] + 1;
	


		$query = "INSERT INTO Recorded (recorded_id, routine_id, username, event_id, time, day, month, year) VALUES ('$id', '$routine_id', '$username', '0', '$time', '$day', '$month', '$year')";
		if(mysqli_query($conn, $query)){
			echo "Recorded successfully";
		}else{
			echo "Error: " . mysqli_error($conn);
		}

	}else{
		echo "You need to log in to record!";
	}

	mysqli_close($conn);
?>

</div>
</div>
</center>
