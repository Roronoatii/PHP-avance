<?php

require_once __DIR__ . '/../src/init.php';
// $db
// $_SESSION

$page_title = 'Contact';
require_once __DIR__ . '/../src/templates/partials/html_head.php';
require_once __DIR__ . '/../src/templates/partials/header.php';

?>

<body>
    <div class="contacts">
        <h1 class="c">Contact</h1>

        <?= show_error(); ?>

        <div class="contact">
        <form action="/actions/form_contact.php" method="post">
            <div class="o">
                <input placeholder="Nom complet" type="text" id="fullname" name="fullname">
            </div>
            <div class="o">
                <input placeholder="Numéro de téléphone" type="text" id="phone" name="phone">
            </div>
            <div class="o">
                <input placeholder="Adresse e-mail" type="text" id="email" name="email">
            </div>
            <div class="o">
                <textarea placeholder="Votre message" name="message" id="textarea" cols="30" rows="10"></textarea>
            </div>
            <button type="submit">Envoyer</button>
        </form>
</div>
    </div>

    <?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>



<style>

    .contacts{
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
    .contact{
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
</html>