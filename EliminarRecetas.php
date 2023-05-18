<?php

declare(strict_types=1);
require_once "vendor/autoloader.php";

try {
    $repository = new Logistic;
        $repository->beginTransaction();
        $repository->deleteR((int) $_GET["id"]);
        $repository->commit();
    header('location:admin.php');
} catch (PDOException $e) {
    echo "Error de base de datos: " . $e->getMessage();
}

?>