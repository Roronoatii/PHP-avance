<?php
require_once __DIR__ . '/DbObject.php';

class Currency extends DbObject
{
    const TABLE_NAME = 'currencies';
    public $id;

    public $name;
    public $dollar_ratio;
}