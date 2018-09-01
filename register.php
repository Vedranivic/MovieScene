<?php
session_start();

if(isset($_SESSION['userID'])){
	header('location:main.php');
}
else{
	if($_POST){
		include 'connection.php';		
		if(isset($_POST['register_btn'])){
			$firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
			$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$username = mysqli_real_escape_string($conn, $_POST['username']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);
			$password2 = mysqli_real_escape_string($conn, $_POST['password2']);
			
			if($password == $password2) {
				$query_check_email = "SELECT * FROM users WHERE email = '$email'";
				if(mysqli_num_rows(mysqli_query($conn,$query_check_email))==1){
					echo "<script>alert('A user with entered email address already exists!')</script>";
				}
				else{
					$query_check_username = "SELECT * FROM users WHERE username = '$username'";
					if(mysqli_num_rows(mysqli_query($conn,$query_check_username))==1){
						echo "<script>alert('Entered username has already been taken!')</script>";
					}
					else{
						$query_add = "INSERT INTO users(firstname,lastname,email,username,password,role) VALUES('$firstname','$lastname','$email','$username','$password','user')";
						mysqli_query($conn, $query_add);
						$user_result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
						session_start();
						$_SESSION['registered']='true';
						$row = mysqli_fetch_array($user_result);
						$_SESSION['userID']=$row[0];
						header('location:main.php');
					}
				}
			}
			else {
				echo "<script>alert('Entered passwords do not match!')</script>";
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

    <title>MovieScene - Register</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
	<link href="css/cover.css" rel="stylesheet">
  </head>

  <body class="text-center" style="background-image:url('img/cover_bright.png'); height:130%;">
	<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
		<header class="masthead mb-auto" style="">
			<div class="inner">
			<h3 class="masthead-brand">MovieScene</h3>
			<nav class="nav nav-masthead justify-content-center">
				<a class="nav-link" href="index.php">Home</a>
				<a class="nav-link" href="sign_in.php">Sign in</a>
				<a class="nav-link active" href="register.php">Register</a>
			</nav>
			</div>
			<div class="inner separator-gradient"></div>
		</header>
	  
		<main role="main" class="inner cover">
			<form class="form-signin" method="POST" onsubmit="return validateRegForm()">
				<img class="mb-4" src="img/moviescene.png" alt="" width="72" height="72">
				<h1 class="h3 mb-3 font-weight-normal text-primary">Create an account</h1>
				
				<label for="firstname" class="sr-only">First name</label>
				<input type="text" id="firstname" name="firstname" class="form-control" placeholder="First name" required autofocus>
				
				<label for="lastname" class="sr-only">Last name</label>
				<input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last name" required>
				
				<label for="email" class="sr-only">Email</label>
				<input type="email" id="email" name="email" class="form-control" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
				
				<label for="username" class="sr-only">Username</label>
				<input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
				
				<label for="password" class="sr-only">Password</label>
				<input type="password" id="password" name="password" class="form-control" placeholder="Password" pattern=".{8,}" required>
				
				<label for="password2" class="sr-only">Re-type password</label>
				<input type="password" id="password2" name="password2" class="form-control" placeholder="Re-type password" pattern=".{8,}" required>
				
				<button class="btn btn-lg btn-primary btn-block" type="submit" name='register_btn'>Register</button>
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
