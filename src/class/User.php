<?php
class User extends DbObject
{
    const TABLE_NAME = 'users';

    public $id;

    public $firstname;

    public $lastname;

    public $mail;

    public $password;

    public $birthdate;

    public $iban;
}