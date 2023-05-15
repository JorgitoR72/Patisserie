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
 <div class="container position-relative">
    <img src="img/Logotipo Restaurante.png" alt="" class="img-fluid" style="width: 250px; position: absolute; top: 0; left: 50%; transform: translate(-50%, -65%); z-index: 2;">
  </div>
  
  <nav class="navbar navbar-expand-lg" style="background-color: #8d4925; position: relative; z-index: 1; margin-top: 100px;">
    <div class="container-fluid">
      <button class="navbar-toggler" style="color: #f1dcc2; border-color: #f1dcc2; background-color: #f1dcc2;" type="button"
        data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="text-uppercase nav-link" aria-current="page" href="index.html" style="color: #f1dcc2;"><strong>Inicio</strong></a>
          </li>
          <li class="nav-item">
            <a class="text-uppercase nav-link" href="recetas.html" style="color: #f1dcc2;"><strong>Recetas</strong></a>
          </li>
          <li class="nav-item">
            <a class="text-uppercase nav-link" href="sobreNosotros.html" style="color: #f1dcc2;"><strong> Sobre nosotros</strong></a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="" style="color: #f1dcc2;"><strong> DETALLES </strong></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br>
  <div class="colores-ingredientes">
  <div class="container">
    <div class="row" id="sobre-nosotros" style="padding: 10px;">
      <div class="col-xl-6 col-md-12">
        <h1>Bizcocho de Chocolate</h1>
        <ul>
            <li>180 g de harina de reposteria</li>
            <li>4 huevos</li>
            <li>40 g de cacao en polvo</li>
            <li>150 g de azúcar</li>
            <li>1 cucharada de levadura química o polvos para hornear</li>
            <li>160 ml de leche</li>
            <li>90 g de mantequilla</li>
            <li>Una pizca de sal</li>
          </ul>
          
      </div>
      <div class="col-xl-4 col-md-4" style="padding: 0;">
        <img src="img/bizcocho.jpg" alt="Historia Empresa" class="img-fluid">
      </div>
    </div>
  </div>
    
  <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>