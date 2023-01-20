<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'Mon Compte';
$bannerTitle = 'MON COMPTE';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

checkConnected(false, "account.php");
?>
<?php require_once __DIR__ . '/../src/templates/partials/header.php'; ?>
    <?php require_once __DIR__ . '/../src/templates/partials/banner.php'; ?>

<body>




    <div class="registers">
    <h1 class="c"> Inscription</h1>

    <div class="register">
    <form action="actions/form_register.php" method="POST">
        <div class="o">
        <input placeholder="Prénom" type="text" id="firstname" name="firstname" required>
        </div>

        <div class="o">
        <input placeholder="Nom" type="text" id="lastname" name="lastname" required>
</div>
        <div class="o">
        <input placeholder="E-mail" type="email" id="mail" name="mail" required>


        </div>
        <div class="o">

        <input placeholder="Mot de passe" type="password" id="password" name="password" required>
        </div>


        <div class="o">
        <input placeholder="Date de naissance" type="date" id="birthdate" name="birthdate" required>

        </div>

        <input type="submit" name="register-submit" value="Inscription">
    </form>
</div>
</div>


<?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>

<style>

    .registers{
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
    .register{
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

</html>