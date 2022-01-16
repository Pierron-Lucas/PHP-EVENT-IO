<?php

/*
    Activer la gestion de session utilisateur : $_SESSION est alors fonctionnel
*/
session_start();

define('PROJECT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
define('SITE_URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/');
/*
    Définition d'un ensemble de constantes : noms des dossiers de l'architecture MVC
*/
define('UTILS_DIRNAME', 'Utils');
define('CONTROLLERS_DIRNAME', 'Controllers');
define('MODELS_DIRNAME', 'Models');
define('VIEWS_DIRNAME', 'Views');

/*
    Définition d'un ensemble de constantes : noms des paramètres "controller" et "action"
*/
define('CONTROLLER_PARAMETER', 'controller');
define('ACTION_PARAMETER', 'action');

/*
    Chargement du fichier CustomAutoload.php
*/
require  PROJECT_PATH . UTILS_DIRNAME . DIRECTORY_SEPARATOR . 'CustomAutoload.php';

try {
    
    $controllerName = isset($_GET[CONTROLLER_PARAMETER]) ? $_GET[CONTROLLER_PARAMETER] . 'Controller' : null;

    if($controllerName == null || trim($controllerName) == '' || $controllerName == 'Controller') {
        $controllerName = 'IndexController';
    }

    if(!class_exists($controllerName)) {
        header("HTTP/1.1 404 Not Found");
        die('Controller not found');
    }

    $controller = new $controllerName();
    
    $action = isset($_GET[ACTION_PARAMETER]) ? $_GET[ACTION_PARAMETER] : null;

    if($action == null || trim($action) == '') {
        $action = 'index';
    }

    if(!method_exists($controller, $action)) {
        header("HTTP/1.1 404 Not Found");
        die('Action not found');
    }

    echo $controller->$action();
} 
catch(Exception $exception) {
    var_dump($exception);
}
?>