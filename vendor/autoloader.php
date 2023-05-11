<?php
declare(strict_types=1);

function autoloader(string $className):void{
    include_once __DIR__ . "/classes/$className.php";
}

spl_autoload_register("autoloader");