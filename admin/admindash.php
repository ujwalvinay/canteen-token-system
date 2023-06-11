<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<!-- font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  	
	<style type="text/css">
		body
		{
			background:#161616;
		}
		.abc button{
			width: 350px;
			font-size: 20px;
		}
		.admin-btn
		{
			background: rgb(34,213,120);
			background: linear-gradient(135deg, rgba(34,213,120,1) 0%, rgba(6,159,79,0.8744747899159664) 100%);
			color:white;
			font-weight: 500;
		}
	</style>
</head>
<body>
	<div align="center" class="text-light pt-4 pb-4">
		<a href="../logout.php"><button style="float: right;" class="btn btn-danger mr-3"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i></button></a>
		<a href="../index.php"><button style="float: left;" class="btn  ml-3"><img src="./assets/Home.svg"/></button></a>
		<h1>WELCOME TO ADMIN DASHBOARD</h1>	
	</div>

	<div align="center" class="mt-5 abc" style="padding-top: 50px;">
		<a href="addnewitem.php"><button class="btn btn-lg admin-btn">ADD ITEM</button></a><br><br>
		<a href="updateitem.php"><button class="btn btn-lg admin-btn">UPDATE ITEM</button></a><br><br>
		<a href="deleteitem.php"><button class="btn btn-lg admin-btn">DELETE ITEM</button></a><br><br>
		<a href="menudb.php"><button class="btn btn-lg admin-btn">MENU DETAIL</button></a><br><br>
		<a href="orderdetail.php"><button class="btn btn-lg admin-btn">ORDER DETAIL</button></a><br><br>
		<a href="customerdb.php"><button class="btn btn-lg admin-btn">CUSTOMER DETAIL</button></a>		
	</div>
	



	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>

</body>
</html>