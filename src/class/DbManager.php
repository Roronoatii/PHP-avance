<?php

require_once __DIR__ . '/DbObject.php';

/**
 * La classe DbManager doit pouvoir gérer n'importe quelle table de votre base de donnée
 * 
 * Complétez les fonctions suivantes pour les faires fonctionner
 */

class DbManager
{
    private $db;

    function __construct(PDO $db)
    {
        $this->db = $db;
    }

    // return l'id inseré
    function insert(string $sql, array $data)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        return $this->db->lastInsertId();
    }

    function insert_advanced(DbObject $dbObj)
    {
        $sql = "INSERT INTO " . $dbObj->getTableName() . " (";
        $values = "VALUES (";
        $data = [];
        foreach ($dbObj->getColumns() as $column) {
            $sql .= $column . ", ";
            $values .= "?, ";
            $data[] = $dbObj->$column;
        }
        $sql = substr($sql, 0, -2) . ") ";
        $values = substr($values, 0, -2) . ") ";
        $sql .= $values;
        $this->insert($sql, $data);

        return $this->db->lastInsertId();
    }

    function select(string $sql, array $data, string $className)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $className);
        return $stmt->fetch();
    }

    function getById(string $tableName, $id, string $className)
    {
        $sql = "SELECT * FROM " . $tableName . " WHERE id = ?";
        return $this->select($sql, [$id], $className);
    }

    function getById_advanced($id, string $className)
    {
        $dbObj = new $className();
        $sql = "SELECT * FROM " . $dbObj->getTableName() . " WHERE id = ?";
        return $this->select($sql, [$id], $className);
    }

    function getBy(string $tableName, string $column, $value, string $className)
    {
        $sql = "SELECT * FROM " . $tableName . " WHERE " . $column . " = ?";
        return $this->select($sql, [$value], $className);
    }

    function getBy_advanced(string $column, $value, string $className)
    {
        $dbObj = new $className();
        $sql = "SELECT * FROM " . $dbObj->getTableName() . " WHERE " . $column . " = ?";
        return $this->select($sql, [$value], $className);
    }

    function removeById(string $tableName, $id)
    {
        $sql = "DELETE FROM " . $tableName . " WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
    }

    function update(string $tableName, array $data)
    {
        $sql = "UPDATE " . $tableName . " SET ";
        $id = $data['id'];
        unset($data['id']);
        foreach ($data as $key => $value) {
            $sql .= $key . " = ?, ";
        }
        $sql = substr($sql, 0, -2) . " WHERE id = ?";
        $data[] = $id;
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        return $id;
    }

    function update_advanced(DbObject $dbObj)
    {
        $sql = "UPDATE " . $dbObj->getTableName() . " SET ";
        $id = $dbObj->id;
        foreach ($dbObj->getColumns() as $column) {
            $sql .= $column . " = ?, ";
        }
        $sql = substr($sql, 0, -2) . " WHERE id = ?";
        $data = [];
        foreach ($dbObj->getColumns() as $column) {
            $data[] = $dbObj->$column;
        }
        $data[] = $id;
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
    }

}