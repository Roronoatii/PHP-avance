<?php
require_once __DIR__ . '/DbObject.php';

class Role extends DbObject
{
    const TABLE_NAME = 'roles';

    public $id;

    public $name;
}