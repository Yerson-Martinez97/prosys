<?php
class Dashboard extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        $view = "index";
        if (!isset($_SESSION['user_id'])) {
            session_destroy();
            header("location: " . BASE_URL);
            exit;
        }
    }
    //* -------------------------------------------------------------------------------------------------
    public function index(): void
    {
        $view = "index";
        $this->model->setUserId($_SESSION['user_id']);
        $data['company'] = $this->model->getCompany();
        $data['user'] = $this->model->getUser();
        $data['user_roles'] = $this->model->getUserRoles();

        $data['allowedRoles'] =  ["administrador", "encargado", "tecnico"];
        foreach ($data['user_roles'] as $role) {
            if ((in_array($role['name'], $data['allowedRoles'])) && $role['state'] === 'a' && $data['user']['state'] === 'a') {
                $view = 'index';
                break;
            }
            $view = 'permission';
        }
        $this->viewRenderer->renderView($this, $view, $data);
    }
    //* -------------------------------------------------------------------------------------------------
    public function error(): void
    {
        $this->viewRenderer->renderView($this, "error");
    }
    //* -------------------------------------------------------------------------------------------------
    public function exit(): void
    {
        session_destroy();
        header("location: " . BASE_URL);
        die();
    }
    //* =================================================================================================
    public function findUser($userId)
    {
        $this->model->setUserId($userId);
        $userData = $this->model->getUser();
        $userData["names"] = $userData["firstName"] . " " . $userData["middleName"];
        $userData["surnames"] = $userData["paternalSurname"] . " " . $userData["maternalSurname"];
        sendJsonResponse($userData);
    }
    //* -------------------------------------------------------------------------------------------------
    public function findTotalActives($name)
    {
        $this->model->setTotalName($name);
        $total  = $this->model->getTotalActives();
        sendJsonResponse($total);
    }
    //* -------------------------------------------------------------------------------------------------
    public function findTotal($name)
    {
        $this->model->setTotalName($name);
        $total  = $this->model->getTotal();
        sendJsonResponse($total);
    }
}
