<?php
class Query extends Connection
{
    private $pdo, $sql, $data;
    public function __construct()
    {
        parent::__construct(); // Call the constructor of the parent class
        $this->pdo = $this->getConnection(); // Get the connection from the parent class
    }
    //* ================================================================
    public function select(string $sql, array $data = [])
    {
        try {
            $this->sql = $sql;
            $this->data = $data;

            $stmt = $this->pdo->prepare($this->sql);
            $stmt->execute($this->data);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error en la consulta select: ' . $e->getMessage());
            return null;
        }
    }
    //* ================================================================
    public function selectAll(string $sql, array $data = [])
    {
        try {
            $this->sql = $sql;
            $this->data = $data;

            $stmt = $this->pdo->prepare($this->sql);
            $stmt->execute($this->data);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error en la consulta select: ' . $e->getMessage());
            return null;
        }
    }
    //* ================================================================
    public function save(string $sql, array $data = [])
    {
        try {
            $this->sql = $sql;
            $this->data = $data;

            $save = $this->pdo->prepare($this->sql);
            $result = $save->execute($this->data);

            return $result ? 1 : 0;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
    //* ================================================================
    public function update(string $sql, array $data = [])
    {
        try {
            $this->sql = $sql;
            $this->data = $data;

            $update = $this->pdo->prepare($this->sql);
            $result = $update->execute($this->data);

            return $result ? 1 : 0;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
    //* ================================================================
    public function insert(string $sql, array $data = [])
    {
        try {
            $this->sql = $sql;
            $this->data = $data;

            $insert = $this->pdo->prepare($this->sql);
            $result = $insert->execute($this->data);

            return $result ? $this->pdo->lastInsertId() : 0;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
    //* ================================================================
    public function delete(string $sql, array $data = [])
    {
        try {
            $this->sql = $sql;
            $this->data = $data;

            $delete = $this->pdo->prepare($this->sql);
            $result = $delete->execute($this->data);

            return $result ? 1 : 0;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
    //* ================================================================

}
