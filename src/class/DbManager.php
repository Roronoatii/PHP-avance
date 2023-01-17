<?php 

require_once __DIR__ . '/DbObject.php';

/**
 * La classe DbManager doit pouvoir gérer n'importe quelle table de votre base de donnée
 * 
 * Complétez les fonctions suivantes pour les faires fonctionner
 */

class DbManager {
    private $db;

    function __construct(PDO $db) {
        $this->db = $db;
    }

    // return l'id inseré
    function insert(string $sql, array $data) {
       // $this->db->prepare(INSERT INTO users(id, email, password, role, created_at, last_ip) VALUES(?, ?, ?, ?, ?, ?));
        //$db->execute();
        return "ok";
        
    }

    function insert_advanced(DbObject $dbObj) {

    }

    function select(string $sql, array $data, string $className) {
       // $this->db->prepare(SELECT * FROM users);
      //  $db->execute();
    }

    function getById(string $tableName, $id, string $className) {
       // $this->db->prepare(SELECT * FROM users WHERE id = "");
       // $db->execute();
    }

    function getById_advanced($id, string $className) {
        return "ok";
    }

    function getBy(string $tableName, string $column, $value, string $className) {
       // $stmt = $pdo->prepare("SELECT * FROM $tableName WHERE $column = :value");
       // $stmt->bindValue(':value', $value);
       // $stmt->execute();
     //   $result = $stmt->fetchObject($className);
     //   return $result;

    }

    function getBy_advanced(string $column, $value, string $className) {

    }

    function removeById(string $tableName, $id) {
        //$this->db->prepare(DELETE from users WHERE id="");
    }

    function update(string $tableName, array $data) {
        $stmt = $pdo->prepare("UPDATE users SET email = test@test.com, role = admin WHERE id = 1");

        $stmt->bindValue('test@test.com', $data['email']);
        $stmt->bindValue('admin', $data['role']);

        $stmt->execute();

        return $stmt;

    }

    function update_advanced(DbObject $dbObj) {
        
    }

}