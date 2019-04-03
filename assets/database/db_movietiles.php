<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/backoffice.css" />
  <title>MovieRise | Backoffice</title>
</head>

<body>
  <?php 
    include "db_connect.php";
    
    $sql = "select * from t_movies";

    if($result = mysqli_query($conn, $sql)) {
      echo '<div class="container">';
      echo '<div class="row">';
      while ($row = $result->fetch_assoc()) {
        $field1name = $row["poster"];
        $field2name = $row["nome"];
        $field3name = $row["descricao"];
        $field4name = $row["data"];
        
        echo '<div class="col-md-3 mb-3">
          <img class="card-img-top img-fluid" src="' . $field1name . '" alt="Card image cap">
          <div class="card-body text-center">
            <h5 class="card-title">' . $field2name .'</h5><hr>
            <p class="card-text ">' . $field3name .'</p>
            <p class="card-text"><small class="text-muted">' . $field4name .'</small></p>
          </div>
        </div>';
      }
      echo '</div></div>';
    }
    mysqli_close($conn);
?>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.js"></script>
</body>