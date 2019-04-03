<?php 
include "db_connect.php";
include "DBhelper.php";

if(isset($_POST["movie_name"], $_POST["description"]))  {
  $name = $_POST["movie_name"];
  $description = $_POST["description"];
  $sql = "INSERT INTO t_movies (nome, descricao, data) VALUES ('{$name}', '{$description}', CURRENT_TIMESTAMP())";
  
  if(!verificarFilme($name)) {
    if(mysqli_query($conn, $sql)) {
      header("location:../backoffice.php");
    }
  }
  else {
    echo "ERRO";
  }
  mysqli_close($conn);
} 

?>