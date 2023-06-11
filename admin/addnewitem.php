<!DOCTYPE html>
<html>
<head>
	<title>Add new Item</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  	
	<style type="text/css">
		body
		{
			background:#161616;
		}
		.abc{
			border-radius: 50px; 
			padding:4rem 8rem;
			background-color: white;
			display:flex;
			flex-direction:column;
			align-items:center;
			width:max-content;
			margin:auto;
		
		}
		form
		{
			margin:auto;
			display:flex;
			flex-direction:column;
			align-items:center;
			justify-content:center;
		}
		input, textarea
		{
			margin-left:1rem;
		}
	</style>

</head>
<body>
	<div align="center" class=" text-light pt-4 pb-4">
		<a href="../logout.php"><button style="float: right;" class="btn btn-danger mr-3"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i></button></a>
		<a href="admindash.php"><button style="float: left;" class="btn btn-light ml-3"><<</button></a>
		<h1>WELCOME TO ADMIN DASHBOARD</h1>	
	</div>


	<div class="text-dark abc">
		<div class="text-center mt-1 pt-5" >
			<h1>ADD NEW ITEM</h1>
		</div>
	
		<table  style="margin-top: 50px;" cellpadding="3">
			<form action="addnewitem.php" method="post" enctype="multipart/form-data">
				<tr>
					<td>Item No.</td>
					<td>
						<input type="number" name="item_no" required>
					</td>
				</tr>
				<tr>
					<td>Name</td>
					<td>
						<input type="text" name="name" required>
					</td>
				</tr>
				<tr>
					<td>Type</td>
					<td>
						<input type="text" name="type" required>
					</td>
				</tr>
				<tr>
					<td>Detail</td>
					<td>
						<textarea cols="22" name="detail" required=""></textarea>
					</td>
				</tr>
				<tr>
					<td>Price</td>
					<td>
						<input type="number" name="price" required>
					</td>
				</tr>
				<tr>
					<td>Image</td>
					<td>
						<input type="file" name="simg" required>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<br><input type="submit" name="submit" value="ADD" class="btn btn-success" style="margin-right:	 75px; width: 150px;">
					</td>
				</tr>
			</form>
		</table>
	</div>


	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>
</body>
</html>

<?php
	
	include('../dbcon.php');

	if (isset($_POST['submit'])) 
	{
		$item_no = $_POST['item_no'];
		$name = $_POST['name'];
		$type = $_POST['type'];
		$price = $_POST['price'];
		$detail = $_POST['detail'];
		$imagename = $_FILES['simg'] ['name'];
		$tempname = $_FILES['simg'] ['tmp_name'];

		move_uploaded_file($tempname, "../dataimg/$imagename");

		$query = "INSERT INTO `menu`(`item_no`, `name`, `type`, `detail`, `price`, `image`) VALUES ('$item_no','$name','$type','$detail','$price','$imagename')";
		$run = mysqli_query($conn, $query);

		if ($run == true) 
		{
			?>

			<script type="text/javascript">
				alert("Item Added Successfully!");
			</script>

			<?php
		}
	}

?>