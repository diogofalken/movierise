<?php 
include "db_connect.php";
include "DBhelper.php";

if(isset($_POST["email"], $_POST["password"], $_POST["name"]))  {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = md5($_POST["password"]);
  $sql = "INSERT INTO t_users (nome, email, password, data, atualizacao) VALUES ('{$name}', '{$email}', '{$password}', CURRENT_TIMESTAMP(), 'Novo utilizador')";
  
  if(!verificarEmail($email)) {
    if(mysqli_query($conn, $sql)) {
      header("location:../index.php");
    }
  }
  else {
    echo "ERRO";
  }
  mysqli_close($conn);
} 

?>