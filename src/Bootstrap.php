<?php

declare(strict_types=1);

namespace TestProjekt;

require('Controller/FrontendController.php');

$class = 'TestProjekt\Controller\FrontendController';

$routes = [
  '' => [$class, 'index'],
  'hallo' => [$class, 'hallo'],
  'user' => [$class, 'user']
];


$params = str_replace('/', '', $_SERVER['REQUEST_URI']);

if (array_key_exists($params, $routes)) {
  $result = $routes[$params];
  $object = new $result[0]();
  $methode = $result[1];
  $object->$methode();
} else {
  http_response_code(404);
  echo "Nicht Gefunden";
}
