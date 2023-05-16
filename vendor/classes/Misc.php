<?php

Class Misc 
{
//Botón ordenar
 static public function orderButton($currentOrder)
 {
    $current = self::getOrder($currentOrder);
    $order = ($current == "ASC") ? "DESC" : "ASC";
    $link = "<a id='boton-ordenacion' href = '?order=" . $order . " '>Ordenar Alfabeticamente</a>";
    return $link;
 }

//Ordenar
 static public function getOrder($order)
 {
    if (!is_null($order)) {
        $current = $order;
        
    }else {
        $current = "ASC";
    }
    return $current;
 }

//Paginar
 static public function getPage($page)
 {
    if (!is_null($page)) {
        $current = $page;
        
    }else {
        $current = 1;
    }
    return $current;
 }
 //Esto siempre es igual
 static public function getNavigator(?int $page = null, int $total = 0): string
{
    $output = "<div class='carousel'>";
    
    if ($page > 1) {
        $output .= "<a class='carousel-link' href='?page=1'>&lt;</a> ";
        $output .= "<a class='carousel-link' href='?page=" . ($page - 1) . "'>&lt;&lt;</a> ";
    }
    
    for ($linkToPage = 1; $linkToPage <= $total; $linkToPage++) {
        if ($linkToPage == $page) {
            $output .= "<span class='carousel-current'>" . $linkToPage . "</span> ";
        } else {
            $output .= "<a class='carousel-link' href='?page=" . $linkToPage . "'>" . $linkToPage . "</a> ";
        }
    }
    
    if ($page < $total) {
        $output .= "<a class='carousel-link' href='?page=" . ($page + 1) . "'>&gt;&gt;</a> ";
        $output .= "<a class='carousel-link' href='?page=" . $total . "'>&gt;</a> ";            
    }
    
    $output .= "</div>";
    
    return $output;
}

}
