<?php

declare(strict_types=1);

namespace TestProject;

require('Controller/FrontendController.php');

$class = 'TestProject\Controller\FrontendController';

$routes = [
    '' => [$class, 'index'],
    'hallo' => [$class, 'hallo'],
    'user' => [$class, 'user'],
    'page' => [$class, 'page'],
    'bootstrap' => [$class, 'bootstrap'],
    'installation' => [$class, 'installation']
];

// Get the path from the URL
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Remove leading and trailing slashes
$path = trim($path, '/');

// Split the path into segments
$segments = explode('/', $path);

// The first segment is the route
$route = $segments[0];

// Remove the first segment from the array
array_shift($segments);

// The remaining segments are GET variables
$getVariables = $segments;
//var_dump($getVariables);

if (array_key_exists($route, $routes)) {
    $result = $routes[$route];
    $object = new $result[0]();

    // Check if the method accepts GET variables
    if ($route === $result[1]) {
        $methode = $result[1];
        $object->$methode($getVariables); // Pass GET variables to the method
    } else {
        $methode = $result[1];
        $object->$methode();
    }
} else {
    http_response_code(404);
    // URL of the remote HTML page you want to render
    $html = file_get_contents(__DIR__ . "/../templates/404.html");
    echo $html;
    exit;
}
