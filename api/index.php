<?php

ob_start();

require  __DIR__ . "/../vendor/autoload.php";

use CoffeeCode\Router\Router;

$route = new Router(url(),":");

$route->namespace("Source\App\Api");

// Grupo de rotas adicionado

$route->group("/users");

$route->post("/","Users:createUser");
$route->post("/login","Users:loginUser");
$route->post("/admin","Users:loginAdmin");
$route->post("/update","Users:updateUser");
$route->post("/set-password","Users:setPassword");
$route->group("null");

$route->dispatch();

$route->group("/products");

$route->get("/product","Products:listProduct");
$route->get("/product/{id}","Products:listById");
$route->post("/insert-product","Products:insertProduct");
$route->post("/update-product/{id}","Products:updateProduct");
$route->delete("/delete-product/{id}","Products:deleteProduct");



$route->group("null");

$route->group("/category");

$route->get("/category","Categorys:listCategory");
$route->get("/category/{id}","Categorys:listById");
$route->post("/insert-category","Categorys:insertCategory");
$route->post("/update-category/{id}","Categorys:updateCategory");
$route->delete("/delete-category/{id}","Categorys:deleteCategory");



$route->group("null");

$route->group("/admin");

$route->post("/","Admins:insert");

$route->group("null");

$route->dispatch();

/** ERROR REDIRECT */
if ($route->error()) {
    header('Content-Type: application/json; charset=UTF-8');
    http_response_code(404);

    echo json_encode([
        "errors" => [
            "type " => "endpoint_not_found",
            "message" => "Não foi possível processar a requisição"
        ]
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

ob_end_flush();