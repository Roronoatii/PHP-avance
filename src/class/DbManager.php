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
        $tableName = $dbObj->getTableName();
        $columns = [];
        $values = [];
        $data = [];
        foreach ($dbObj as $key => $value) {
            if ($key != 'id') {
                $columns[] = $key;
                $values[] = '?';
                $data[] = $value;
            }
        }
        $columns = implode(', ', $columns); // turn array into string, separated by ', '
        $values = implode(', ', $values); // turn array into string, separated by ', '
        $sql = "INSERT INTO " . $tableName . " (" . $columns . ") VALUES (" . $values . ")";
        return $this->insert($sql, $data);
    }

    function select(string $sql, array $data, string $className = null)
    {
        $query = $this->db->prepare($sql);
        $query->execute($data);
        if ($className != null) {
            $query->setFetchMode(PDO::FETCH_CLASS, $className);
        }
        return $query->fetchAll();
    }

    function getById(string $tableName, $id, string $className = null)
    {
        $sql = "SELECT * FROM " . $tableName . " WHERE id = ?";
        return $this->select($sql, [$id], $className);
    }

    function getById_advanced($id, string $className)
    {
        $class = new $className();
        $tableName = $class->getTableName();

        $sql = "SELECT * FROM " . $tableName . " WHERE id = ?";
        return $this->select($sql, [$id], $className);
    }

    function getBy(string $tableName, string $column, $value, string $className = null)
    {
        $sql = "SELECT * FROM " . $tableName . " WHERE " . $column . " = ?";
        return $this->select($sql, [$value], $className);
    }

    function getBy_advanced(string $column, $value, string $className)
    {
        $class = new $className();
        $tableName = $class->getTableName();

        $sql = "SELECT * FROM " . $tableName . " WHERE " . $column . " = '" . $value . "'";
        return $this->select($sql, [], $className);
    }

    function removeById(string $tableName, $id)
    {
        $sql = "DELETE FROM " . $tableName . " WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $id;
    }

    function update(string $tableName, array $data)
    {
        $sql = "UPDATE " . $tableName . " SET ";
        foreach ($data as $key => $value) {
            if ($key != 'id') {
                $sql .= $key . " = " . $value . ", ";
            }
        }

        $id = $data['id'];
        $sql = substr($sql, 0, -2) . " WHERE id = " . $id;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $id;
    }

    function update_advanced(DbObject $dbObj)
    {
        $tableName = $dbObj->getTableName();
        $data = [];
        foreach ($dbObj as $key => $value) {
            $data[$key] = $value;
        }
        return $this->update($tableName, $data);
    }
}