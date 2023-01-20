<?php
require_once(__DIR__ . '/../../src/init.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accept-account-submit'])) {
        // get only checked checkboxes in the form
        $users = $_POST['user'];

        foreach ($users as $user) {
            // update the role of the users
            $userId = intval($user);
            $dbManager->update('users', ['id' => $userId, 'role_id' => 10]);
        }

    }

    if (isset($_POST['accept-deposit-submit'])) {
        $deposits = $_POST['deposit'];

        foreach ($deposits as $deposit) {

            $depositId = intval($deposit);
            updateTransaction($depositId, 1);

            acceptTransaction($depositId);
        }

    }

    if (isset($_POST['accept-withdrawal-submit'])) {
        $withdrawals = $_POST['withdrawal'];

        foreach ($withdrawals as $withdrawal) {

            $withdrawalId = intval($withdrawal);
            updateTransaction($withdrawalId, 1);

            acceptTransaction($withdrawalId);
        }

    }
}

header('Location: ../manager_verify.php');
exit;