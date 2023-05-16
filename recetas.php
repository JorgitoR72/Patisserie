<?php

include_once __DIR__ . "/vendor/autoloader.php";
$seguridad = new Security;
$seguridad->checkLoggedIn();

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CAST OF PATISSERIE</title>

  <!-- Logo  -->
  <link rel="icon" type="image/png" href="img/Logotipo Restaurante.png">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

  <!-- Tipo de fuente  -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">

</head>

<body>

  <!-- Barra de navegación -->
  <nav class="navbar navbar-expand-lg navbar-white">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button"
        data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="text-uppercase nav-link" aria-current="page" href="index.php"><strong>Inicio</strong></a>
          </li>
          <li class="nav-item">
            <a class="text-uppercase nav-link" href="recetas.php"><strong>Recetas</strong></a>
          </li>
          <li class="nav-item">
            <a class="text-uppercase nav-link" href="sobreNosotros.php"><strong> Sobre nosotros</strong></a>
          </li>
        </ul>
      </div>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="login.php"><strong> ACCEDER </strong><img src="img/icono_chef.png" alt=""
              style="height: 30px; width: 30px;"></a>
        </li>
      </ul>
    </div>
  </nav>


  <!-- banner -->
  <div class="container d-flex flex-column align-items-center"
    style="position: absolute; top: 10px; left: 0; right: 0; bottom: 0;">
    <div class="banner"></div>
    <img src="img/Logotipo Restaurante.png" alt="" class="img-fluid img-responsive">
    <nav class="navbar">
      <form class="search-form">
        <div class="input-group">
          <input class="form-control form-control-lg search-input" type="text" placeholder="Busca tu receta..."
            aria-label="Search" style="color: #8d4925;">
          <button class="btn btn-warning text-white" style="background-color:#8d4925;"
            type="submit"><img src="img/lupa.png" alt=""></button>
        </div>
      </form>
    </nav>
  </div>
  <br><br>

  <div class="recetas">
    <div class="container" style="margin-top: 250px;">
      <div class="row">
        <div class="col-xl-3 col-md-3 col-sm-12">
            <img src="img/bizcocho.jpg" alt="Bizcocho de chocolate" class="img-fluid" style="height: 200px; width: 500px;">
        </div>
  
        <div class="col-xl-9 col-md-9 col-sm-12" style="background-color: white; text-align: justify; color: #8d4925;">
            <h1>Bizcocho de chocolate</h1>
            <p>El bizcocho de Chocolate es un plato de cuchara buenísimo que no puede faltar en ningún recetario de pastelería caseras. Puedes prepararlo con el chocolate que gustes y además puedes añadirle diferentes tipos de chocolates, ¡es muy versátil y lo puedes personalizar como más te guste!</p>
            <div style="text-align: right;">
                <a href="ingredientes.html">
                    <button type="button" class="btn btn-lg" style="background-color: #c57d56; color: white;">Cocinar</button>
                </a>
            </div>
        </div>
      </div><br>

      <div class="row">
        <div class="col-xl-3 col-md-3 col-sm-12">
            <img src="img/bizcocho.jpg" alt="Bizcocho de chocolate" class="img-fluid" style="height: 200px; width: 500px;">
        </div>
  
        <div class="col-xl-9 col-md-9 col-sm-12" style="background-color: white; text-align: justify; color: #8d4925;">
            <h1>Bizcocho de chocolate</h1>
            <p>El bizcocho de Chocolate es un plato de cuchara buenísimo que no puede faltar en ningún recetario de pastelería caseras. Puedes prepararlo con el chocolate que gustes y además puedes añadirle diferentes tipos de chocolates, ¡es muy versátil y lo puedes personalizar como más te guste!</p>
            <div style="text-align: right;">
                <a href="ingredientes.html">
                    <button type="button" class="btn btn-lg" style="background-color: #c57d56; color: white;">Cocinar</button>
                </a>
            </div>
        </div>
      </div><br>
      <div class="row">
        <div class="col-xl-3 col-md-3 col-sm-12">
            <img src="img/bizcocho.jpg" alt="Bizcocho de chocolate" class="img-fluid" style="height: 200px; width: 500px;">
        </div>
  
        <div class="col-xl-9 col-md-9 col-sm-12" style="background-color: white; text-align: justify; color: #8d4925;">
            <h1>Bizcocho de chocolate</h1>
            <p>El bizcocho de Chocolate es un plato de cuchara buenísimo que no puede faltar en ningún recetario de pastelería caseras. Puedes prepararlo con el chocolate que gustes y además puedes añadirle diferentes tipos de chocolates, ¡es muy versátil y lo puedes personalizar como más te guste!</p>
            <div style="text-align: right;">
                <a href="ingredientes.html">
                    <button type="button" class="btn btn-lg" style="background-color: #c57d56; color: white;">Cocinar</button>
                </a>
            </div>
        </div>
      </div>
    </div>
    </div>

  <!-- Footer Start -->
  <div class="container-fluid bg-dark text-white py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
    <div class="row pt-5">
      <div class="col-12 mb-4 px-4">
        <div class="row mb-5 p-4" style="background: rgba(256, 256, 256, .05);">
          <div class="col-md-4">
            <div class="text-md-center">
              <h5 class=" text-uppercase mb-2" style="color: #c57d56; letter-spacing: 5px;">Ubicación</h5>
              <p class="mb-4 m-md-0">Catarroja (Valencia)</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="text-md-center">
              <h5 class="text-uppercase mb-2" style="color: #c57d56; letter-spacing: 5px;">Email</h5>
              <p class="mb-4 m-md-0">castofpatisseries@gmail.com</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="text-md-center">
              <h5 class="text-uppercase mb-2" style="color: #c57d56;  letter-spacing: 5px;">Teléfono</h5>
              <p class="m-0">+34 695 27 98 15</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Redes Sociales -->
      <div id="redes-sociales">
        <ul>
          <li><img src="img/twitter.png"  alt="logo twitter"></li>
          <li><img src="img/facebook.png" alt="logo facebook"></li>
          <li><img src="img/instagram.png" alt="logo instagram"></li>
          <li><img src="img/youtube.png" alt="logo youtube"></li>
        </ul>
        
      </div>

      <iframe
        src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3082.916006333715!2d-0.41517118499639205!3d39.40340627456383!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sla%20florida%20universidad%20catarroja!5e0!3m2!1ses!2ses!4v1680705316032!5m2!1ses!2ses"
        width="1100" height="500" style="border:10;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
  </div>
  </div>
  <div class="container-fluid bg-dark text-white text-center border-top py-4 px-sm-3 px-md-5"
    style="border-color: rgba(256, 256, 256, .05) !important;">
    <p class="m-0 text-white">&copy; <a href="#">CAST OF PATISSERIES</a>. Diseñado por Grupo 3 <a href=""></a></p>
  </div>
  <!-- Footer End -->
  <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>