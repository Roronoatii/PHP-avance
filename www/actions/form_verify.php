<?php
require_once(__DIR__ . '/../../src/init.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['verify-submit'])) {
        // get only checked checkboxes in the form
        $users = $_POST['user'];
        // update the role of the users
        foreach ($users as $user) {
            $userId = intval($user);
            var_dump($userId);
            $dbManager->update('users', ['id' => $userId, 'role_id' => 10]);


        }

    }
}