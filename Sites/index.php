<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.html');   ?>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Colecciones de arte</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Consultas simples</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Consultas con ingreso</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contacto</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('images_bdd/tierra.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Bienvenido a la mejor base de datos de colecciones de arte!</h2>
          <p class="lead">Aquí podrás encontrar información de distintas obras de arte del mundo entero. Además de los lugares en donde se encuentran para que puedas diseñar tu aventura.</p>
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('https://source.unsplash.com/bF2vsubyHcQ/1920x1080')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Second Slide</h2>
          <p class="lead">This is a description for the second slide.</p>
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('https://source.unsplash.com/szFUQoyvrxM/1920x1080')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Third Slide</h2>
          <p class="lead">This is a description for the third slide.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>
  </header>


  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h1>Consultas simples</h1>
          <p class="lead">En esta sección, podrás hacer consultas simples, es decir, que no tienes que hacer un ingreso de ningún dato, simplemente consultar. Por lo que podrás encontrar las consultas 1, 2, 4, 6 de la entrega 2 para grupos pares.</p>
          
          <h4><span class="font-weight-bold">1)</span> Se muestra todas las obras de arte disponibles, con distinto nombre.</h4>

          <form align="center" action="consultas/consulta_1.php" method="post">

            <input type="submit" class="btn btn-outline-dark" value="Consultar">
            
          </form>

          <br>
          <br>

          <h4><span class="font-weight-bold">2)</span> Se muestra todos los nombres de las plazas que contengan al menos una escultura del gran "Gian Lorenzo Bernini".</h4>

          <form align="center" action="consultas/consulta_2.php" method="post">

            <br>

            <input type="submit" class="btn btn-outline-info" value="Consultar">
          </form>

          <br>
          <br>

          <h4><span class="font-weight-bold">4)</span> A continuación se podrá consultar a los artistas, junto con la cantidad de obras que tienen respectivamente.</h4>

          <form align="center" action="consultas/consulta_4.php" method="post">

            <br>
            <input type="submit" class="btn btn-outline-dark" value="Consultar">
          </form>
        
          <br>
          <br>

          <h4><span class="font-weight-bold">6)</span> A continuación se podrá consultar el lugar que contiene obras de todos los periodos 
            existentes en la base de datos.</h4>
          
            <form align="center" action="consultas/consulta_6.php" method="post">
              <br>
              <input type="submit" class="btn btn-outline-info" value="Consultar">
            </form>


        </div>
      </div>
    </div>
  </section>

  <section id="services" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Consultas con ingreso</h2>
          <p class="lead">En esta sección podrás hacer consultas con distintos datos que quiera ingresar. Por lo que acá están alojadas las consultas 3 y 5 de la entrega 2 de los grupos pares.</p>

          <h4>3) Buscar museos que tengan obras del renacimiento por país.</h4>

          <form align="center" action="consultas/consulta_3.php" method="post">
            <br>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">País</span>
              </div>
              <input type="text" name="pais" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <br/>
            <input type="submit" class="btn btn-outline-dark" value="Buscar">
          </form>
          <br>
          <br>

          <h3>5) Se permite buscar iglesias en el horario de funcionamiento que usted indique. <br>
            Además, se muestran junto a sus frescos.</h3>
            
          
          <form align="center" action="consultas/consulta_5.php" method="post">
            <br>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Ciudad</span>
              </div>
              <input type="text" name="ciudad" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
            </div>
            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Horario apertura</span>
              </div>
              <input type="text" name="horario_1" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Horario de salida</span>
              </div>
              <input type="text" name="horario_2" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <br>

            <input type="submit" class="btn btn-outline-info" value="Buscar">
          </form>


        </div>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Contacto</h2>
          <p class="lead">Nathalie Germani: ngermani@uc.cl <br> Rodolfo Mendoza: rrmendoza@uc.cl</p>
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
