<?php
session_start();

if(!isset($_SESSION['userID'])){
	header('location:index.php');
}

else{
	if($_POST){
		include 'connection.php';
		if(isset($_POST['delete'])){
			$user_id = $_SESSION['userID'];
			$movie_id = $_POST['delete'];
				
				$query_delete = "DELETE FROM movies WHERE user_id = $user_id AND id = $movie_id";
				if($query_delete){
					mysqli_query($conn, $query_delete);
					echo "<script>alert('Movie has been deleted successfully.'); window.location.href='my_movies.php';</script>";
				}
				else{
					echo "<script>alert('There was an error. Try again.'); window.location.href='my_movies.php';</script>";
				}
		}	
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
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
					<li class="nav-item">
					<a class="nav-link" href="search.php">Add</a>
					</li>
					<li class="nav-item active">
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
			<center class="custom-centre">
				<div class="separator-gradient"></div>
				
				<?php				
				include 'connection.php';
				$user_id = $_SESSION['userID'];		
				$query_get = "SELECT id, title, year, director, genre, actors, imdb, rating, plot, review FROM movies WHERE user_id = $user_id ORDER BY id DESC";
				$result = mysqli_query($conn, $query_get);
				
				if(mysqli_num_rows($result)>0){
					echo "<table class=\"w-75\"><tr><th></th></tr><tbody>";
							
					while($row = mysqli_fetch_assoc($result)){
						echo "<tr><td><div class=\"container\">
						<div class=\"decoration-gradient\"></div>
								<div class=\"inner container-title\">
									<h5 style=\"color:white; display:block; width:100%;\">" .$row["title"]."<span class=\"text-primary\"> (<i>".$row["year"]."</i>)</span></h5>
									<form method=\"POST\"><input class=\"image-button\" src=\"img/delete.png\" type=\"image\" style=\"background:none\" name=\"delete\" value=\"".$row["id"]."\" ></input></form>
								</div>
								<div class=\"inner container-body\">
								<div class=\"inner\">
									<h6><i >".$row["genre"]."</i></h6>
									<h6>".$row["plot"]."</h6>
									<br>
									<h6><text class=\"text-primary\">Director: </text>".$row["director"]."</h6>
									<h6><text class=\"text-primary\">Main actors: </text>".$row["actors"]."</h6>
									<h6><text class=\"text-primary\">IMDB Rating: </text><number>".$row["imdb"]."</number><span style=\"display:inline-block;width:3rem\"> </span><text class=\"text-primary\">Your Rating: </text><span class=\"rating-styled\"> ".$row["rating"]." </span></h6>
									<h6><text class=\"text-primary\">Your Review: </text><i>".$row["review"]."</i></h6>
								</div>
								</div>
							</div>
						</td></tr>";
					}
					echo "</tbody></table>";
				}
				else echo "<div class=\"inner d-block p-1 container-title w-50\"><h5 style=\"color:white\">No movies added yet! Go and <a href=\"search.php\"><u>add</u></a> one!</h5></div>";			
				?>				
				
				<div class="separator-gradient"></div>
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
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
	</body>
</html>