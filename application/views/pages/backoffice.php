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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="myNav">
    <a class="navbar-brand font-weight-bold" id="logo" href="backoffice.php">movie<span>rise</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link text-light" href="#">Inicio</a>
        <a class="nav-item nav-link text-light" href="#">Perfil</a>
        <a class="nav-item nav-link text-light" href="index.php">Logout</a>
      </div>
    </div>
  </nav>

  <div class="container my-5">
    <div class="row">
      <div class="col-md-4 h2 text-center text-md-left">
        Itens
      </div>
      <div class="col-md-4 input-group">
        <input type="text" class="form-control h-100" aria-label="Search" placeholder="Search"
          aria-describedby="search-icon" id="pesquisar" name="pesquisar" />
        <div class="input-group-append" id="search_div">
          <i class="fas fa-search input-group-text" id="search-icon"></i>
        </div>
      </div>
      <div class="col-md-4 text-center text-md-right">
        <button type="button" class="btn btn-primary h-100 w-75" id="add_cart">
          Add
        </button>
      </div>
    </div>
  </div>
  </div>
  <!-- Search Table -->
  <table id="table" class="table text-center" data-method="post">
    <thead>
      <tr>
        <th data-checkbox="true" data-field="state"></th>
        <th data-field="Poster" data-formatter="imageFormatter">Poster</th>
        <th data-field="Title">Movie Name</th>
        <th data-field="Year">Description</th>
        <th data-field="Type">IMDB Rating</th>
        <th data-field="imdbID">ID</th>
        <th data-field='commands' data-formatter="operateFormatter" data-events="operateEvents">Commands</th>
      </tr>
    </thead>
  </table>
  <!-- End of Search Table -->

  <section class="table-responsive">
    <table class="table text-center">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Movie Name</th>
          <th scope="col">Description</th>
          <th scope="col">Creation Date</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>

        <?php 
          include "database/db_connect.php";

          $sql = "select * from t_movies";

          if($result = mysqli_query($conn, $sql)) {
            while ($row = $result->fetch_assoc()) {
              $field1name = $row["id"];
              $field2name = $row["nome"];
              $field3name = $row["descricao"];
              $field4name = $row["data"];
              
              echo '<tr>
                      <th scope="row">'.$field1name.'</th>
                      <td>'.$field2name.'</td>
                      <td>'.$field3name.'</td>
                      <td>'.$field4name.'</td>
                      <td>
                        <button type="button" class="btn btn-success">Visualizar</button>
                        <button type="button" class="btn btn-warning">Editar</button>
                        <button type="button" class="btn btn-danger">Excluir</button>
                      </td>
                    </tr>';
            }
          }
          mysqli_close($conn);

          ?>
      </tbody>
    </table>
  </section>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.js"></script>
  <script src="js/script.js"></script>
  <script src="js/admin.js"></script>
</body>

</html>