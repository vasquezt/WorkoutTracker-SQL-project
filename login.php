<head>
  <meta charset="utf-8">
  <title>Workout Tracker</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:100,400" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="screen">
  <link rel="stylesheet" href="./style.css">
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

<form action="./checkLogIn.php" method="post">
  <div class="container">

    <p><label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="usrname" required></p>

    <p><label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="fname" required></p>

    <div class="clearfix">
      <button type="submit" class="signupbtn">Log in</button>
    </div>

  </div>
</form>
<form action="./accinfo.php"><input type="submit" value="Account Info"/></form>
</div>


</main>
