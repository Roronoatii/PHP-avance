<?php
require_once __DIR__ . '/DbObject.php';

class Transaction extends DbObject
{
    const TABLE_NAME = 'transactions';

    public $id;
    public $id_user;

    public $id_currency;

    public $amount;

    public $id_author;

    public $id_exchange;
    public $date;
    public $status;
}