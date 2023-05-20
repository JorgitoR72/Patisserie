<?php

declare(strict_types=1);
require_once __DIR__ . "/vendor/autoloader.php";
$repository = new Logistic;
$seguridad = new Security;
$seguridad->checkLoggedIn();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menú Vertical Responsivo</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style>
    body {
      font-family: 'Open Sans', sans-serif;
      background-color: #f1dcc2;
    }

    .nav-link {
      color: #8d4925;
      font-weight: bold;
      font-size: 25px;
    }

    .nav-link:hover {
      color: #f1dcc2;
    }

    .nav-pills .nav-link.active {
      background-color: #8d4925;
    }

    .nav-link:focus {
      border-color: #8d4925;
      box-shadow: 0 0 0 0.2rem rgba(206, 108, 55, 0.25);
    }

    .full-height {
      height: 100vh;
    }

    .bg {
      background-color: #c57d56;
    }

    h1 {
      text-align: center;
      color: #8d4925;
      font-weight: bold;
    }

    h2 {
      color: #c57d56;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="container-fluid full-height">
    <div class="row full-height">
      <div class="col-lg-3 col-md-12 bg">
        <div class="d-flex flex-column p-3 h-100">
          <div class="col-md-12 d-lg-none">
            <nav class="navbar navbar-dark bg">
              <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-controls="collapseWidthExample" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div>
            </nav>
          </div>
          <img class="d-none d-lg-block" id="boton-toggle" src="img/Logotipo Restaurante.png" alt="Logo" style="padding-bottom: 20px;">
          <div class="collapse.show" id="collapseWidthExample">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link text-star" id="v-pills-home-tab" href="index.php" role="tab" aria-selected="false"><img src="img/casa1.svg" alt="" style="padding-right: 25px;">INICIO</a>
              <br>
              <button class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false" style="text-align: left;">
                <img src="img/chef.png" alt="" style="padding-right: 25px; width: 75px;">PERFIL
              </button>
              <br>
              <a class="nav-link text-start" id="v-pills-exit-tab" href="exit.php" role="tab" aria-selected="false"><img src="img/salida.png" alt="" style="padding-right: 25px;">SALIR</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-md-12 full-height">
        <div class="container" style="padding: 45px;">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
              <div class="row">
                <div class="col-md-12" style="padding-bottom: 25px;">
                  <h1>Perfil</h1>
                </div>
                <div class="col-lg-6 col-md-12">
                  <h2>DATOS</h2>
                  <label for="nombre">Nombre:</label>
                  <input type="text" class="form-control" id="nombre">
                  <label for="apellidos">Apellidos:</label>
                  <input type="text" class="form-control" id="apellidos">
                  <label for="correo">Correo:</label>
                  <input type="email" class="form-control" id="correo">
                  <br>
                  <h2>SUSCRIPCION</h2>
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                      Seleccionar plan
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <li><a class="dropdown-item" href="#">Básico</a></li>
                      <li><a class="dropdown-item" href="#">Premium</a></li>
                      <li><a class="dropdown-item" href="#">VIP</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-6 col-md-12">
                  <img src="img/perfil.png" alt="Foto de usuario" class="img-fluid" style="width: 150px;">
                  <br>
                  <button class="btn btn-primary mt-3">Editar</button>
                </div>
                <div class="text-end">
                  <button class="btn btn-success mt-3">Guardar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
