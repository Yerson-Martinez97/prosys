<?php
class ViewRenderer
{
    public function renderView($controller, $view, $data = [], $data2 = [])
    {
        $controllerName  = get_class($controller);
        if ($controllerName  == "Login") {
            $viewPath = "Views/" . $view . ".php";
        } else {
            $viewPath = "Views/" . $controllerName . "/" . $view . ".php";
        }
        require $viewPath;
    }
}
