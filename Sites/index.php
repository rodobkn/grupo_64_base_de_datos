<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.html');   ?>

<body id="page-top">


  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Consultas de viajes</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#register">Registrarse</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!------------ LOGIN  ---------------->        
  <section id="login">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">

          <h1>Login</h1>
          <p class="lead">Logeate y disfruta del servicio.</p>

                                <!-- CAMBIAR AL PHP DE LOGIN-->
          <form align="center" action="login_felipe/authenticate.php" method="post">

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Username</span>
              </div>
              <input type="text" name="username" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" required>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Contraseña</span>
              </div>
              <input type="text" name="password" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" required>
            </div>

            <br>
            <input type="submit" class="btn btn-outline-info" value="Login">
          </form>
        
        </div>
      </div>
    </div>
  </section>


  <!------------ REGITRO----------------->         
  <section id="register">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
 
          <h1>Registrarse</h1>
          <p class="lead">Aquí podrás registrarte para acceder a un mejor servicio.</p>
          
                                <!-- cambiar al php de registro-->
          <form align="center" action="register_felipe/registrar.php" method="post">

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Nombre</span>
              </div>
              <input type="text" name="nombre" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Username</span>
              </div>
              <input type="text" name="username" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" required>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Contraseña</span>
              </div>
              <input type="text" name="password" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" required>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Correo</span>
              </div>
              <input type="text" name="correo" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" required>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Dirección</span>
              </div>
              <input type="text" name="direccion" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" required>
            </div>

            <input type="submit" class="btn btn-outline-info" value="Registrar">
          </form>

        </div>
      </div>
    </div>
  </section>



  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Grupo 64</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="js/scrolling-nav.js"></script>

</body>

</html>
