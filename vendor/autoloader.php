<?php

function autoload(string $className):void{
    include_once __DIR__ . "/classes/$className.php";
}

spl_autoload_register("autoload");