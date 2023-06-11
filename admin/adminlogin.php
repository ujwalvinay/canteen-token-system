<?php
	
	session_start();

	if (isset($_SESSION['aid'])) 
	{
		header('location: admindash.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title> Canteen Admin Login </title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Unbounded:wght@300;400;500;600;700&display=swap');
	body
	{
		background-color:#161616;
		display:flex;
		flex-direction:column;
		align-items:center;
		justify-content:center;
		height:100vh;
	}
	h1
	{
		font-family: 'Poppins', sans-serif;
	}
	.admin-navbar
	{
		position:fixed;
		top:0;

	}
	.login-session
	{
		background-color:white;
		color:black;
		width:max-content;
		padding:2rem 4rem;
		border-radius:10px;
		
	}
	
	tr
	{
		padding-block:1rem;
	}
	.container form
	{
		display:flex;
		flex-direction:column;
		width:20rem;
		gap:1rem;
		justify-content:center;
		align-items:center;
		margin:auto;
	}
	.admin-login-btn
	{
		padding:.5rem 2rem;
		border:none;
		border-radius:10px;
		background: rgb(34,213,120);
			background: linear-gradient(135deg, rgba(34,213,120,1) 0%, rgba(6,159,79,0.8744747899159664) 100%);
			color:white;
			font-weight: 600;
	}
</style>
</head>
<body>

	<div class=" pt-3 pb-3 admin-navbar" style="padding:1rem 2rem">
		<a href="../index.php"><button type="button" class="btn btn-success ml-3" style="float:right;"><img src="./assets/Home.svg"/></button></a>
		<a href="../login.php"><button type="button" class="btn btn-light mr-3" style="float:left;"><<</button></a>
		
	</div>
	<div class="login-session">
		<div class="mt-1  container text-center ">
			<h1>ADMIN LOGIN</h1>
		</div>

		<div class="container mt-1 pt-5">
			
			<form action="adminlogin.php" method="post">
				<input type="text" name="uname" value="admin" required>
				
				<input type="password" name="pass" value="admin" required>

				<input type="submit" name="login" value="Login" class="mt-2 admin-login-btn">

				
			</form>
		</div>

	</div>

	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>
</body>
</html>

<?php
	
	include('../dbcon.php');

	if (isset($_POST['login'])) 
	{
		$uname = $_POST['uname'];
		$pass = $_POST['pass'];

		$query = "SELECT * FROM `admin` WHERE `username` = '$uname' AND `password` = '$pass'";
		$run = mysqli_query($conn, $query);
		$row = mysqli_num_rows($run);

		if($row < 1)
		{
			?>
				<script>
					alert("Username and Password not match");
					window.open('adminlogin.php', '_self');
				</script>
			<?php
		}
		else
		{
			$data = mysqli_fetch_assoc($run);

			$id = $data['id']; 

			$_SESSION['aid'] = $id;

			header('location: admindash.php');
		}
	}
	
?>