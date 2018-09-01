<?php
session_start();

if(isset($_SESSION['userID'])){
	header('location:main.php');
}
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<!-- update icon here -->
    <link rel="icon" href="img/moviescene.ico">

    <title>MovieScene</title>

    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
  </head>

  <body class="text-center" style="background-image:url('img/cover_dark.png'); height:120%">
    <div class="cover-container d-flex w-100 h-120 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">MovieScene</h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="index.php">Home</a>
            <a class="nav-link" href="sign_in.php">Sign in</a>
            <a class="nav-link" href="register.php">Register</a>
          </nav>
        </div>
		<div class="inner separator-gradient"></div>
      </header>

      <main role="main" class="inner cover">
        <h1 class="cover-heading">Seen a movie?</h1>
        <p class="lead"><b>MovieScene</b> is a web page designed for you to keep track of all the movies you've seen, your, ratings, remarks, info, details and much more. What are you waiting for?</p>
        <p class="lead">
          <a href="sign_in.php" class="btn btn-lgcust btn-secondary">Sign in</a>
        </p>
		<p class="lead">Don't have a MovieScene account yet?</p>
		<p class="lead">
			<a href="register.php"><b>Create account</b></a>
		</p>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>Property of <a href="https://www.moviescene.com/about">MovieScene</a></p>
        </div>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
