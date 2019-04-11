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
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/backoffice.css')?>" />
  <title>MovieRise | Backoffice</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="myNav">
    <a class="navbar-brand font-weight-bold" id="logo" href="#">movie<span>rise</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <div class="dropdown show">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $this->session->userdata("nome");?>
          </a>

          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#media_table">Media</a>
            <a class="dropdown-item" href="#client_table">Clients</a>
            <a class=" dropdown-item" href="<?php echo base_url("authentication/logout"); ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <div class="container my-5">
    <div class="row">
      <div class="col-md-4 h2 text-center text-md-left">
        Itens
      </div>
      <div class="col-md-4 input-group">
        <input type="text" class="form-control h-100" aria-label="Search" placeholder="Search to add movie"
          aria-describedby="search-icon" id="pesquisar" name="pesquisar" />
        <div class="input-group-append" id="search_div">
          <i class="fas fa-search input-group-text" id="search-icon"></i>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- Search Table -->
  <table id="table" class="table text-center d-none" data-method="post">
    <thead>
      <tr>
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

  <!-- Movie Table -->
  <h2 class="text-center title" id="media_table">Media</h2>
  <section class="table-responsive">
    <table class="table text-center">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Movie Name</th>
          <th scope="col">Description</th>
          <th scope="col">Type</th>
          <th scope="col">Creation Date</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          foreach($media as $movie) {
            echo '<tr>';
            echo '<th scope="row">'.$movie->id.'</th>';
            echo '<td>'.$movie->nome.'</td>';
            echo '<td>'.$movie->descricao.'</td>';
            echo '<td>'.$movie->type.'</td>';
            echo '<td>'.$movie->data.'</td>';
						echo "<td class=\"align-middle\">";
						echo "<div class=\"btn-group\" role=\"group\">";
            echo "<a href=\"#\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"btn btn-success\">View</a>";
            echo anchor('Movie/removeMovie/' . $movie->id, 'Remove', array(
              'rel' => 'noopener noreferrer', 
              'class' =>  'btn btn-danger'
            ));
						echo "</div>";
						echo "</td>";
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </section>
  <!-- End of Movie Table -->
  <!-- Clients Table -->
  <h2 class="text-center title" id="client_table">Clients</h2>
  <section class="table-responsive">
    <table class="table text-center">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Data</th>
          <th scope="col">Atualização</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          foreach($clients as $client) {
            echo '<tr>';
            echo '<td>'.$client->nome.'</td>';
            echo '<td>'.$client->email.'</td>';
            echo '<td>'.$client->data.'</td>';
            echo '<td>'.$client->atualizacao.'</td>';
						echo "<td class=\"align-middle\">";
						echo "<div class=\"btn-group\" role=\"group\">";
            echo anchor('Authentication/removeClient/' . $client->ID, 'Remove', array(
              'rel' => 'noopener noreferrer', 
              'class' =>  'btn btn-danger'
            ));
						echo "</div>";
						echo "</td>";
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </section>
  <!-- End of Clients Table -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.js"></script>
  <script src="<?php echo base_url('assets/js/script.js')?>"></script>
  <script src="<?php echo base_url('assets/js/admin.js')?>"></script>
</body>

</html>