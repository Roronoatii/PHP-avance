<?php
require_once(__DIR__ . '/../../src/init.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register-submit'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
<<<<<<< HEAD
        //$iban = $_POST['iban'];
=======
>>>>>>> 648e2108b9485ebf0990a3fdd93d8ebdee7b9d74
        $birthdate = $_POST['birthdate'];
        $email = $_POST['mail'];
        $password = $_POST['password'];

        $query = $dbManager->select("SELECT * FROM users WHERE mail = ?", [$email], 'User');

        if (count($query) > 0) {
            var_dump("Cette adresse email est déjà utilisée, veuillez en saisir une autre");
        } else {
            createAccount($firstname, $lastname, $email, $password, $birthdate);

            $user = $dbManager->select("SELECT * FROM users WHERE mail = ?", [$email], 'User');
            $userId = $user[0]->id;

            // create a storage for the user for each currency
            for ($currencyId = 1; $currencyId <= 5; $currencyId++) {
                $sql = "INSERT INTO `storage` (`id_user`, `id_currency`) VALUES (?, ?)";
                $dbManager->insert($sql, [$userId, $currencyId]);
            }

            header('Location: ../login.php?register=success');
            exit;
        }
    }
}
?>