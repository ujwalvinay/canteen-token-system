<?php
	
	session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login</title>
	<!-- font awesome -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<style>
		body{
			margin: 0;
			padding: 0;
			background: #1E1E1E;
			background-repeat: no-repeat;    
			background-size: cover;
			box-sizing: border-box;
			z-index: -9999;
			height: 100vh;
		}
		}	
		a{
			text-decoration: none;
		}
		a:hover{
			text-decoration: none;
		}
		.wrap{
			top: 25%;
			position: relative;
			max-width: 350px;
			border-radius: 20px;
			margin: auto;
			/* background: #30CA7A; */
			padding: 20px 40px;
			color: #fff;
			box-sizing: border-box;
			z-index: 999;		
		}
		h2{
			text-align: center;
		}
		h6{
			text-align: center;
			padding: 5px 1px;
		}
		input[type=text], input[type=number], input[type=email], input[type=text], textarea, input[type=password]{
			width: 100%;
			box-sizing: border-box;
			padding: 12px 5px;
			padding-left:20px;
			outline: none;
			border: none;
			border-bottom: 1px solid #fff;
			color: #000;
			border-radius: 15px;
			margin:15px 5px;
		}
		input[type=submit]{
			width: 100%;
			box-sizing: border-box;
			padding: 10px 0;
			margin: 30px 0;
			outline: none;
			border: none;
			background: rgb(34,213,120);
			background: linear-gradient(135deg, rgba(34,213,120,1) 0%, rgba(6,159,79,0.8744747899159664) 100%);
			border-radius: 20px;
			font-size: 20px;
			color: #fff;
			font-weight: 600;
		}
		
		h6
		{
			opacity: .7;
		}
		.signup-link
		{
			color:#30CA7A;
			opacity: 1 !important;
		}
		.login-title
		{
			display:flex;
			
			align-items:center;
		}
		.login-title h2
		{
			text-align:left;
		}
	</style>
</head>
<body>
	<div style="float: right;" class="mt-3 mr-3">
		<a href="admin/adminlogin.php"><button class="btn btn-primary">ADMIN</button></a>
	</div>
	<div class="wrap">
		<div class="login-title">
			<h2>Welcome<br>Back</h2>
			<img src="./javascript/images/welcome.svg" class="welcome-image"/>
		</div>
		<form action="login.php" method="post">
			<input class="" type="email" name="uname" placeholder="Email" value="" required>
			
			<input class="" type="password" name="pass" placeholder="Password" value="" required>

			<input type="submit" name="login" value="Login" class="">

			<h6 class="pt-3 ">Don't have an Acccount? <a href="register.php" class="signup-link">Sign Up</a></h6>
		</form>
	</div>
	
	
	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>
</body>

<?php

	if (isset($_POST['login'])) 
	{
		include('dbcon.php');

		$uname = $_POST['uname'];
		$password = $_POST['pass'];

		$query = "SELECT * FROM `user` WHERE `email` = '$uname' AND `password` = '$password'";
		$run = mysqli_query($conn, $query);

		$row = mysqli_num_rows($run);

		if ($row < 1) 
		{
			?>

			<script>
				alert("Username & Password not match!");
				window.open('login.php','_self');
			</script>

			<?php
		}
		else
		{
			$data = mysqli_fetch_assoc($run);
			$id = $data['id'];

			$_SESSION['uid'] = $id;

			?>
				<script>
					window.open('index.php?uid=<?php echo $id ?>','_self');
				</script>
			<?php

		}
	}

?>