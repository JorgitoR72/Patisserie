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
//$seguridad->checkLoggedIn();

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
  <div class="container d-flex flex-column align-items-center"
    style="position: float;">
    <img src="img/Logotipo Restaurante.png" alt="" class="img-fluid img-responsive" style="width: 200px;"></div>

  <!-- Barra de navegación -->
  <nav class="navbar navbar-expand-lg" style="background-color: #8d4925;">
    <div class="container-fluid">
      <button class="navbar-toggler" style="color: #f1dcc2; border-color: #f1dcc2; background-color: #f1dcc2;" type="button"
        data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="text-uppercase nav-link" aria-current="page" href="index.php" style="color: #f1dcc2;"><strong>Inicio</strong></a>
          </li>
          <li class="nav-item">
            <a class="text-uppercase nav-link" href="recetas.php" style="color: #f1dcc2;"><strong>Recetas</strong></a>
          </li>
          <li class="nav-item">
            <a class="text-uppercase nav-link" href="sobreNosotros.php" style="color: #f1dcc2;"><strong> Sobre nosotros</strong></a>
          </li>
        </ul>
      </div>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?=$pagina?>" style="color: #f1dcc2;"><strong> <?= $acceso ?> </strong><img src="img/icono_chef.png" alt=""
              style="height: 30px; width: 30px; "></a>
        </li>
        <?= $seguridad->createExit() ?>
      </ul>
    </div>
  </nav><br>


  <div class="sobre-nosotros">
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-md-6" style="background-color: #8d4925; height: auto; ">
          <h1>HISTORIA DE LA EMPRESA</h1><br>
          <p>Un grupo de amigos amantes de la cocina y la gastronomía quedaban todos los Sábados para cocinar y contar
            sus anécdotas un día uno de ellos propuso crear una página web para compartir con el mundo todas aquellas
            recetas de pastelería que habían cocinado, la idea se llevó a cabo y después de 2 meses la página web ya
            estaba funcionando perfectamente el grupo de amigos se alegraba de aquellos logros y siguieron mejorando y
            aprendiendo nuevas recetas para poderlas compartir con el mundo entero.
          </p>
        </div>
  
        <div class="col-xl-8 col-md-6"><img src="img/historiaEmpresa.jpg" alt="Historia Empresa" class="img-fluid" style="height: 500px;"></div>
      </div><br>
      <div class="row">
        <div class="col-xl-8 col-md-6" style="background-color: #8d4925; height: auto;">
          <h1>NUESTRA MISIÓN</h1><br>
          <p>Nuestra misión es inspirar y facilitar la preparación de comidas deliciosas y nutritivas en los hogares de todo el mundo. Nos esforzamos por ofrecer una amplia variedad de recetas para todos los gustos y necesidades, desde platos rápidos y fáciles para la vida diaria hasta comidas más elaboradas para ocasiones especiales. Además, estamos comprometidos con la promoción de una alimentación saludable y sostenible. En resumen, nuestra misión es ser la mejor página de recetas de pastelería en línea, ayudando a las personas a disfrutar de la comida casera de una manera fácil, saludable y deliciosa.</p>
        </div>
        <div class="col-xl-4 col-md-6"><img src="img/nuestraMision.webp" alt="Historia Empresa" class="img-fluid" style="height: 370px;"> </div>
      </div>
      <br>
      <div class="row">
        <div class="col-xl-4 col-md-6" style="background-color: #8d4925; height: auto;">
          <h1>METAS DE FUTURO</h1><br>
          <p>Tenemos dos principales metas de futuro una es Incorporar opciones de compras: Ofrecer opciones para comprar los ingredientes necesarios para las recetas directamente desde la página, así como recomendaciones de utensilios y equipos de cocina. Y la otra meta es Incluir opciones de interacción social: Permitir a los usuarios compartir sus propias recetas o modificar las existentes, intercambiar ideas y consejos de cocina, y calificar y comentar sobre las recetas.</p>
        </div>
        <div class="col-xl-8 col-md-6"><img src="img/metasDeFuturo.webp" alt="Historia Empresa" class="img-fluid" style="height: 500px;"> </div>
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

      <div id="redes-sociales">
      <ul>
          <li><a href="https://twitter.com" target="_blank"><img src="img/twitter.png" alt="logo twitter"></a></li>
          <li><a href="https://www.facebook.com" target="_blank"><img src="img/facebook.png" alt="logo facebook"></a></li>
          <li><a href="https://www.instagram.com" target="_blank"><img src="img/instagram.png" alt="logo instagram"></a></li>
          <li><a href="https://www.youtube.com" target="_blank"><img src="img/youtube.png" alt="logo youtube"></a></li>
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