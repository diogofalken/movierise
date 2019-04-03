<?php
include "db_connect.php";

if(isset($_POST["email"], $_POST["password"])) 
{     
	$name = $_POST["email"]; 	
	$password = md5($_POST["password"]);
	$sql = "SELECT email FROM t_users WHERE email = '".$name."' AND  password = '".$password."'";
	$result = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result) > 0 )
	{ 
		header("location:../backoffice.php");
	}
	else
	{
		echo '<div style="background-color: rgb(236,100,100,0.2); border: 1px solid red;">
	        <h4 style="color: red; text-align:center;">The username or password are incorrect</h4>
	       	</div>';
	 
	}
	mysqli_close($conn);
} 
?>