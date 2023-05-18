<?php
class RecipeTest
{
    public function testOrderButton()
    {
        // Creamos un objeto de la clase Recipe para poder llamar a los métodos estáticos
        $recipe = new Misc();
        
        // Definimos el orden actual de las recetas
        $currentOrder = "ASC";
        
        // Obtenemos el enlace generado por el método orderButton
        $link = $recipe->orderButton($currentOrder);
        
        // Verificamos que el enlace contiene el orden inverso al actual
        if ($currentOrder == "ASC") {
            $expectedLink = "<a id='boton-ordenacion' href='?order=DESC'>Ordenar Alfabeticamente</a>";
        } else {
            $expectedLink = "<a id='boton-ordenacion' href='?order=ASC'>Ordenar Alfabeticamente</a>";
        }
        
        assert($link === $expectedLink);
    }
    
    public function testGetOrder()
    {
        // Creamos un objeto de la clase Recipe para poder llamar a los métodos estáticos
        $recipe = new Misc();
        
        // Caso de prueba 1: El orden actual es "ASC"
        $order = $recipe->getOrder("ASC");
        assert($order === "ASC");
        
        // Caso de prueba 2: El orden actual es "DESC"
        $order = $recipe->getOrder("DESC");
        assert($order === "DESC");
        
        // Caso de prueba 3: No se proporciona un orden actual
        $order = $recipe->getOrder(null);
        assert($order === "ASC");
    }
}
