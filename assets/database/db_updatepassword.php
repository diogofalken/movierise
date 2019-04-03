<?php 
include "db_connect.php";

if(isset($_POST["email"], $_POST["password"])) 
{     
	$email = $_POST["email"]; 	
	$password = md5($_POST["password"]);
	$sql = "SELECT email FROM t_users WHERE email = '".$email."'";
	$result = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result) > 0 )
	{ 
    $sql = "UPDATE t_users SET password = '{$password}', atualizacao = 'Alterar password' WHERE t_users.email = '{$email}'; ";
    if(mysqli_query($conn, $sql)) {
      header("location:../index.php");
    }
	}
	else
	{
		echo '<div style="background-color: rgb(236,100,100,0.2); border: 1px solid red;">
	        <h4 style="color: red; text-align:center;">O Email introduzido não existe na bd</h4>
	       	</div>';
	 
	}
	mysqli_close($conn);
} 
?>