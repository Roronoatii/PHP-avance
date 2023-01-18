<?php
session_start();

// db
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/session.php';

// class
require_once __DIR__ . '/class/DbObject.php';
require_once __DIR__ . '/class/User.php';
require_once __DIR__ . '/class/Role.php';

// db manager
require_once __DIR__ . '/class/DbManager.php';

$dbManager = new DbManager($db);

// utils
require_once __DIR__ . '/utils/errors.php';