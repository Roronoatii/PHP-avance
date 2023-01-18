<?php
require_once __DIR__ . '/DbObject.php';

class Deposit extends DbObject
{
    const TABLE_NAME = 'deposits';

    public $id;
    public $date;

    public $owner_id;

    public $amount;

    public $id_currency;

    public $submit;
}