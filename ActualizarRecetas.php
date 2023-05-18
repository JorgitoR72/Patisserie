<?php

declare(strict_types=1);
require_once __DIR__ . "/vendor/autoloader.php";
$repository = new Logistic;
$recipeId = isset($_GET["id"]) ? (int)$_GET["id"] : 0;
if (count($_POST) > 0) {
    try {
        $repository->beginTransaction();

        $data = [
            'idReceta' => $recipeId,
            'idAutor' => 6,
            'idPlan' => (int) $_POST["idPlan"],
            'nombre' => $_POST["nombre"],
            'urlImagen' => $_POST["urlImagen"],
            'urlVideo' => $_POST["urlVideo"],
            'descripcion' => $_POST["descripcion"],
            'preparacion' => $_POST["preparacion"],
            'ingredientes' => []
        ];
        $idIngrediente = $_POST['idIngrediente'];
        $nombreIngredientes = $_POST['nombreIngrediente'];
        $cantidades = $_POST['cantidad'];

        for ($i = 0; $i < count($nombreIngredientes); $i++) {
            $ingrediente = [
                'idIngrediente' => $idIngrediente[$i],
                'nombre' => $nombreIngredientes[$i],
                'cantidad' => (int) $cantidades[$i]
            ];
            $data['ingredientes'][] = $ingrediente;
        }

        $rowsAffectedI = $repository->updateR($data); // Llamar al método "update" del repositorio para actualizar la receta
        header('location:admin.php');

        $repository->commit();
    } catch (PDOException $e) {
        echo "Error de base de datos: " . $e->getMessage();
    }
}
$ingredient = $repository->findIngredient($recipeId);
$recipe = $repository->findRecipe($recipeId);
$plan = $repository->findPlan($recipeId);
$idPlan = $plan->getIdPlan();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin o Autor</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

    <div class="container">
        <form method="post" action="" class="row">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre Receta</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $recipe->getNombre() ?>">
            </div>
            <div class="mb-3">
                <div id="ingredientes-container">
                    <?php echo $repository->drawI($ingredient) ?>
                </div>
                <button type="button" id="agregar-ingrediente" class="btn btn-info">Agregar ingrediente</button>
            </div>
            <div class="mb-3">
                <label for="preparacion" class="form-label">Preparación</label>
                <textarea class="form-control" id="preparacion" rows="3" name="preparacion"><?= $recipe->getPreparacion() ?></textarea>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" rows="3" name="descripcion"><?= $recipe->getDescripcion() ?></textarea>
            </div>
            <div class="mb-3">
                <label for="idPlan" class="form-label">Plan al que pertenece</label>
                <select class="form-select" id="idPlan" name="idPlan">
                    <option value="1" <?= $repository->obtenerSelected(1, $idPlan) ?>>Básico</option>
                    <option value="2" <?= $repository->obtenerSelected(2, $idPlan) ?>>Premium</option>
                    <option value="3" <?= $repository->obtenerSelected(3, $idPlan) ?>>VIP</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="urlVideo" class="form-label">URL Video</label>
                <input type="text" class="form-control" id="urlVideo" name="urlVideo" value="<?= $recipe->getUrlVideo() ?>">
            </div>
            <div class="mb-3">
                <label for="urlImagen" class="form-label">URL Imagen</label>
                <input type="text" class="form-control" id="urlImagen" name="urlImagen" value="<?= $recipe->getUrlImagen() ?>">
            </div>
            <div class="col-auto">
                <a class="btn btn-secondary" href="admin.php" role="submit">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
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