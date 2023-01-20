<?php
require_once __DIR__ . '/../src/init.php';

$page_title = 'Contact';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

checkConnected(false, "account.php");
?>
<?php require_once __DIR__ . '/../src/templates/partials/header.php'; ?>
    <?php require_once __DIR__ . '/../src/templates/partials/header.php'; ?>

<body>
    
    <div class="logins">
    <h1 class="c"> Connexion</h1>

    <div class="login">
    <form action="actions/form_login.php" method="POST">
        <div class="o">
            <input placeholder="Adresse e-mail" type="text" id="mail" name="mail" required>
        </div>

        <div class="o">
            <input placeholder="Mot de passe" type="password" id="password" name="password" required>
        </div>
        <input type="submit" name="login-submit" value="Connexion">
    </form>
</div>
</div>
    <?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>


    <style>

    .logins{
        border: 3px solid black;
        margin-left: 550px;
        margin-right: 550px;
        padding-top: 30px;
        margin-top: 60px;
        margin-bottom: 60px;
        border-radius: 30px;


        
    }
    .c{
        text-align: center;
    }
    .login{
        text-align: center;
    }

    .o{
        padding-top: 20px;
    }

    button{
        padding-right: 70px;
        padding-left: 70px;
        padding-top: 30px;
        padding-bottom: 30px;

    }
    </style>
</body>