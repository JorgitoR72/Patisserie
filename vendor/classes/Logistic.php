<?php

class Logistic extends Connection
{
    public function __construct()
    {
        $this->connect();
    }
    public function insertR(array $data): int|bool
    {
        $stmt1 = $this->conn->query("SELECT MAX(idReceta) AS max_id FROM Receta");
        $id = $stmt1->fetch(PDO::FETCH_ASSOC);
        $maxid = $id["max_id"] + 1;
        $stmt = $this->conn->prepare("INSERT INTO `receta`(`idReceta`, `idAutor`, `nombre`, `urlImagen`, `urlVideo`, `descripción`, `preparación`) VALUES (:idReceta,:idAutor,:nombre,:urlImagen,:urlVideo,:descripcion,:preparacion)");

        $stmt->bindParam(':idReceta', $maxid, PDO::PARAM_INT);
        $stmt->bindParam(':idAutor', $data["idAutor"], PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $data["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(':urlImagen', $data["urlImagen"], PDO::PARAM_STR);
        $stmt->bindParam(':urlVideo', $data["urlVideo"], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $data["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(':preparacion', $data["preparacion"], PDO::PARAM_STR);

        $result = $stmt->execute();

        if ($result) {
            $stmt2 = $this->conn->prepare("INSERT INTO `planrecetas` (`idPlan`, `idReceta`) VALUES (:idPlan, :idReceta)");
            $stmt2->bindParam(':idPlan', $data["idPlan"], PDO::PARAM_INT);
            $stmt2->bindParam(':idReceta', $maxid, PDO::PARAM_INT);

            return $stmt2->execute();
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
        $stmtUpdate = $this->conn->prepare("UPDATE Receta SET nombre = :nombre, urlImagen = :urlImagen, urlVideo = :urlVideo, descripción = :descripción, preparación = :preparación WHERE idReceta = :id");

        $stmtUpdate->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $stmtUpdate->bindParam(":urlImagen", $data['urlImagen'], PDO::PARAM_STR);
        $stmtUpdate->bindParam(":urlVideo", $data['urlVideo'], PDO::PARAM_STR);
        $stmtUpdate->bindParam(":descripción", $data['descripción'], PDO::PARAM_STR);
        $stmtUpdate->bindParam(":preparación", $data['preparación'], PDO::PARAM_STR);
        $stmtUpdate->bindParam(":id", $data['idReceta'], PDO::PARAM_INT);

        return $stmtUpdate->execute();
    }
    public function drawR()
    {
        $output = "";
        $sql = "SELECT r.idReceta, r.nombre, ps.nombrePlan, r.urlImagen FROM Receta AS r JOIN PlanRecetas AS pr ON r.idReceta = pr.idReceta JOIN PlanSuscripcion AS ps ON pr.idPlan = ps.idPlan ORDER BY ps.nombrePlan ASC";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $output .= "<tr>";
            $output .= "<td>" . $row["idReceta"] . "</td>";
            $output .= "<td>" . $row["nombre"] . "</td>";
            $output .= "<td>" . $row["nombrePlan"] . "</td>";
            $output .= "<td>" . $row["urlImagen"] . "</td>";
            $output .= "<td>";
            $output .= "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalEditarReceta'>Editar</button>";
            $output .= "<button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirmDeleteModal'>Eliminar</button>";
            $output .= "</td>";
            $output .= "</tr>";
        }
        return $output;
    }
}
