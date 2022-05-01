<?php
header('Content-Type: application/json; charset=utf-8');
//header("Access-Control-Allow-Origin: *");
require "Method.php";

$method = new Method();

if (isset($_SERVER['PATH_INFO'])) {
   $url = explode('/', $_SERVER['PATH_INFO']);
   if ($url[1] == "integra") {
      switch ($_SERVER['REQUEST_METHOD']) {
         case "GET":
            if (isset($url[2])) {
               $method->get($url[2]);
            } else {
               $method->getAll();
            }
            break;
         case "POST":
            $method->post();
            break;
         case "PUT":
            if (isset($url[2])) {
               $method->put($url[2]);
            }
            break;
         case "DELETE":
            if (isset($url[2])) {
               $method->delete($url[2]);
            }
            break;
      }
   }
} else {
}
