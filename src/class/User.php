<?php
require_once __DIR__ . '/DbObject.php';

class User extends DbObject
{
    const TABLE_NAME = 'users';

    public $id;
    public $role_id;
    public $firstname;

    public $lastname;

    public $mail;

    public $password;

    public $birthdate;

    public $iban;
}