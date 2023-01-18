<?php
require_once __DIR__ . '/DbObject.php';

class Withdrawal extends DbObject
{
    const TABLE_NAME = 'withdrawals';

    public $id;
    public $date;

    public $owner_id;

    public $amount;

    public $id_currency;

    public $submit;
}