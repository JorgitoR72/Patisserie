<?php

class Logistic extends Connection
{

    public function __construct()
    {
        $this->connect();
    }

    /* La función findAll devuelve un array de objetos Receta. Recupera todas las filas de la tabla receta de la base de datos ordenándolas por el campo nombre en el orden especificado en el parámetro $order. El valor de $order es opcional y si no se proporciona, se utiliza el valor predeterminado definido en la función Misc::getOrder(). */
    public function findAll(?string $order): array
    {
        $currentOrder = Misc::getOrder($order);
        $result = [];
        $stmt = $this->conn->query("SELECT * FROM receta ORDER BY nombre $currentOrder  ");

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
            $output .=          "<div class='col-xl-3 col-md-3 col-sm-12'>";
            $output .=            "<img src='" . $receta->getUrlImagen() . "' alt='Bizcocho de chocolate' class='img-fluid' style='height: 200px; width: 500px;'>";
            $output .=         "</div>";
            $output .=         "<div class='col-xl-9 col-md-9 col-sm-12' style='background-color: white; text-align: justify; color: #8d4925;'>";
            $output .= "    <h1>" . $receta->getNombre() . "</h1>";
            $output .= "    <p>" . $receta->getDescripcion() . "</p>";
            $output .= "<div style='text-align: right;'>";
            $output .=    "<a href='ingredientes.php'>";
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

                                                                                                                                                    
}
