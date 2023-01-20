<?php
$isConnected = isset($_SESSION['logged']) && $_SESSION['logged'] == true;
if (isset($_GET['logout'])) {
    logout();
}
?>

<header>
    <h1>SUPRABANK</h1>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="contact.php">Nous contacter</a></li>
            <?php
            if ($isConnected) {
                if ($_SESSION['role'] > 10) {
                    echo '<li><a href="manager_verify.php">Administration</a></li>';
                }
                echo '<li><a href="account.php">Mon compte</a></li>';
                echo '<li><a href="?logout">Se déconnecter</a></li>';
            } else {
                echo '<li><a href="login.php">Se connecter</a></li>';
                echo '<li><a href="register.php">S\'inscrire</a></li>';
            }
            ?>
        </ul>
    </nav>
</header>