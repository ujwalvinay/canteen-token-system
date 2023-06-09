<?php
	include('../dbcon.php');
	session_start();

	if (isset($_SESSION['uid'])) 
	{
		header('location: index.php');
	}
	else
	{
		
	}
	
	if(isset($_POST['add_to_cart']))
	{
		header('location: ../login.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Canteen Token System</title>
	<!-- font awesome -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
	<!-- Increament & Decreament JS -->
	<script type="text/javascript" src="../javascript/quantity_inc_dec.js"></script>
	<style>
		body{
			margin: 0px;
			padding: 0px;
			box-sizing: border-box;
			/*background: #0000007a;*/
		}
		.main-menu{
			width: 100%;
			position: relative;
		}
		.inner-menu{
			padding: 25px 15px;
			background: #000000b0;
			color: #fff;
			height: 80px;
			background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('../images/navbar-bg.jpg');
			background-repeat: no-repeat;    
			background-size: cover;
			z-index: -9999;
		}
		.logo{
			position: absolute;
			left: 50%;
			top: 25%;
			content: "";
			-webkit-transform: translate(-50%);
		}
		.logo img{
			height: 50px;
		}
		.inner-menu a{
			color: #fff;
			padding: 5px 10px;
			border-radius: 5px;
			font-weight: 600;
			text-decoration: none;
		}
		.inner-menu a:hover{
			color: #000;
			background-color: #4CAF50;;
			text-decoration: none;	
		}
		.form-control{
			padding: 0!important;
		}
		.card-text{
			font-family: 'Baloo Thambi 2', cursive;
			font-weight: 400;
			line-height: 1.5em;
    		height: 6em;       
    		overflow: hidden;
		}
		.card-title{
			font-family: 'Baloo Thambi 2', cursive;
			font-weight: 600;
		}
		h5{
			font-size: 1.5rem!important;
		}
		.cart-btn{
			background: rgb(34,213,120);
			background: linear-gradient(135deg, rgba(34,213,120,1) 0%, rgba(6,159,79,0.8744747899159664) 100%);
			
		}
		.card{
			border: none;
			box-shadow: 0 0 40px #000000;
		}
		.container
		{
			background-color:#161616;
		}
		.container h2
		{
			text-align:center;
			padding-bottom:20px;
			color:white;
		}
		@media screen and (max-width: 3000px) and (min-width: 300px){
    		.card{
    		  width: 18rem;
    		}
  		}
  		@media screen and (max-width: 480px) and (min-width: 350px){
    		.logo img{
    		  height: 40px;
    		}
  		}
  		@media screen and (max-width: 350px){
    		.logo img{
    		  height: 35px;
    		}
  		}
	</style>
</head>
<body>
	<div class="main-menu sticky-top">
		
		<div class="inner-menu sticky-top">
			<a href="../index.php" style="float: left;"><img src="./assets/Home.svg"/></a>
			<a href="../login.php" style="float: right;">CART 0
			</a>	
		</div>
	</div>
	
	<div class="container" style="padding-top: 40px;">
		<h2>Menu</h2>
		<div class="row">
			<?php 
			$query = "SELECT * FROM `menu`";
			$run = mysqli_query($conn, $query);

			if(mysqli_num_rows($run) < 1)
			{
				echo "No data found";
			}
			else
			{
				$qty = 0;

				while ($data = mysqli_fetch_assoc($run)) 
				{
					$qty++;
					?>
			<div class="col-lg-4 col-md-6 col-12">
				<div class="card" style="margin: 0 auto 30px auto;">
  					<img class="card-img-top img-fluid" src="../dataimg/<?php echo $data['image']; ?>" alt="Card image cap">
  					<div class="card-body">
  			  			<div>
  			  				<span class="text-success" style="float: right;"><?php
											if ($data['type'] == "Veg" || $data['type'] == "veg") 
											{
												?>
													<div><img src="./assets/veg.jpg" style="height: 18px;"></div>
												<?php
											}
											else
											{
												?><div><img src="./assets/non-veg.jpg" style="height: 18px;"></div>
												<?php
											}
										?></span>
  			  				<h5 class="card-title text-uppercase"><?php echo $data['name']; ?></h5>
  			  			</div>
    					<p class="card-text"><?php echo $data['detail']; ?></p>
					
						<div class="row">
							<div class="col-lg-5 col-md-5 col-5">
								<h5 style="font-family: 'Bree Serif', serif;"><?php echo "Rs. ".$data['price']; ?></h5>
							</div>
							<div class="col-lg-7 col-md-7 col-7">
								<form method="post" action="" class="form-inline">
									<input type='button' name='add' onclick='javascript: document.getElementById("<?php echo $qty ?>").value++;' value='+' class="btn btn-success" style="border-radius: 50px; padding: 7px 14px;">

									<input type='text' name='qty1' id='<?php echo $qty ?>' size="1" value="1" class="qty form-control d-inline text-center" style="width: 30%; margin: 0 5px; font-weight: 700; border-radius: 50px" readonnly/>

									<input type='button' name='subtract' onclick=subtractQty(qty1); value='-' class="btn btn-danger"  style="border-radius: 50px; padding: 7px 16px">

									<input type="hidden" name="product_id" value="<?php echo $data['id']; ?>">
							</div>
								<?php

								
								?>

    								<button class="btn cart-btn w-100 mt-4" id="cart" name="add_to_cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
    							</form>
    					</div>
  					</div>
				</div>
			</div>
			<?php
					}
					}
					?>
		</div>
	</div>

	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>
</body>
</html>