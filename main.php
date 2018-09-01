<?php
session_start();

//Loading
if(!isset($_SESSION['userID'])){
	header('location:index.php');
}
else{
	if(!isset($_SESSION['first_load'])){
		if(isset($_SESSION['registered'])){
			echo "<script>alert('Registered successfully. Welcome!')</script>";
			$_SESSION['first_load']=false;
		}
		else{
			echo "<script>alert('Welcome back!')</script>";
			$_SESSION['first_load']=false;
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
  </head>
  
  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	            
        <a class="navbar-brand" href="main.php">MovieScene</a>
		<div class="mt-2 mt-md-0">
            <img src="img/moviescene.png" alt="logo" class="logo">
          </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="main.php">Home</a>
            </li>
			<li class="nav-item">
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

    <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            
            <div class="container">
              <div class="carousel-caption text-left">
                <h1><i>Scene</i> a movie?</h1>
                <p>Still overwhelmed by the movie you just saw? Can't wait to rate it and note down your thoughts? Go add it and wait no more!</p>
                <p><a class="btn btn-lg btn-primary" href="search.php" role="button">Add a movie</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            
            <div class="container">
              <div class="carousel-caption">
                <h1>Looking for a movie you've <i>scene</i>?</h1>
                <p>Look through all of the movies you have seen so far, brush up on the plot, specifics, notes and the ratings you had given.</p>
                <p><a class="btn btn-lg btn-primary" href="my_movies.php" role="button">My movies</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            
            <div class="container">
              <div class="carousel-caption text-right">
                <h1>Not enough?</h1>
                <p>Want to learn more about certain movies? Visit the international movie database and search among thousands of movies. Enjoy!</p>
                <p><a class="btn btn-lg btn-primary" href="https://www.imdb.com" role="button" target="_blank">Visit IMDB</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


      <div class="container marketing">

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Like to keep up with trends?<span class="text-muted"> Don't miss out on new trending movies!</span></h2>
            <p class="lead">There are hundreds of movies coming out almost every week but only the few ones make it a headliner. If you consider yourself a <i>block-buster</i> enthusiast and a true Marvel Comics fan - Avengers: Infinity War is a new must see!</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="img/avengers.jpg" alt="Avengers: Infinity War poster">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Good old movie fan?<span class="text-muted"> These ones are old but <text style="color:gold">gold.</text></span></h2>
            <p class="lead">All movies are great but some movies are simply epic and make an impact on many generations afterwards. They may only last a few hours but the beauty behind it lasts a lifetime. Already seen all the good old classics? Go review them on MovieScene.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="img/godfather.jpg" alt="The Godfather poster">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Not the fan of the mainstream?<span class="text-muted"> You're in for a treat!</span></h2>
            <p class="lead">So you've seen a lot of great movies none of your friends have seen. Then someone comes along asking for a recommendation. What a better way of choosing the one then going through your own reviews, notes and ratings right here - on MovieScene. You're welcome.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="img/mandariinid.jpg" alt="The Tangerines poster">
          </div>
        </div>

        <hr class="featurette-divider">

      </div>

      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2018 MovieScene</p>
      </footer>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.min.js"></script>
  </body>
</html>
