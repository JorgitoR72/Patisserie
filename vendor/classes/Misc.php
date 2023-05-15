<?php

Class Misc 
{
//Botón ordenar
 static public function orderButton($currentOrder)
 {
    $current = self::getOrder($currentOrder);
    $order = ($current == "ASC") ? "DESC" : "ASC";
    $link = "<a href = '?order=" . $order . " '>Dificultad</a>";
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
        $output = "";
        if ($page > 1) {
            $output .= "<a href='?page=1'>&lt;</a> ";
            $output .= "<a href='?page=" . ($page - 1) . "'>&lt;&lt;</a> ";
        }
        for ($linkToPage = 1; $linkToPage <= $total; $linkToPage++) {
            if(($linkToPage)==$page){
                $output .= "<strong>" . ($linkToPage) . "</strong> ";
            }else{
                $output .= "<a href='?page=" . ($linkToPage) . "'>" . ($linkToPage) . "</a> ";
            }
        }
        if ($page < $total) {
            $output .= "<a href='?page=" . ($page + 1) . "'>&gt;&gt;</a> ";
            $output .= "<a href='?page=" . $total . "'>&gt;</a> ";            
        }
        return $output;
    }
}
