<?php

include_once __DIR__ . "/vendor/autoloader.php";
$seguridad = new Security;
$acceso = $seguridad->getUserData();
$tipoUsuario = $seguridad->checkAdmin();
if ($tipoUsuario) {
  $pagina = "admin.php";
} else {
  $pagina = "user.php";
}

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

  <!-- Tipo de fuente  -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">

</head>

<body>

  <!-- Barra de navegación -->
  <nav class="navbar navbar-expand-lg navbar-white">
    <div class="container-fluid">
      <button class="navbar-toggler" style="color: #8d4925; border-color: #f1dcc2;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
          <a class="nav-link" href="<?=$pagina?>"><strong> <?= $acceso ?> </strong><img src="img/icono_chef.png" alt="" style="height: 30px; width: 30px;"></a>
        </li>
      </ul>
    </div>
  </nav>

<!-- banner -->
<div class="container d-flex flex-column align-items-center" style="position: absolute; top: 10px; left: 0; right: 0; bottom: 0;">
  <div class="banner"></div>
  <img src="img/Logotipo Restaurante.png" alt="" class="img-fluid img-responsive">
  <nav class="navbar">
    <form class="search-form">
      <div class="input-group">
        <input class="form-control form-control-lg search-input" type="text" id="searchInput" placeholder="Busca tu receta..." aria-label="Search" style="color: #8d4925;">
        <button class="btn btn-warning text-white" style="background-color:#8d4925;" type="button" onclick="searchInPage()"><img src="img/lupa.png" alt=""></button>
      </div>
    </form>
  </nav>
</div>
<br><br>
<!-- Script de Java que hace la funcionabilidad de buscar las palabras que nosotros le pongamos en el buscador -->
<script>
  function searchInPage() {
    var searchTerm = document.getElementById('searchInput').value.toLowerCase();
    var content = document.documentElement.innerHTML.toLowerCase();
    
    if (content.includes(searchTerm)) {
      window.find(searchTerm);
    } else {
      /* En caso de que la palabra no se encuentre saltará un aviso  */
      alert('La palabra buscada no se encontró en la página.');
    }
  }
</script>


  <!-- Carousel -->
  <div class="container px-5" style="margin-top: 250px;">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row">
            <div class="col-md-6">
              <img class="img-fluid" src="img/carrusel_1.jpg" class="d-block w-100" alt="Imagen 1">
            </div>
            <div class="col-md-6">
              <table>
                <thead>
                  <tr>
                    <th>PLAN BASICO</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <p>&#9733; Acceso a 10 recetas de pasteles variados y originales.</p>
                      <p>&#9733; Este plan es total mente gratuito, lo que lo hace accesible para aquellos que buscan ahorrar dinero mientras disfrutan de nuevas recetas.</p>
                      <p>&#9733; El plan básico se enfoca en recetas fáciles de preparar, ideales para principiantes en la cocina o personas con poco tiempo disponible.
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td>GRATIS</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row">
            <div class="col-md-6">
              <img class="img-fluid" src="img/carrusel_2.jpg" class="d-block w-100" alt="Imagen 2">
            </div>
            <div class="col-md-6">
              <table>
                <thead>
                  <tr>
                    <th>PLAN BASICO</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <p>&#9733; Acceso a 20 recetas de pasteles variados y originales.</p>
                      <p>&#9733; Incluye recetas de pasteles sin gluten, veganos, con frutas, con chocolate y más.</p>
                      <p>&#9733; El plan premium esta creado para las personas que ya tiene experiencia en la cocina y quieren seguir aprendiendo y descubriendo nuevas recetas.
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td>AÑO 10 €</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row">
            <div class="col-md-6">
              <img src="img/carrusel_3.jpg" class="d-block w-100" alt="Imagen 3" style="height: auto; width: 300px;">
            </div>
            <div class="col-md-6">
              <table>
                <thead>
                  <tr>
                    <th>PLAN VIP</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <p>&#9733; Acceso a 30 recetas de pasteles variados y originales.</p>
                      <p>&#9733; Este plan se enfoca en utilizar ingredientes de alta calidad y orgánicos, lo que garantiza platos deliciosos y saludables.</p>
                      <p>&#9733; El plan VIP esta enfocado a las personas expertas en la cocina que quieren seguir mejorando y perfeccionando la técnica de las recetas.
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td>AÑO 20 €</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
      </button>
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
      <div id="redes-sociales">
        <ul>
          <li><a href="https://twitter.com" target="_blank"><img src="img/twitter.png" alt="logo twitter"></a></li>
          <li><a href="https://www.facebook.com" target="_blank"><img src="img/facebook.png" alt="logo facebook"></a></li>
          <li><a href="https://www.instagram.com" target="_blank"><img src="img/instagram.png" alt="logo instagram"></a></li>
          <li><a href="https://www.youtube.com" target="_blank"><img src="img/youtube.png" alt="logo youtube"></a></li>
        </ul>
      </div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3082.916006333715!2d-0.41517118499639205!3d39.40340627456383!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sla%20florida%20universidad%20catarroja!5e0!3m2!1ses!2ses!4v1680705316032!5m2!1ses!2ses" width="1100" height="500" style="border:10;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
  </div>
  </div>
  <div class="container-fluid bg-dark text-white text-center border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .05) !important;">
    <p class="m-0 text-white">&copy; <a href="#">CAST OF PATISSERIES</a>. Diseñado por Grupo 3 <a href=""></a></p>
  </div>
  <!-- Footer End -->
  <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>