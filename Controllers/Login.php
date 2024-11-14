<?php
class Login extends Controller
{
    //* =================================================================================================
    public function __construct()
    {
        parent::__construct();
        session_start();
        if (isset($_SESSION['user_id']))
            header("location: " . BASE_URL . "Dashboard/");
    }
    public function index()
    {
        $this->viewRenderer->renderView($this, "index");
    }
    public function error()
    {
        $this->viewRenderer->renderView($this, "error");
    }
    //* =================================================================================================
    //* =================================================================================================
    //* =================================================================================================
    public function login()
    {
        $msg = array('icon' => "error", 'status' => "error", 'title' => "Error", 'description' => "Contactese con el desarrollador");

        $userName = strtolower(strClean($_POST['userName'] ?? ''));
        $userPassword = strClean($_POST['password'] ?? '');

        $this->model->setUserName($userName);
        $this->model->setUserPassword(hash("SHA256", $userPassword));

        $userData = $this->model->getUser();
        $isUserValid = validateLogin($userName, $userPassword, $userData);
        if (is_array($isUserValid)) sendJsonResponse($isUserValid);

        $PermissionData = $this->model->getUserPermission();
        if ($userData['id'] == 1 || $PermissionData) {
            $_SESSION['user_roles'] = array_column($PermissionData, 'rol');
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['user_username'] = $userData['username'];
            $msg = array(
                'icon' => "success",
                'status' => "success",
                'title' => "Inicio de sesión exitoso",
                'description' => ""
            );
        }
        sendJsonResponse($msg);
    }
}
