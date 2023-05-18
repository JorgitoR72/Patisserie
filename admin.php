<?php

declare(strict_types=1);
require_once __DIR__ . "/vendor/autoloader.php";
$repository = new Logistic;
$seguridad = new Security;
$seguridad->checkLoggedIn();
$page = isset($_GET["page"]) ? (int) $_GET["page"] : null;
if (count($_POST) > 0) {
  try {
    $repository->beginTransaction();

    $data = [
      'idAutor' => (int) $_POST["idAutor"],
      'idPlan' => (int) $_POST["idPlan"],
      'nombre' => $_POST["nombre"],
      'urlImagen' => $_POST["urlImagen"],
      'urlVideo' => $_POST["urlVideo"],
      'descripcion' => $_POST["descripcion"],
      'preparacion' => $_POST["preparacion"],
      'ingredientes' => []
    ];

    $nombreIngredientes = $_POST['nombreIngrediente'];
    $cantidades = $_POST['cantidad'];

    for ($i = 0; $i < count($nombreIngredientes); $i++) {
      $ingrediente = [
        'nombre' => $nombreIngredientes[$i],
        'cantidad' => (int) $cantidades[$i]
      ];
      $data['ingredientes'][] = $ingrediente;
    }

    $rowsAffectedI = $repository->insertR($data); // Llamar al método "insertR" del repositorio para agregar receta
    header('location:admin.php');

    $repository->commit();
  } catch (PDOException $e) {
    echo "Error de base de datos: " . $e->getMessage();
  }
}
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

    thead {
      background-color: #8d4925;
      color: #f1dcc2;
      font-weight: bold;
    }

    tbody tr:nth-child(even) {
      background-color: #c57d56;
    }

    tbody tr:nth-child(odd) {
      background-color: #ffffff;
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
              <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false" style="text-align: left;">
                <img src="img/chef.png" alt="" style="padding-right: 25px; width: 75px;">PERFIL
              </button>
              <br>
              <button class="nav-link active" id="v-pills-exit-tab" data-bs-toggle="pill" data-bs-target="#v-pills-exit" type="button" role="tab" aria-controls="v-pills-exit" aria-selected="false" style="text-align: left;">
                <img src="img/recetas.png" alt="" style="padding-right: 25px; width: 75px;">RECETAS
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
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
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
            <div class="tab-pane fade show active" id="v-pills-exit" role="tabpanel" aria-labelledby="v-pills-exit-tab">
              <div class="container" style="padding: 0;">
                <h1>RECETAS</h1>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>IdReceta</th>
                        <th>Nombre</th>
                        <th>Plan</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php echo $repository->drawR($page, 6) ?>

                    </tbody>
                  </table>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarReceta">Agregar</button>
              </div>

              <!-- Modal de Agregar -->
              <div class="modal fade" id="modalAgregarReceta" tabindex="-1" aria-labelledby="modalAgregarRecetaLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen-md-down">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalAgregarRecetaLabel">Agregar Receta</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="">
                        <div class="mb-3">
                          <label for="nombre" class="form-label">Nombre Receta</label>
                          <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="mb-3">
                          <div id="ingredientes-container">
                            <div class="ingrediente input-group mb-3">
                              <input type="text" class="form-control m-input" name="nombreIngrediente[]" placeholder="Nombre del ingrediente">
                              <input type="text" class="form-control m-input" name="cantidad[]" placeholder="Cantidad">
                              <button type="button" class="btn btn-danger">Quitar</button>
                            </div>
                          </div>
                          <button type="button" id="agregar-ingrediente" class="btn btn-info">Agregar ingrediente</button>
                        </div>
                        <div class="mb-3">
                          <label for="preparacion" class="form-label">Preparación</label>
                          <textarea class="form-control" id="preparacion" rows="3" name="preparacion"></textarea>
                        </div>
                        <div class="mb-3">
                          <label for="descripcion" class="form-label">Descripción</label>
                          <textarea class="form-control" id="descripcion" rows="3" name="descripcion"></textarea>
                        </div>
                        <div class="mb-3">
                          <label for="idPlan" class="form-label">Plan al que pertenece</label>
                          <select class="form-select" id="idPlan" name="idPlan">
                            <option value="1">Básico</option>
                            <option value="2">Premium</option>
                            <option value="3">VIP</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="urlVideo" class="form-label">URL Video</label>
                          <input type="text" class="form-control" id="urlVideo" name="urlVideo">
                        </div>
                        <div class="mb-3">
                          <label for="urlImagen" class="form-label">URL Imagen</label>
                          <input type="text" class="form-control" id="urlImagen" name="urlImagen">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                          <input type="hidden" name="idAutor" value="6">
                          <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const agregarIngredienteBtn = document.getElementById('agregar-ingrediente');
      const ingredientesContainer = document.getElementById('ingredientes-container');

      agregarIngredienteBtn.addEventListener('click', function() {
        const ingredienteDiv = document.createElement('div');
        ingredienteDiv.classList.add('ingrediente', 'input-group', 'mb-3');

        const nombreInput = document.createElement('input');
        nombreInput.type = 'text';
        nombreInput.classList.add('form-control', 'm-input');
        nombreInput.name = 'nombreIngrediente[]';
        nombreInput.placeholder = 'Nombre del ingrediente';

        const cantidadInput = document.createElement('input');
        cantidadInput.type = 'text';
        cantidadInput.classList.add('form-control', 'm-input');
        cantidadInput.name = 'cantidad[]';
        cantidadInput.placeholder = 'Cantidad';

        const quitarBtn = document.createElement('button');
        quitarBtn.type = 'button';
        quitarBtn.classList.add('btn', 'btn-danger');
        quitarBtn.textContent = 'Quitar';

        quitarBtn.addEventListener('click', function() {
          ingredienteDiv.remove();
        });

        ingredienteDiv.appendChild(nombreInput);
        ingredienteDiv.appendChild(cantidadInput);
        ingredienteDiv.appendChild(quitarBtn);

        ingredientesContainer.appendChild(ingredienteDiv);
      });
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>