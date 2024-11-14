<?php
class DashboardModel extends Query
{
    protected $userId, $userBranchId, $totalName;
    public function __construct()
    {
        parent::__construct();
    }

    //* -------------------------------------------------------------------------------------------------
    public function getCompany()
    {
        $sql = "SELECT id, name, shortName, icon, logo FROM company";
        $result = $this->select($sql);
        return $result;
    }
    //* -------------------------------------------------------------------------------------------------
    public function getBranch()
    {
        $sql = "SELECT b.name AS name, b.state AS stateBranch, ub.state AS stateUserBranch
            FROM user u
            JOIN user_branch ub ON ub.user_id = u.id
            JOIN branch b ON ub.branch_id = b.id
            WHERE ub.id = ?;";
        $params = array($this->userBranchId);
        $result = $this->select($sql, $params);
        return $result;
    }
    //* -------------------------------------------------------------------------------------------------
    public function getUser()
    {
        $sql = "SELECT u.id AS id, u.username AS username, u.avatar AS avatar, u.state AS state,
        n1.name AS firstName,n2.name AS middleName, ps.name AS paternalSurname, ms.name AS maternalSurname, 
        u.gender AS gender, u.phone AS phone, u.birthDate AS birthDate
        FROM user u 
        INNER JOIN name n1 ON u.firstName_id = n1.id
        LEFT JOIN name n2 ON u.middleName_id = n2.id 
        INNER JOIN surname ps ON u.paternalSurname_id = ps.id
        INNER JOIN surname ms ON u.maternalSurname_id = ms.id
        WHERE u.id = ?";
        $params = array($this->userId);
        $result = $this->select($sql, $params);
        return $result;
    }
    //* -------------------------------------------------------------------------------------------------
    public function getUserRoles()
    {
        $sql = "SELECT r.id AS id, r.name AS name, p.state AS state, r.colorTag AS colorTag
                FROM permission p
                INNER JOIN rol r ON p.rol_id = r.id
                INNER JOIN user u ON p.user_id = u.id
                WHERE p.user_id = ? AND p.state = 'a'";
        $params = array($this->userId);
        $result = $this->selectAll($sql, $params);
        return $result;
    }
    //* =================================================================================================
    public function getTotalActives()
    {
        $sql = "SELECT COUNT(*) AS total FROM {$this->totalName} WHERE state = 'a'";
        $result = $this->select($sql);
        return $result;
    }
    public function getTotal()
    {
        $sql = "SELECT COUNT(*) AS total FROM {$this->totalName}";
        $result = $this->select($sql);
        return $result;
    }
    //* =================================================================================================
    //* -------------------------------------------------------------------------------------------------
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
    public function setUserBranchId($userBranchId)
    {
        $this->userBranchId = $userBranchId;
    }
    public function setTotalName($totalName)
    {
        $this->totalName = $totalName;
    }
}
