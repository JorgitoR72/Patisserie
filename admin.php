<?php

include_once __DIR__ . "/vendor/autoloader.php";
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseWidthExample" aria-controls="collapseWidthExample" aria-expanded="false"
                  aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div>
            </nav>
          </div>
          <img class="d-none d-lg-block" id="boton-toggle" src="img/Logotipo Restaurante.png" alt="Logo"
            style="padding-bottom: 20px;">
          <div class="collapse.show" id="collapseWidthExample">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link text-star" id="v-pills-home-tab" href="index.php" role="tab"
                aria-selected="false"><img src="img/casa1.svg" alt="" style="padding-right: 25px;">INICIO</a>
              <br>
              <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile"
                type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"
                style="text-align: left;">
                <img src="img/chef.png" alt="" style="padding-right: 25px; width: 75px;">PERFIL
              </button>
              <br>
              <button class="nav-link" id="v-pills-exit-tab" data-bs-toggle="pill" data-bs-target="#v-pills-exit"
                type="button" role="tab" aria-controls="v-pills-exit" aria-selected="false" style="text-align: left;">
                <img src="img/recetas.png" alt="" style="padding-right: 25px; width: 75px;">RECETAS
              </button>
              <br>
              <a class="nav-link text-start" id="v-pills-exit-tab" href="exit.php" role="tab"
                aria-selected="false"><img src="img/salida.png" alt="" style="padding-right: 25px;">SALIR</a>
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
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                      data-bs-toggle="dropdown" aria-expanded="false">
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
            <div class="tab-pane fade" id="v-pills-exit" role="tabpanel" aria-labelledby="v-pills-exit-tab">
              <div class="container">
                <h1>RECETAS</h1>
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
                    <tr>
                      <td>1</td>
                      <td>pastel</td>
                      <td>Vip</td>
                      <td>img1.png</td>
                      <td>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                          data-bs-target="#editarModal">Editar</button>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                          data-bs-target="#confirmDeleteModal">Eliminar</button>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>tarta</td>
                      <td>Basico</td>
                      <td>img2.png</td>
                      <td>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                          data-bs-target="#editarModal">Editar</button>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                          data-bs-target="#confirmDeleteModal">Eliminar</button>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>pan</td>
                      <td>Basico</td>
                      <td>img3.png</td>
                      <td>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                          data-bs-target="#editarModal">Editar</button>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                          data-bs-target="#confirmDeleteModal">Eliminar</button>
                      </td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>pastel</td>
                      <td>Vip</td>
                      <td>img1.png</td>
                      <td>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                          data-bs-target="#editarModal">Editar</button>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                          data-bs-target="#confirmDeleteModal">Eliminar</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- Modal de confirmación para eliminar -->
              <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar eliminación</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>¿Estás seguro de que deseas eliminar esta receta?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <button type="button" class="btn btn-danger">Eliminar</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Modal de Edición -->
              <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editarModalLabel">Editar Receta</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                        <form>
                          <div class="form-group">
                            <label for="nombreReceta">Nombre de la Receta:</label>
                            <input type="text" class="form-control" id="nombreReceta"
                              placeholder="Ingrese el nombre de la receta" required>
                          </div>
                          <div class="form-group">
                            <label for="preparacion">Preparación:</label>
                            <textarea class="form-control" id="preparacion" rows="3"
                              placeholder="Ingrese los pasos de preparación" required></textarea>
                          </div>
                          <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea class="form-control" id="descripcion" rows="3"
                              placeholder="Ingrese una descripción breve" required></textarea>
                          </div>
                          <div class="form-group">
                            <label for="ingredientes">Ingredientes:</label>
                            <div id="ingredientes">
                              <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Nombre del ingrediente" required>
                                <input type="text" class="form-control" placeholder="Descripción del ingrediente"
                                  required>
                                <div class="input-group-append">
                                  <button class="btn btn-primary" type="button"
                                    onclick="agregarIngrediente()">Agregar</button>
                                  <button class="btn btn-danger" type="button"
                                    onclick="quitarIngrediente()">Quitar</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="plan">Plan al que pertenece:</label>
                            <select class="form-control" id="plan" required>
                              <option value="">Seleccione un plan</option>
                              <option value="1">Plan 1</option>
                              <option value="2">Plan 2</option>
                              <option value="3">Plan 3</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="urlVideo">URL del Video:</label>
                            <input type="text" class="form-control" id="urlVideo"
                              placeholder="Ingrese la URL del video">
                          </div>
                          <div class="form-group">
                            <label for="urlImagen">URL de la Imagen:</label>
                            <input type="text" class="form-control" id="urlImagen"
                              placeholder="Ingrese la URL de la imagen">
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <button type="button" class="btn btn-primary">Guardar</button>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>