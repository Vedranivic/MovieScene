<?php
session_start();

if(!isset($_SESSION['userID'])){
	header('location:index.php');
}

else{
	if($_POST){
		include 'connection.php';
		if(isset($_POST['add_btn'])){
			$title = mysqli_real_escape_string($conn,$_POST['title']);
			$genre = mysqli_real_escape_string($conn, $_POST['genre']);
			$year = mysqli_real_escape_string($conn, $_POST['year']);
			$director = mysqli_real_escape_string($conn, $_POST['director']);
			$actors = mysqli_real_escape_string($conn, $_POST['actors']);
			$imdb = mysqli_real_escape_string($conn, $_POST['imdb_rating']);
			$rating = mysqli_real_escape_string($conn, $_POST['rating']);
			$plot = mysqli_real_escape_string($conn, $_POST['plot']);
			$review = mysqli_real_escape_string($conn, $_POST['review']);
			$user_id = $_SESSION['userID'];		
			
				$query_check_title = "SELECT * FROM movies WHERE user_id = $user_id AND title = '$title' AND year = '$year'";
				if(mysqli_num_rows(mysqli_query($conn,$query_check_title))==1){
					echo "<script>alert('You have already added this movie.'); window.location.href='search.php';</script>";
				}
				else{
					$query_add = "INSERT INTO movies(user_id,title,year,director,genre,actors,imdb,rating,plot,review) VALUES($user_id,'$title',$year,'$director','$genre','$actors',$imdb,$rating,'$plot','$review')";
					mysqli_query($conn, $query_add);
					echo "<script>alert('The movie has been added successfully!'); window.location.href='search.php';</script>";
				}
		}
		mysqli_close($conn);		
	}
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
			<center class="centre-add">
			<form class="w-50" method="POST">
				<div class="form-group labeled labeled-title">
					<label for="title">Title:</label>
					<input type="text" class="form-control" name="title" id="title" placeholder="Title" required autofocus>
				</div>
				<div class="form-row">
					<div class="form-group labeled col-md-6">
					<label for="genre">Genre:</label>
					<input type="text" class="form-control" name="genre" id="genre" placeholder="Genre" required>
					</div>
					<div class="form-group labeled col-md-6">
					<label for="year">Year:</label>
					<input type="number_format" class="form-control" name="year" id="year" placeholder="Year" pattern="^[0-9]*$" required>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group labeled col-md-6">
					<label for="director">Director:</label>
					<input type="text" class="form-control" name="director" id="director" placeholder="Director" required>
					</div>
					<div class="form-group labeled col-md-3">
					<label for="imdb_rating">IMDB Rating:</label>
					<input type="number_format" class="form-control" name="imdb_rating" id="imdb_rating" placeholder="IMDB rating" required>
					</div>
				</div>
				
				<div class="form-row">
					<div class="form-group labeled col-md-6">
					<label for="actors">Main actors:</label>
					<input type="text" class="form-control" name="actors" id="actors" placeholder="Actors" required>
					</div>
					<div class="form-group labeled col-md-2">
					<label for="rating">Your rating:</label>
					<select id="rating" name="rating" class="form-control" pattern="^[0-9]*$" required>
						<option selected>1</option>
						<option>2</option><option>3</option><option>4</option>
						<option>5</option><option>6</option><option>7</option>
						<option>8</option><option>9</option><option>10</option>
					</select>
					</div>
				</div>
								
				<div class="form-group labeled">
				<label for="plot">Short plot:</label>
					<textarea class="form-control" id="plot" name="plot" rows="3" placeholder="Plot…"></textarea>
				</div>
				
				<div class="form-group labeled">
				<label for="review">Review:</label>
					<textarea class="form-control" id="review" name="review" rows="4" placeholder="Your own review or notes…"></textarea>
				</div>
				
				<button type="submit" id="add_btn" name="add_btn" class="btn btn-primary btn-lg" style="margin-top:1.5rem;">Add the movie</button>			
			</form>
		
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
		<script>getMovie();</script>
	</body>
</html>
