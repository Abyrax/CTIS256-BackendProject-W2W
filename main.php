<?php
  session_start() ;
  require "db.php" ;
  // check if the user authenticated before
  if( !validSession()) {
      header("Location: login.php?error") ;
      exit ; 
  }
 
  $userData = $_SESSION["user"] ;
//   $userData = getUser($token) ;
 
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Movie Review</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="./style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>


	<body>
		

		<div id="site-content">
			<header class="site-header">
				<div class="container">
					<a href="index.html" id="branding">
						<img src="images/logo.png" alt="" class="logo">
						<div class="logo-copy">
							<h1 class="site-title">Company Name</h1>
							<small class="site-description">Tagline goes here</small>
						</div>
					</a> <!-- #branding -->

					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item current-menu-item"><a href="index.html">Home</a></li>
							<li class="menu-item"><a href="about.html"><?=$userData["Name"] ?></a></li>
							<li class="menu-item"><a href="review.html">Movie reviews</a></li>
							<li class="menu-item"><a href="profile.php">Edit Profile</a></li>
							<li class="menu-item"><a href="logout.php">Logout</a></li>
						</ul> <!-- .menu -->

						<div class="btn-group">
							<button type="button" class="btn btn-warning dropdown-toggle" data-mdb-toggle="dropdown" aria-expanded="false">
							<?=$userData["Name"] ?>
							</button>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#"><?=$userData["Name"] ?></a></li>
								<li><a class="dropdown-item" href="profileFirm.php">Edit Profile</a></li>
								<li><a class="dropdown-item" href="#">My Favourite Movies</a></li>
								<li><hr class="dropdown-divider" /></li>
								<li><a class="dropdown-item" href="logout.php">Log Out</a></li>
							</ul>									
						</div>

						<form action="#" class="search-form">
							<input type="text" placeholder="Search...">
							<button><i class="fa fa-search"></i></button>
						</form>
					</div> <!-- .main-navigation -->


        <script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
                        
    </body>
