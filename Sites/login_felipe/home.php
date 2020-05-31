<?php
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	#header('Location: ../index_prueba.php');
	exit;
}
?>


<?php include('../templates/header_2.html');  ?>

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
            <a class="nav-link js-scroll-trigger" href="profile.php">Mi perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- NAVEGACION -->

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h1>Navegacion</h1>
          <p class="lead">En esta sección, se encontrarán todos los puntos de la parte "Navegación" de la Entrega 3.</p>
          <h4><span class="font-weight-bold">1)</span> Consulta por Artistas, página de la obra y página de un lugar.</h4>

          <form align="center" action="../consultas/consulta_por_artista_e3.php" method="post">

            <input type="submit" class="btn btn-outline-dark" value="Ir a tabla de artistas">
            
          </form>

          <br>
          <br>

          <h4>2) Reserva de hoteles.</h4>

          <form align="center" action="../consultas/hoteles/index_hoteles.php" method="post">

            <input type="submit" class="btn btn-outline-dark" value="Ir a nuestros hoteles">
            
          </form>

          <br>
          <br>

          <h4>3) Compra de tickets.</h4>

          <form align="center" action="../tickets/principal_page.php" method="post">

            <input type="submit" class="btn btn-outline-dark" value="Comprar ticket">
            
          </form>

          <br>
          <br>

          <h4>4) Itinerarios(procedimientos almacenados).</h4>

          <form align="center" action="../itinerarios/seleccionar_artistas.php" method="post">

            <input type="submit" class="btn btn-outline-dark" value="Ver itinerarios">
            
          </form>


        </div>
      </div>
    </div>
  </section>




  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
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
