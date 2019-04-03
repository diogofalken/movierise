<?php 
  include "db_connect";
  
  function verificarEmail($email, $password = "") {
    if($password == "") {
      $sql = "SELECT email FROM t_users WHERE email = '".$email."'";
      $result = mysqli_query($conn, $sql);
      
      if(mysqli_num_rows($result) > 0) {
        mysqli_close($conn);
        return True;
      }
    }
    else{
      $sql = "SELECT email FROM t_users WHERE email = '".$name."' AND  password = '".$password."'";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0) {
        mysqli_close($conn);
        return True;
      }
    }
    mysqli_close($conn);
    return False;
  }

  function verificarFilme($nome) {
    $sql = "SELECT nome FROM t_movies WHERE nome = '".$nome."'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
      mysqli_close($conn);
      return True;
    }
    mysqli_close($conn);
    return False;
  }
?>