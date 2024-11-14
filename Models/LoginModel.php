<?php
class LoginModel extends Query
{
    protected $userName, $userPassword;
    public function __construct()
    {
        parent::__construct();
    }
    //* =================================================================================================
    public function getUser()
    {
        $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
        $params  = array($this->userName, $this->userPassword);
        return $this->select($sql, $params);
    }
    //* -------------------------------------------------------------------------------------------------
    public function getUserPermission()
    {
        $sql = "SELECT r.name as rol, r.id AS rolId
            FROM permission p 
            INNER JOIN rol r ON p.rol_id = r.id
            INNER JOIN user u ON p.user_id = u.id 
            WHERE u.username = ? AND p.state = 'a'";
        $params = array($this->userName);
        return $this->selectAll($sql, $params);
    }
    //* ============================ SETTER ===============================================================
    public function setUserName(string $userName)
    {
        $this->userName = $userName;
    }
    public function setUserPassword(string $password)
    {
        $this->userPassword = $password;
    }
}
