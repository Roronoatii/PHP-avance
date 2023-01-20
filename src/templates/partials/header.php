<header>

    <nav>
        <div class="s">
        <h1><a href="index.php">LA SUPER BANQUE</a></h1>

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


    <div>
   <h1 class="pres"> La banque qui vous accompagne</h1>
    <p class="p">Rapide - Stable - Efficace</p>
</div>
   <div class="button">
   <button><a href="register.php">S'incrire</a></button>
   <button><a href="login.php">Se connecter</a></button>

</div>
</header>

<section>


</section>
<style>

a{
    text-decoration: none;
    color: white;
}
body{
    margin: 0;
     padding: 0;
    background-color: #325056;
    font-family: 'Playfair Display', serif;

}
    nav{
        display: flex;
        flex-direction: row;
        justify-content : right;
        text-transform: uppercase;
        color: white;
        width: 100%;
        font-size: 12px;
        padding-top: 15px;
    }

    .p{
        text-align: center;
        padding-bottom: 150px;
        padding-top: 10px;
        font-size: 24px;

    }
    header{
        background: linear-gradient(0deg, #351151ff, #3A1054ff, #3F0F57ff, #440E5Bff, #490D5Eff, #4E0C61ff, #530B64ff);
        color: white;
        min-height: 500px;

    }

    .pres{
        text-align: center;
margin-top: 200px;
padding-bottom: 10px;   
text-transform: uppercase;
 }
    h1{
        justify-content : left;
    }

    .ul {
        list-style-type: none;
        display: flex;
        flex-direction: row;
        justify-content : left;

    }

    .s{
        display: flex;
        flex-direction: column;
        padding-right: 550px;        
    }

    .s a{
        text-decoration:none;
        color: white;
    }
    .h{
        display: flex;
        flex-direction: row;
        justify-content: right;
        
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


    section{
        height: 900px;
        background: linear-gradient(0deg, #112D52ff, #10284Bff, #0F2244ff, #0E1D3Eff, #0D1737ff, #0C1230ff, #0B0C29ff);
    }

    .button{
        display: flex;
        flex-direction: row;
        justify-content: center;
        padding-bottom: 30px;

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

    button:hover{
        background-color: white;
        color: black;
    }

    
    </style>