<?php
session_start();

if(isset($_SESSION['userID'])){
	header('location:main.php');
}
else{
	if($_POST){
		include 'connection.php';
		if(isset($_POST['sign_in_btn'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			$query="SELECT * FROM users WHERE username='$username' AND password='$password'";
			$result = mysqli_query($conn,$query);
			if(mysqli_num_rows($result)==1){
				session_start();
				$row = mysqli_fetch_array($result);
				$_SESSION['userID']=$row[0];
				header('location:main.php');
			}
			else{
				echo "<script>alert('Wrong username or password')</script>";
			}
		}
	}
	//$mysqli->close();
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

    <title>MovieScene - Sign in</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
	<link href="css/cover.css" rel="stylesheet"
  </head>

  <body class="text-center" style="background-image:url('img/cover_bright.png');">
	<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
		<header class="masthead mb-auto" style="">
			<div class="inner">
			<h3 class="masthead-brand">MovieScene</h3>
			<nav class="nav nav-masthead justify-content-center">
				<a class="nav-link" href="index.php">Home</a>
				<a class="nav-link active" href="sign_in.php">Sign in</a>
				<a class="nav-link" href="register.php">Register</a>
			</nav>
			</div>
			<div class="inner separator-gradient"></div>
		</header>
	  
		<main role="main" class="inner cover">
			<form class="form-signin" method="POST">
			<img class="mb-4" src="img/moviescene.png" alt="" width="72" height="72">
			<h1 class="h3 mb-3 font-weight-normal text-primary">Sign in</h1>
			<label for="username" class="sr-only">Username</label>
			<input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
			<label for="password" class="sr-only">Password</label>
			<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
		
			<button class="btn btn-lg btn-primary btn-block" type="submit" name='sign_in_btn'>Sign in</button>
			<p class="mt-5 mb-3 text-muted">&copy; 2018</p>
			</form>
		</main>
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
