<?php 
	$conn=mysqli_connect("localhost","root","mezic","olcademy");
	if(mysqli_connect_errno())
	{
		echo "Falied to connection_Falied".mysqli_connect_errno();
	}

?>