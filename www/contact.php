<?php

require_once __DIR__ . '/../src/init.php';
// $db
// $_SESSION

$page_title = 'Contact';
require_once __DIR__ . '/../src/templates/partials/html_head.php';


require_once __DIR__ . '/../src/templates/partials/nav.php';

?>

<body>
    <div class="contact">
        <h1 class="c">Contact</h1>

        <?= show_error(); ?>

        <form action="/actions/form_contact.php" method="post">
            <div class="o">
                <input  placeholder="Votre nom" type="text" id="fullname" name="fullname">
            </div>
            <div class="o">
                <input placeholder="Votre numéro de téléphone" type="text" id="phone" name="phone">
            </div>
            <div class="o">
                <input placeholder="Votre adresse e-mail" type="text" id="email" name="email">
            </div>
            <div class="o">
                
                <textarea placeholder="Votre message" name="message" id="textarea" cols="30" rows="10"></textarea>
            </div>
            <button type="submit">Envoyer</button>
        </form>
    </div>



    <style>
        body{
            background: linear-gradient(0deg, #112D52ff, #10284Bff, #0F2244ff, #0E1D3Eff, #0D1737ff, #0C1230ff, #0B0C29ff);
            font-family: 'Playfair Display', serif;

        }

        .c{
            padding-top: 50px;
        }
        .contact{
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