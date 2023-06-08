<?php
	
	$conn = mysqli_connect('localhost','root','','food');

	if ($conn == false) 
	{
		echo "Database connection failed";
	}
?>