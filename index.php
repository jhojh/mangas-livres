<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

ob_start();

$route = new Router(url(), ":");

$route->namespace("Source\App");

$route->group(null);

$route->get("/", "Web:home");
$route->get("/cadastro", "Web:cadastro");
$route->get("/entrar", "Web:login");
$route->get("/servicos","Web:services");


$route->group("/app");

$route->get("/", "App:home");
$route->get("/perfil", "App:profile");
$route->get("/pagar", "App:pagamento");
//$route->get("/carrinho", "App:cart");

$route->group(null);


$route->group("/admin");

$route->get("/", "Admin:home");
 $route->get("/editar-produto", "Admin:edit_product");
 $route->get("/editar-usuario", "Admin:edit_user");
 $route->get("/perfil", "Admin:profile");

$route->group(null);

$route->get("/ops/{errcode}", "Web:error");

$route->group(null);

$route->dispatch();

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();