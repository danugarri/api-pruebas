<?php
require 'inventory.php';

//trabajaremos con seervicio REST :
//MÉTODOS : GET, POST, PUT, DELETE
$request_type =  $_SERVER["REQUEST_METHOD"];

//switch for methods
switch($request_type){
    case "GET":
         list_products();
         break;
    case "POST":
        create_product();
        break;
    case "DELETE":
        delete_product();
        break;
    case "PUT":
        put_product();
        break;
}

?>