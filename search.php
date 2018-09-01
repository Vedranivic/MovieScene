<?php
session_start();
if(!isset($_SESSION['userID'])){
	header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/moviescene.ico">

    <title>MovieScene</title>

    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">

  </head>

	<body class="text-center" style="background-image:url('img/cover_dark.png');">
		<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
		  <header>
			<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">						
			<a class="navbar-brand" href="main.php">MovieScene</a>
			<div class="mt-2 mt-md-0">
				<img src="img/moviescene.png" alt="logo" class="logo-noanim">
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
				<a class="nav-link" href="main.php">Home</a>
				</li>
				<li class="nav-item active">
				<a class="nav-link" href="search.php">Add</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="my_movies.php">My movies</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="sign_out.php">Sign out</a>
				</li>
			</ul>			
			</div>
			</nav>
		</header>
	
		<main role="main" class="inner cover">
			<center class="centre-search">
				<form id="searchForm" class="w-50">
					<input type="text" class="form-control" id="searchText" placeholder="Search for a movie..." style="margin-bottom:1rem;" autofocus>
				</form>
				<form id="manuallyForm" class="w-50" action="add.php" method="POST">
					<button type="submit" id="manually" name="manually" class="btn btn-primary">Enter data manually</button>
				</form>
			
				<!-- Search results - movies as thumbnails: -->
				<div class="container" style="justify-content:center">
				<table>
					<tr id="movies" class="row" style="justify-content:center;">
					</tr>
				</table>
				</div>
			</center>
		</main>
	
		      <!-- FOOTER -->
		<footer class="container">
			<p style="color:rgba(255,255,255,0.6);">&copy; 2018 MovieScene</p>
		</footer>
		</div>


		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>
