<?php

class Misc
{
    static public function orderButton(?string $currentOrder): string
    {
        //$current = self::getSession("order", $currentOrder, "ASC");
        $current = self::getOrder( $currentOrder);
        $order = ($current == "ASC") ? "DESC" : "ASC";
        $symbol = ($current == "ASC") ? "&#9650;" : "&#9660;";
        $output = "<a href='?order=" . $order . "' class='more'>$symbol</a>";
        return $output;
    }
    static public function getPage(int $page = null): int
    {
        if (!is_null($page)) {
            $_SESSION["page"] = $page;
            $current = $page;
        } elseif (isset($_SESSION["page"])) {
            $current = $_SESSION["page"];
        } else {
            $current = 1;
        }
        return $current;
    }
    static public function getOrder(string $order = null): string
    {
        if (!is_null($order)) {
            $_SESSION["order"] = $order;
            $current = $order;
        } elseif (isset($_SESSION["order"])) {
            $current = $_SESSION["order"];
        } else {
            $current = "ASC";
        }
        return $current;
    }

/*     static public function getPage(int $page = null): int
    {
        return self::getSession("page", $page, 1);
    }
    static public function getOrder(string $order = null): string
    {
        return self::getSession("order", $order, "ASC");
    }
    static private function getSession(string $parameterName, mixed $parameter = null, string $default): mixed
    {
        if (!is_null($parameter)) {
            $_SESSION[$parameterName] = $parameter;
            $current = $parameter;
        } elseif (isset($_SESSION[$parameterName])) {
            $current = $_SESSION[$parameterName];
        } else {
            $current = $default;
        }
        return $current;
    } */
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
