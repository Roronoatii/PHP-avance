<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'Mon Compte';
$bannerTitle = 'MON COMPTE';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
require_once __DIR__ . '/../src/templates/partials/nav.php';

checkConnected(false, "account.php");
?>

<body>


    <form method="POST" action="actions/form_register.php">

    <div class="inscription">
        <h1 class="c">Inscription</h1>
<div class="o">
        <input placeholder="Nom" type="text" id="lastname" name="lastname" required>
</div>

    
<div class="o">
    
        <input placeholder="Prénom" type="text" id="firstname" name="firstname" required>
</div>
<div class="o">
        <input placeholder="Adresse e-mail" type="email" id="mail" name="mail" required>
</div>
<div class="o">
        <input placeholder="Mot de passe" type="password" id="password" name="password" required>
</div>
<div class="o">
        <input placeholder="Date de naissance" type="date" id="birthdate" name="birthdate" required>
</div>

<button type="submit">Inscription</button>

</div>
    </form>

    <style>
        
        body{
            background: linear-gradient(0deg, #112D52ff, #10284Bff, #0F2244ff, #0E1D3Eff, #0D1737ff, #0C1230ff, #0B0C29ff);
            font-family: 'Playfair Display', serif;
        }
        .inscription{
            text-align: center;
            border: 5px solid white;
            padding-bottom: 150px;
            border-radius: 50px;
            margin-right: 450px;
            margin-left: 450px;
            margin-top: 150px;
            margin-bottom: 150px;
            background: linear-gradient(0deg, #351151ff, #3A1054ff, #3F0F57ff, #440E5Bff, #490D5Eff, #4E0C61ff, #530B64ff);
            color: white;
            text-transform: uppercase;       
         }

         .c{
            padding-top: 50px;
        }

        .o{
            margin: 30px;
        }

        button{
        background: linear-gradient(0deg, #351151ff, #3A1054ff, #3F0F57ff, #440E5Bff, #490D5Eff, #4E0C61ff, #530B64ff);
        color: white;
        border-color: white;
        padding: 20px;
        padding-left: 40px;
        padding-right: 40px;
        margin: 20px;
        border-radius: 20px;

    }

        </style>
    <?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>

</html>