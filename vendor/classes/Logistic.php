<?php

class Logistic extends Connection
{

    public function __construct()
    {
        $this->connect();
    }

    /* La función findAll devuelve un array de objetos Receta. Recupera todas las filas de la tabla receta de la base de datos ordenándolas por el campo nombre en el orden especificado en el parámetro $order. El valor de $order es opcional y si no se proporciona, se utiliza el valor predeterminado definido en la función Misc::getOrder(). */
    public function findAll(?string $order, ?string $search): array
    {
        $currentOrder = Misc::getOrder($order);
        $result = [];
        $stmt = $this->conn->prepare("SELECT * FROM receta WHERE nombre LIKE :search ORDER BY nombre $currentOrder");
        $stmt->bindValue(':search', '%' . $search . '%');
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Receta(...$row);
        }
        return $result;
    }

    /* La función find devuelve un solo objeto Receta correspondiente a la fila con el id especificado en el parámetro $id. La consulta SQL se realiza en la tabla receta y se selecciona la fila con el valor de idReceta igual a $id. */
    public function find(int $id): Receta
    {
        $stmt = $this->conn->query("SELECT * FROM receta WHERE idReceta = $id");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Receta(...$row);
    }
    /* Funcion que muestra en el navegador las recetas */
    public function drawReceta(array $recetas, ?int $page, int $elementsPerPage): string
    {
        $currentPage = Misc::getPage($page);
        $lowerLimit = ($currentPage - 1) * $elementsPerPage;
        $upperLimit = $lowerLimit + $elementsPerPage;
        $totalPages = ceil(count($recetas) / $elementsPerPage);

        $output = "";
        for ($element = $lowerLimit; $element < $upperLimit && $element < count($recetas); $element++) {
            $receta = $recetas[$element];

            $output .=      "<div class='row'>";
            $output .=          "<div class='col-xl-3 col-md-3 col-sm-12' style='padding: 0;'>";
            $output .=            "<img src='" . $receta->getUrlImagen() . "' alt='" . $receta->getNombre() . "' class='img-fluid' style='height: 200px; width: 100%; object-fit: cover;'>";
            $output .=         "</div>";
            $output .=         "<div class='col-xl-9 col-md-9 col-sm-12' style='background-color: white; text-align: justify; color: #8d4925;'>";
            $output .= "    <h1>" . $receta->getNombre() . "</h1>";
            $output .= "    <p>" . $receta->getDescripcion() . "</p>";
            $output .= "<div style='text-align: right;'>";
            $output .=    "<a href='ingredientes.php?id=" . $receta->getIdReceta() . "'>";
            $output .=        "<button type='button' class='btn btn-lg' style='background-color: #c57d56; color: white;'>Cocinar</button>";
            $output .=    "</a>";
            $output .= "</div>";
            $output .= "</div>";
            $output .= "</div>";
            $output .=    "<br>";
        }
        //Poner numero de columnas dependiendo la tabla en este caso 7
        $output .= "    <td colspan='7'>" . Misc::getNavigator($currentPage, $totalPages) . "</td>";

        return $output;
    }


    public function insertR(array $data): int|bool
    {
        $stmt1 = $this->conn->query("SELECT MAX(idReceta) AS max_id FROM Receta");
        $id = $stmt1->fetch(PDO::FETCH_ASSOC);
        $maxid = $id["max_id"] + 1;

        // Insertar receta
        $stmt = $this->conn->prepare("INSERT INTO `receta`(`idReceta`, `idAutor`, `nombre`, `urlImagen`, `urlVideo`, `descripcion`, `preparacion`) VALUES (:idReceta,:idAutor,:nombre,:urlImagen,:urlVideo,:descripcion,:preparacion)");
        $stmt->bindParam(':idReceta', $maxid, PDO::PARAM_INT);
        $stmt->bindParam(':idAutor', $data["idAutor"], PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $data["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(':urlImagen', $data["urlImagen"], PDO::PARAM_STR);
        $stmt->bindParam(':urlVideo', $data["urlVideo"], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $data["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(':preparacion', $data["preparacion"], PDO::PARAM_STR);
        $result = $stmt->execute();

        if ($result) {
            // Insertar ingredientes
            foreach ($data["ingredientes"] as $ingrediente) {
                $stmt2 = $this->conn->query("SELECT MAX(idIngrediente) AS max_id FROM Ingrediente");
                $idIngrediente = $stmt2->fetch(PDO::FETCH_ASSOC);
                $maxidIngrediente = $idIngrediente["max_id"] + 1;

                // Insertar el nuevo ingrediente
                $stmt3 = $this->conn->prepare("INSERT INTO `ingrediente`(`idIngrediente`, `nombre`) VALUES (:idIngrediente, :nombre)");
                $stmt3->bindParam(':idIngrediente', $maxidIngrediente, PDO::PARAM_INT);
                $stmt3->bindParam(':nombre', $ingrediente["nombre"], PDO::PARAM_STR);
                $stmt3->execute();

                // Insertar relación RecetaIngrediente
                $stmt4 = $this->conn->prepare("INSERT INTO `recetaingrediente`(`idReceta`, `idIngrediente`, `cantidad`) VALUES (:idReceta, :idIngrediente, :cantidad)");
                $stmt4->bindParam(':idReceta', $maxid, PDO::PARAM_INT);
                $stmt4->bindParam(':idIngrediente', $maxidIngrediente, PDO::PARAM_INT);
                $stmt4->bindParam(':cantidad', $ingrediente["cantidad"], PDO::PARAM_STR);
                $stmt4->execute();
            }

            // Insertar relación PlanRecetas
            $stmt5 = $this->conn->prepare("INSERT INTO `planrecetas` (`idPlan`, `idReceta`) VALUES (:idPlan, :idReceta)");
            $stmt5->bindParam(':idPlan', $data["idPlan"], PDO::PARAM_INT);
            $stmt5->bindParam(':idReceta', $maxid, PDO::PARAM_INT);

            return $stmt5->execute();
        }

        return false;
    }

    public function beginTransaction(): bool
    {
        return $this->conn->beginTransaction();
    }
    public function commit(): bool
    {
        return $this->conn->commit();
    }
    public function findRecipe(int $id): Receta
    {
        $stmt = $this->conn->query("SELECT * FROM Receta WHERE idReceta = $id");
        $row = $stmt->fetch(PDO::FETCH_NUM);
        return new Receta(...$row);
    }
    public function updateR(array $data): int|bool
    {
        $stmtUpdate = $this->conn->prepare("UPDATE Receta SET nombre = :nombre, urlImagen = :urlImagen, urlVideo = :urlVideo, descripcion = :descripcion, preparacion = :preparacion WHERE idReceta = :id");

        $stmtUpdate->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $stmtUpdate->bindParam(":urlImagen", $data['urlImagen'], PDO::PARAM_STR);
        $stmtUpdate->bindParam(":urlVideo", $data['urlVideo'], PDO::PARAM_STR);
        $stmtUpdate->bindParam(":descripcion", $data['descripcion'], PDO::PARAM_STR);
        $stmtUpdate->bindParam(":preparacion", $data['preparacion'], PDO::PARAM_STR);
        $stmtUpdate->bindParam(":id", $data['idReceta'], PDO::PARAM_INT);

        $result = $stmtUpdate->execute();

        if ($result) {
            // Actualizar los ingredientes y cantidades
            foreach ($data['ingredientes'] as $ingrediente) {
                $stmtIngredient = $this->conn->prepare("UPDATE recetaingrediente SET cantidad = :cantidad WHERE idReceta = :idReceta AND idIngrediente = :idIngrediente");
                $stmtIngredient->bindParam(":cantidad", $ingrediente['cantidad'], PDO::PARAM_STR);
                $stmtIngredient->bindParam(":idReceta", $data['idReceta'], PDO::PARAM_INT);
                $stmtIngredient->bindParam(":idIngrediente", $ingrediente['idIngrediente'], PDO::PARAM_INT);
                $stmtIngredient->execute();

                $stmtIngredienteNombre = $this->conn->prepare("UPDATE ingrediente SET nombre = :nombre WHERE idIngrediente = :idIngrediente");
                $stmtIngredienteNombre->bindParam(":nombre", $ingrediente['nombre'], PDO::PARAM_STR);
                $stmtIngredienteNombre->bindParam(":idIngrediente", $ingrediente['idIngrediente'], PDO::PARAM_INT);
                $stmtIngredienteNombre->execute();
            }
        }

        return $result;
    }

    public function deleteR(int $idReceta): bool
    {
        // Eliminar relación PlanRecetas
        $stmt1 = $this->conn->prepare("DELETE FROM `planrecetas` WHERE `idReceta` = :idReceta");
        $stmt1->bindParam(':idReceta', $idReceta, PDO::PARAM_INT);
        $result1 = $stmt1->execute();

        // Eliminar relación RecetaIngrediente y los ingredientes asociados
        $stmt2 = $this->conn->prepare("SELECT `idIngrediente` FROM `recetaingrediente` WHERE `idReceta` = :idReceta");
        $stmt2->bindParam(':idReceta', $idReceta, PDO::PARAM_INT);
        $stmt2->execute();
        $ingredientes = $stmt2->fetchAll(PDO::FETCH_COLUMN);

        $stmt3 = $this->conn->prepare("DELETE FROM `recetaingrediente` WHERE `idReceta` = :idReceta");
        $stmt3->bindParam(':idReceta', $idReceta, PDO::PARAM_INT);
        $result3 = $stmt3->execute();

        $stmt4 = $this->conn->prepare("DELETE FROM `ingrediente` WHERE `idIngrediente` IN (" . implode(',', $ingredientes) . ")");
        $result4 = $stmt4->execute();

        // Eliminar receta
        $stmt5 = $this->conn->prepare("DELETE FROM `receta` WHERE `idReceta` = :idReceta");
        $stmt5->bindParam(':idReceta', $idReceta, PDO::PARAM_INT);
        $result5 = $stmt5->execute();

        // Comprobar si todas las operaciones de eliminación fueron exitosas
        if ($result1 && $result3 && $result4 && $result5) {
            return true;
        }

        return false;
    }

    public function drawR(?int $page, int $elementsPerPage): string
    {
        $currentPage = Misc::getPage($page);
        $lowerLimit = ($currentPage - 1) * $elementsPerPage;
        $upperLimit = $lowerLimit + $elementsPerPage;

        $output = "";

        // Contar el número total de filas
        $totalCountSql = "SELECT COUNT(*) AS total FROM Receta AS r JOIN PlanRecetas AS pr ON r.idReceta = pr.idReceta JOIN PlanSuscripcion AS ps ON pr.idPlan = ps.idPlan";
        $totalCountResult = $this->conn->query($totalCountSql);
        $totalCountRow = $totalCountResult->fetch(PDO::FETCH_ASSOC);
        $totalRows = $totalCountRow['total'];

        // Obtener los datos con paginación
        $sql = "SELECT r.idReceta, r.nombre, ps.nombrePlan, r.urlImagen FROM Receta AS r JOIN PlanRecetas AS pr ON r.idReceta = pr.idReceta JOIN PlanSuscripcion AS ps ON pr.idPlan = ps.idPlan ORDER BY ps.nombrePlan ASC LIMIT :lowerLimit, :elementsPerPage";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':lowerLimit', $lowerLimit, PDO::PARAM_INT);
        $stmt->bindValue(':elementsPerPage', $elementsPerPage, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $output .= "<tr>";
            $output .= "<td>" . $row["idReceta"] . "</td>";
            $output .= "<td>" . $row["nombre"] . "</td>";
            $output .= "<td>" . $row["nombrePlan"] . "</td>";
            $output .= "<td><img src='" . $row["urlImagen"] . "' width='60' height='50' alt='Imagen de la receta' style='border-radius: 10px;'></td>";
            $output .= "<td>";
            $output .= "<a class='btn btn-primary' href='ActualizarRecetas.php?id=" . $row["idReceta"] . "' role='submit'>Editar</a>";
            $output .= "<a class='btn btn-danger' href='EliminarRecetas.php?id=" . $row["idReceta"] . "' role='submit'>Eliminar</a>";
            $output .= "</td>";
            $output .= "</tr>";
        }

        // Generar los enlaces de paginación
        $totalPages = ceil($totalRows / $elementsPerPage);
        $output .= "<tr style='background-color: #8d4925;'><td colspan='5'>" . Misc::getNavigator($currentPage, $totalPages) . "</td></tr>";

        return $output;
    }

    public function findIngredient(int $recetaId): array
    {
        $ingredientes = [];
        $stmt = $this->conn->query("SELECT Ingrediente.idIngrediente, Ingrediente.nombre, RecetaIngrediente.cantidad FROM Ingrediente INNER JOIN RecetaIngrediente ON Ingrediente.idIngrediente = RecetaIngrediente.idIngrediente WHERE RecetaIngrediente.idReceta = $recetaId");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $ingredientes[] = new Ingrediente(...$row);
        }
        return $ingredientes;
    }
    public function drawI(array $list): string
    {
        $output = "";
        foreach ($list as $ingredient) {
            $output .= "<div class='ingrediente input-group mb-3'>";
            $output .= "<input type='text' class='form-control m-input' name='nombreIngrediente[]' placeholder='Nombre del ingrediente' value='" . $ingredient->getNombre() . "'>";
            $output .= "<input type='text' class='form-control m-input' name='cantidad[]' placeholder='Cantidad' value='" . $ingredient->getCantidad() . "'>";
            $output .= "<input type='hidden' name='idIngrediente[]' value='" . $ingredient->getIdIngrediente() . "'>";
            $output .= "<button type='button' class='btn btn-danger'>Quitar</button>";
            $output .= "</div>";
        }
        return $output;
    }
    public function findPlan(int $id): PlanReceta
    {
        $stmt = $this->conn->query("SELECT * FROM PlanRecetas WHERE idReceta = $id");
        $row = $stmt->fetch(PDO::FETCH_NUM);
        return new PlanReceta(...$row);
    }
    public function obtenerSelected($id, $idSeleccionado)
    {
        if ($id == $idSeleccionado) {
            return 'selected';
        } else {
            return '';
        }
    }

    public function drawCocinar(int $idReceta, string $tipo)
    {
        $sql = "SELECT i.nombre, ri.Cantidad FROM Ingrediente i INNER JOIN RecetaIngrediente ri ON i.idIngrediente = ri.idIngrediente WHERE ri.idReceta = $idReceta";
        $result1 = $this->conn->query("SELECT * FROM receta WHERE idReceta = $idReceta");
        $row1 = $result1->fetch(PDO::FETCH_ASSOC);
        $result = $this->conn->query($sql);
        $output = '<div class="row" id="sobre-nosotros">';
        $output .= '<div class="col-xl-6 col-md-12">';

        if ($tipo == 'ingredientes') {
            $output .= '<h1>' . $row1['nombre'] . '</h1>';
            $output .= '<ul>';
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $output .= "<li>" . $row['nombre'] . " " . $row['Cantidad'] . "</li>";
            }
            $output .= '</ul>';
            $output .= '</div>';
            $output .= '<div class="col-xl-6 col-md-12">';
            $output .= '<img src="' . $row1['urlImagen'] . '" alt="Historia Empresa" class="img-fluid">';
        } elseif ($tipo == 'preparacion') {
            $output .= '<h1>Preparación</h1>';
            //nl2br — Inserta saltos de línea HTML antes de todas las nuevas líneas de un string
            $output .= '<p>' . nl2br($row1['preparacion']) . '</p>';
            $output .= '</div>';
            $output .= '<div class="col-xl-6 col-md-12">';
            $output .= '<iframe width="100%" height="315" src="' . $row1['urlVideo'] . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
        }

        $output .= '</div>';
        $output .= '</div>';
        return $output;
    }
}
