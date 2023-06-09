<?php
session_start();
	if (isset($_SESSION['uid'])) 
	{
		include('dbcon.php');
		$uid = $_SESSION['uid'];
		$query = "SELECT * FROM `user` WHERE `id` = '$uid'";
		$run = mysqli_query($conn, $query);
		$data = mysqli_fetch_assoc($run);
	}
	else{

	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Canteen TOken System</title>
	<!-- font awesome -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css2?family=Knewave&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
	<style>
		body{
			margin: 0px;
			padding: 0px;
			box-sizing: border-box;
		}	
		.main{
			background:#161616;
			background-repeat: no-repeat;    
			background-size: cover;
			/*position: relative;*/
			width: 100vw;
			height: 100vh;
		}
		
		.logout a{
			float: right;
			margin: 15px 2px;
			padding: 5px 10px;
			border-radius: 5px;
			border: 1px solid #F44336;
			font-weight: 600;
			text-decoration: none;
			color: #fff;
			background-color: #F44336;
		}
		
		.log-reg a{
			color: #fff;
			float: right;
			margin: 15px 2px;
			padding: 5px 10px;
			border-radius: 5px;
			border: 1px solid #fff;
			font-weight: 600;
			text-decoration: none;
			
		}
		.log-reg a:hover{
			color: #000;
			background-color: #fff;
			text-decoration: none;	
		}
		.fa:hover{
			color: #000!important;
		}
		.site-title{
			position: absolute;
			top: 45%;
			left: 50%;
			-webkit-transform: translate(-50%);
			transform: translate(-50%, -50%);
			z-index: 2;
			font-family: 'Knewave', cursive;
		}
		.site-title img{
			width:180px;
		}
		
		.site-menu{
			position: absolute;
			top: 80%;
			left: 50%;
			-webkit-transform: translate(-50%);
			transform: translate(-50%, -50%);
			z-index: 2;
			font-family: 'Montserrat', sans-serif;
		}
		.site-menu a{
			border: 1px solid #fff;
    		border-radius: 15px;
    		padding: 12px 35px;
    		margin: 0 5px;
    		outline: none;
    		color: #fff;
    		font-size: 1rem;
    		font-weight: 600;
    		line-height: 1.4;
    		text-align: center;
    		text-decoration: none;
    		transition: 0.2s;
		}
		
		.site-steps{
			position: absolute;
			top: 80%;
			left: 50%;
			-webkit-transform: translate(-50%);
			transform: translate(-50%, -50%);
			z-index: 2;
		}
		.overlay{
			background: #000000c7;
			width: 100vw;
			height: 100vh;
			top: 0;
			left: 0;
			z-index: 1;
		}
		.log-reg
		{
				padding-right:4%;
		}
  		@media screen and (max-width: 968px) and (min-width: 579px){
    		
  		}
  		@media screen and (max-width: 579px){
    		
    		.site-menu{
    			top: 75%;
    		}
			.log-reg
			{
				padding-right:50%;
			}
			.logout
			{
				padding-right:15px;
			}
  		}
	</style>

</head>
<body>
	<div class="main">
		<div class="logout">
			<?php
				if (isset($_SESSION['uid'])) 
				{
					?><a href="logout.php" ><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i></a><?php
				}
				else{
					
				}
			?>
		</div>
		<div class="log-reg">
			<?php
				if (isset($_SESSION['uid'])) 
				{
					?><a href="ulogin/account.php" ><i class="fa fa-user" aria-hidden="true">&nbsp;</i></a><?php
				}
				else{
					?><a href="login.php" >Login/Sign up</a><?php
				}
			?>
		</div>
		
		<div class="site-title">
			<img src="javascript/images/logo.svg"/>
		</div>
		<div class="site-menu">
			<?php
				if (isset($_SESSION['uid'])) 
				{
					?><a href="menu/index.php" >MENU</a><?php
				}else{
					?><a href="menu/menu.php" >MENU</a><?php
				}
				?>
		</div>
		
		<div class="overlay">
		</div>
	</div>

	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>

</body>
</html>