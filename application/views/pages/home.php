<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>" />
  <title>MovieRise</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top" id="myNav">
    <a class="navbar-brand font-weight-bold" id="logo" href="index.php">movie<span>rise</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <?php if($this->session->userdata("email")) : ?>
        <div class="dropdown show">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $this->session->userdata("nome");?>
          </a>

          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="<?php echo base_url("backoffice"); ?>">Backoffice</a>
            <a class=" dropdown-item" href="<?php echo base_url("authentication/logout"); ?>">Logout</a>
          </div>
        </div>
        <?php else: ?>
        <a class="nav-item nav-link text-light" data-toggle="modal" data-target="#login-modal">Sign In</a>
        <a class="nav-item nav-link text-light bg-primary" data-toggle="modal" data-target="#sign-up-modal">Sign Up</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>
  <!-- Login Form Modal -->
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">
            Login
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('authentication/login')?>" method="post">
            <div class="form-group">
              <input type="email" class="form-control" name="email" id="exampleFormControlInput1"
                placeholder="Email..." />
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" id="exampleFormControlInput2"
                placeholder="Password..." />
            </div>
            <button type="submit" class="btn btn-primary w-100">
              Login
            </button>
          </form>
        </div>
        <div class="modal-footer">
          <div class="container">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Cancel
            </button>
            <span class="psw float-right mt-2">Forgot
              <a href="#" data-dismiss="modal" data-toggle="modal"
                data-target="#forget-password-modal">password?</a></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Form Modal -->
  <!-- Forget Password Modal -->
  <div class="modal fade" id="forget-password-modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">
            Forget Password
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('authentication/forgetPassword')?>" method="post">
            <p>
              Forgot your password? Please enter your email and the new password.
            </p>
            <div class="form-group">
              <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                placeholder="Email..." />
              <input type="password" name="password" class="form-control" id="exampleFormControlInput1"
                placeholder="Password..." />
            </div>
            <button type="submit" class="btn btn-primary w-100">
              Send
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Form Modal -->
  <!-- Sign Up Form Modal -->
  <div class="modal fade" id="sign-up-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">
            Sign Up
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('authentication/register')?>" method="post"
            onsubmit="return validation(this)">
            <div class="form-group">
              <input type="text" class="form-control" id="exampleFormControlInput1" name="name"
                placeholder="Username..." />
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="exampleFormControlInput2" name="email"
                placeholder="Email..." />
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="exampleFormControlInput3" name="password"
                placeholder="Password..." />
            </div>
            <button type="submit" class="btn btn-primary w-100">
              Sign up
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Form Modal -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php echo base_url('assets/images/creed2.jpg')?>" class="d-block w-100 vh-100" alt="Creed 2" />
      </div>
      <div class="carousel-item">
        <img src="<?php echo base_url('assets/images/Bohemian_Rhapsody.jpg')?>" class="d-block w-100 vh-100"
          alt="Bohemian Rhapsody " />
      </div>
      <div class="carousel-item">
        <img src="<?php echo base_url('assets/images/vikings.jpg')?>" class="d-block w-100 vh-100" alt="Vikings" />
      </div>
    </div>
    <a class="carousel-control-prev " href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <h2 class="title">Filmes</h2>
  <hr />
  <div class="container">
    <div class="row">
      <?php 
        foreach($media as $movie) {
          echo '<div class="col-md-3 mb-3">
          <img class="card-img-top img-fluid" src="' . $movie->poster . '" alt="Card image cap">
          <div class="card-body text-center">
            <h5 class="card-title">' . $movie->nome .'</h5><hr>
            <p class="card-text ">' . $movie->descricao .'</p>
            <p class="card-text"><small class="text-muted">' . $movie->data .'</small></p>
          </div>
        </div>';
        }
        
      ?>
    </div>
  </div>
  <footer class="page-footer font-small blue">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
      © 2018 Copyright:
      <a href="https://github.com/diogofalken" target="_blank">
        Diogo Marques</a>
    </div>
    <!-- Copyright -->
  </footer>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="<?php echo base_url('assets/js/script.js')?>"></script>
</body>

</html>