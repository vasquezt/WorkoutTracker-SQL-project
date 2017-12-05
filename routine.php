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
<form>
<p><label><b>Routine Name</b></label>
<input type="text" placeholder="Enter name of routine - ex. Leg Day" name="usrname" required></p>

<p><label><b>Type</b></label>
<input type="text" placeholder="Enter type of routine - ex. Squats" name="fname" required></p>

<p><label><b>Calories</b></label>
<input type="text" placeholder="Enter calories - ex. 250" name="lname" required></p>

<div class="clearfix">
   <button type="button"  class="cancelbtn">Reset</button>
   <button type="submit" class="signupbtn">Submit</button>
</form>

</div>
</div>
</center>
