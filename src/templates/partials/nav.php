
<body>
<nav>
        <div class="s">
        <h1 class="logo">LA SUPER BANQUE</h1>

        </div>

        <ul>

        <div class="h">

                <li><a href="index.php">Accueil</a></li>
                <li><a href="contact.php">Nous contacter</a></li>
                <li><a href="login.php">Se connecter</a></li>
                <li><a href="register.php">S'inscrire</a></li>
        </div>

        </ul>
    </nav>




    <style> 

    
    nav{
        display: flex;
        flex-direction: row;
        justify-content : right;
        text-transform: uppercase;
        color: white;
        width: 100%;
        height: 70px;
        font-size: 12px;
        padding-top: 15px;
        background: linear-gradient(0deg, #351151ff, #3A1054ff, #3F0F57ff, #440E5Bff, #490D5Eff, #4E0C61ff, #530B64ff);
    }

    .s{
        display: flex;
        flex-direction: column;
        padding-right: 600px;  
    }

    .logo{
        font-size: 30px;
    }
    .h{
        display: flex;
        flex-direction: row;
        justify-content: right;
        
    }

    .ul {
        list-style-type: none;
        display: flex;
        flex-direction: row;
        justify-content : left;

    }


    li{
        padding-right: 50px;
        display:flex;
        flex-direction: row;
        text-decoration: none;
        color: white;
        font-size: 11px;


    }

    li a{
        text-decoration: none;
        color: white;

    }
        </style>



</body>