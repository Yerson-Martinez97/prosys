<?php
class Controller
{
    protected $viewRenderer, $model;
    public function __construct()
    {
        $this->viewRenderer = new ViewRenderer();
        $this->loadModel();
    }
    public function loadModel()
    {
        $modelName = get_class($this) . "Model";
        $modelPath = "Models/" . $modelName . ".php";

        if (file_exists($modelPath)) {
            require_once $modelPath;
            $this->model = new $modelName();
        }
    }
}
