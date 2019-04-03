<?php
include "db_connect.php";
include "DBhelper.php";

if(isset($_POST["movie_name"]))  {
  $name = $_POST["movie_name"];
  $jsonurl = "http://www.omdbapi.com/?i={$name}&apikey=a4c49050";
  $json = file_get_contents($jsonurl);
  $jsondata = json_decode($json, true);

  $titulo = $jsondata['Title'];
  $descricao = $jsondata['Plot'];
  $poster = $jsondata['Poster'];

  $sql = "INSERT INTO t_movies (nome, descricao, poster, data) VALUES ('{$titulo}','{$descricao}', '{$poster}', CURRENT_TIMESTAMP())";

  if(!verificarFilme($titulo)) {
    if(mysqli_query($conn, $sql)) {
    }
  }
  else {
    echo 'Error inserting record: ' . mysqli_error($conn);
  }
  mysqli_close($conn);
}
?>