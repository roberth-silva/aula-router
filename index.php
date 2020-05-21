<?php 

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

$router->group(null);
$router->get("/", function($data){
	echo "<h1>Home</h1>";
	var_dump($data);
});

$router->group("contato");
$router->get("/", function($data){
	echo "<h1>Contato</h1>";
	var_dump($data);
});

$router->group("error");
$router->get("/{errcode}", function($data){
	echo "<h1>Erro {$data["errcode"]}</h1>";
});

$router->dispatch();

if ($router->error()) {
    $router->redirect("/error/{$router->error()}");
}

 ?>

