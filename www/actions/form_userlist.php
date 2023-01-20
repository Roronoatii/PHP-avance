<?php
require_once __DIR__ . '/../../src/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['promote-submit'])) {
        // get only checked checkboxes in the form
        $users = $_POST['user'];

        foreach ($users as $user) {
            // update the role of the users
            $userId = intval($user);
            $userRole = $dbManager->getBy('users', 'id', $userId)[0]['role_id'];

            if ($userRole < 200) {
                $dbManager->update('users', ['id' => $userId, 'role_id' => 200]);
            } else {
                $dbManager->update('users', ['id' => $userId, 'role_id' => 1000]);
            }
        }
    }

    if (isset($_POST['ban-submit'])) {
        // get only checked checkboxes in the form
        $users = $_POST['user'];

        foreach ($users as $user) {
            // update the role of the users
            $userId = intval($user);
            $dbManager->update('users', ['id' => $userId, 'role_id' => 0]);
        }
    }
}

header('Location: ../userlist.php');
exit;