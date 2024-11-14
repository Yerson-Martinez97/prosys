<?php
require_once "Config/Config.php";
require_once "Config/Helpers.php";
// require_once "Assets/php/photo.php";

function handleRequest()
{
    $ruta = !empty($_GET['url']) ? $_GET['url'] : "Login/index";
    $urlSegments = explode("/", $ruta);

    $controllerName = $urlSegments[0];
    $methodName = (isset($urlSegments[1]) && $urlSegments[1]) != "" ? $urlSegments[1] : "index";
    $parameters = "";

    if (count($urlSegments) > 2)
        $parameters = implode(",", array_slice($urlSegments, 2));


    require_once "Config/App/Autoload.php";

    $controllerFilePath = "Controllers/" . $controllerName . ".php";
    if (file_exists($controllerFilePath)) {
        require_once $controllerFilePath;
        $controllerInstance = new $controllerName();
        if (method_exists($controllerInstance, $methodName)) {
            validationFields($controllerName);
            $controllerInstance->$methodName($parameters);
        } else {
            redirectToErrorPage($controllerName);
        }
    } else {
        redirectToErrorPage($controllerName);
    }
}
function validationFields($controller)
{
    $dir = "Assets/php/validationFields/" . $controller . ".php";
    if (file_exists($dir))
        require_once $dir;
}

function redirectToErrorPage($controller)
{
    switch ($controller) {
        case "Login":
            header('Location: ' . BASE_URL . 'Login/error');
            break;
        case "Dashboard":
            header('Location: ' . BASE_URL . 'Dashboard/error');
            break;
        default:
            header('Location: ' . BASE_URL . 'Login/error');
            break;
    }
}

handleRequest();
