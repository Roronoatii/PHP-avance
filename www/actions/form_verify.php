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

            // create a storage for the user for each currency
            for ($currencyId = 1; $currencyId <= 5; $currencyId++) {
                $sql = "INSERT INTO `storage` (`id_user`, `id_currency`) VALUES (?, ?)";
                $dbManager->insert($sql, [$userId, $currencyId]);
            }
        }

    }

    if (isset($_POST['accept-deposit-submit'])) {
        $deposits = $_POST['deposit'];

        foreach ($deposits as $deposit) {

            $depositId = intval($deposit);
            $dbManager->update('deposits', ['id' => $depositId, 'submit' => 2]);

            depositMoney($depositId);
        }

    }

    if (isset($_POST['accept-withdrawal-submit'])) {
        $withdrawals = $_POST['withdrawal'];

        foreach ($withdrawals as $withdrawal) {

            $withdrawalId = intval($withdrawal);
            $dbManager->update('withdrawals', ['id' => $withdrawalId, 'submit' => 2]);

            withdrawMoney($withdrawalId);
        }

    }
    header('Location: ../manager_verify.php');
}