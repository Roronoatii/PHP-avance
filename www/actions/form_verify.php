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

            // TODO ajouter de l'argent à l'utilisateur
            $user = $dbManager->select("SELECT owner_id FROM deposits WHERE id = ?", [$depositId]);
            $userId = $user[0]['owner_id'];
            $currency = $dbManager->select("SELECT currency_id FROM deposits WHERE id = ?", [$depositId]);
            $currencyId = $currency[0]['currency_id'];


            $storage = $dbManager->select("SELECT * FROM storage WHERE id_user = ? AND id_currency = ?", [$userId, $currencyId]);
            $storageId = $storage[0]['id'];
            $storageAmount = floatval($storage[0]['amount']);

            $deposit = $dbManager->select("SELECT amount FROM deposits WHERE id = ?", [$depositId]);
            $depositAmount = floatval($deposit[0]['amount']);

            $newStorageAmount = $storageAmount + $depositAmount;

            $dbManager->update('storage', ['id' => $storageId, 'amount' => $newStorageAmount]);
        }

    }

    if (isset($_POST['accept-withdrawal-submit'])) {
        $withdrawals = $_POST['withdrawal'];

        foreach ($withdrawals as $withdrawal) {

            $withdrawalId = intval($withdrawal);
            $dbManager->update('withdrawals', ['id' => $withdrawalId, 'submit' => 2]);

            // TODO retirer  de l'argent à l'utilisateur
            $user = $dbManager->select("SELECT owner_id FROM withdrawals WHERE id = ?", [$withdrawalId]);
            $userId = $user[0]['owner_id'];
            $currency = $dbManager->select("SELECT id_currency FROM withdrawals WHERE id = ?", [$withdrawalId]);
            $currencyId = $currency[0]['id_currency'];

            $storage = $dbManager->select("SELECT * FROM storage WHERE id_user = ? AND id_currency = ?", [$userId, $currencyId]);
            $storageId = $storage[0]['id'];
            $storageAmount = floatval($storage[0]['amount']);

            $withdrawal = $dbManager->select("SELECT amount FROM withdrawals WHERE id = ?", [$withdrawalId]);
            $withdrawalAmount = floatval($withdrawal[0]['amount']);

            $newStorageAmount = $storageAmount - $withdrawalAmount;

            $dbManager->update('storage', ['id' => $storageId, 'amount' => $newStorageAmount]);

        }

    }
    header('Location: ../manager_verify.php');
}