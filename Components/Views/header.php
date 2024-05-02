<?php 
    session_start();
    include(__DIR__ . "/../Models/user.php");
    include(__DIR__ . "/../Models/db_connection.php");
    $db = connection();
    $isAdmin = false;
    if (isset($_SESSION['user_email'])) {
    $user = getUser($db, $_SESSION['user_email']);}
    $isAdmin = isAdmin($db, $_SESSION['user_email']);
?>
<html>    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./bootstrap.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Hind+Siliguri:wght@300;400;500;600;700&family=Italianno&display=swap" rel="stylesheet">
        <title>Fiscal Fantasy</title>
        </head>
<body>

<section>
    <header>
        <!-- si l'utilisateur est connecté -->
        <!-- photo de profil -->
        <?php if (isset($_SESSION['user_id'])): ?> 
            <a href="#" class="totalHeader" id="openModal">
                <div class="containerImage">
                    <?php 
                        $URLphotoDeProfil = "https://i.pinimg.com/236x/93/d4/2e/93d42e90b085e14f98bbca41c6ba43b4.jpg";
                        echo "<img class='photoDeProfil' src='$URLphotoDeProfil' alt='Photo de profil'>";
                    ?>
                </div>
            </a>
            <!-- texte pour souhaiter la bienvenue a l'utilisateur -->
            <div class="texteHeader">
                <?php
                    echo "<h1>Bonjour, {$user['name']} !</h1>";
                ?>
            </div>
            <!-- icon pour ouvrir les paramètre faire une modal -->
            <div class="iconHeader" id="openSettings">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                    </svg>
                </a>
            </div>
            <!-- modal de la photo de profil -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h1 class="titre">Votre Profil</h1>
                    <div class="image">
                        <?php 
                            $URLphotoDeProfil = "https://i.pinimg.com/236x/93/d4/2e/93d42e90b085e14f98bbca41c6ba43b4.jpg";
                            echo "<img class='pdp' src='$URLphotoDeProfil' alt='Photo de profil'>";
                        ?>
                    </div>
                    <div class='champsModal'>
                        <p class="line"></p>
                        <?php echo "<p>Nom utilisateur : {$user['name']}";?></p>
                        <p class="line"></p>
                        <?php echo "<p>Email : {$user['email']}";?></p>
                        <p class="line"></p>
                        <p>Nombre de comptes :</p>
                        <p class="line"></p>

                    </div>
                </div>
            </div>
            <!-- modal des settings -->
            <div id="settingsModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h1 class="titre" id="param">Paramètres</h1>
                    <?php if ($isAdmin): ?>
                        <a <?php if ($_SERVER['REQUEST_URI'] == '/fiscal_fantasy/admin.php') echo 'class="active"'; ?> class="panelAdmin" href='/fiscal_fantasy/admin.php'>Accéder au panel administrateur</a>
                    <?php endif; ?>
                    <p>Settings à venir..</p>
                </div>
            </div>
        <?php endif ?>
            
        <!-- si l'utilisateur n'est pas connecté -->
        <?php if (!isset($_SESSION['user_id'])):?>
            <div class="texteHeaderUnlog" style="text-align: center; color:#40852F;">
                <h1>Fiscal Fantasy</h1>    
            </div>
        <?php endif ?>
    </header>
</section>
</body>
</html>

<script>
    // JavaScript pour afficher la modale et assombrir l'arrière-plan
    var modal = document.getElementById('myModal');
    var openModal = document.getElementById('openModal');
    var span = document.getElementsByClassName('close')[0];   
    var settingsModal = document.getElementById('settingsModal');
    var openSettings = document.getElementById('openSettings');
    var settingsClose = document.getElementsByClassName('close')[1];

        // modal pour photo de profil
    openModal.onclick = function() {
        modal.style.display = 'block';
    }

    span.onclick = function() {
        modal.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }

        // modal pour settings
    openSettings.onclick = function() {
        settingsModal.style.display = 'block';
    }

    settingsClose.onclick = function() {
        settingsModal.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target == settingsModal) {
            settingsModal.style.display = 'none';
        }
    }
</script>

<br>
<style>
    /* balises */

    body{
            overflow: auto;
            font-family: Hind Siliguri;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 20vh; 
            background-color:white;
            color: #40852F;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            z-index: 2; 
        }

        header svg{
            display:flex;
            justify-content:right;
        }    
        
        svg{
            width:24px;
            height:24px;
        }
    /*header*/
        /* pdp */ 
        .photoDeProfil{
                width:40%;
                border-radius:50%;
                margin:10px 0px 10px 10px;
                opacity: 1;
                display: block;
                height: auto;
                transition: .5s ease;
                backface-visibility: hidden;
                transition: transform .1s;
                flex-shrink: 0;
            }

            .photoDeProfil:hover{
                cursor:pointer;
                box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
                -ms-transform: scale(0.5); 
                -webkit-transform: scale(0.5); 
                transform: scale(1.1);
            }
        /* texte du header */
            .texteHeader{
                color:#40852F;
                margin-left:-150px;
            }
        
        /*icon du header*/
            .iconHeader {
                margin-left:10px
                flex: 1; 
                display: flex;
                justify-content:flex-end;
                align-items: center; 
                margin-top:-50px;
                transition: all 10s ease;
            }

            .iconHeader:hover{
                cursor:pointer;
            }

            .iconHeader:hover a {
                color: #40852F;
                text-decoration: none;
                transform: scale(1.2); 
            }



            .iconHeader svg {
                width: 30px; 
                height: 30px;
                margin-left:0px;
            }

            .iconHeader a{
                color:gray;
            }

            .iconHeader:hover a {
                color: #40852F;
                text-decoration: none;
                transform: scale(1.2);
            }
            
    /* modal */
        .modal {
                display: none;  
                z-index: 9999;
                top: 0;
                left: 0;
                width: 35%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.7); /* Fond gris transparent */
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .modal-content {
                background-color: #40852F;
                padding:20px;
                border: 1px solid #888;
                width: 33%; /* Un tiers de la largeur de l'écran */
                height: 97vh;
                max-width: 700px;
                margin: 10px auto;
                align-items:center;

            }

            .close {
                color: #aaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: black;
                text-decoration: none;
                cursor: pointer;
            }
        /* modal pdp */
        .titre{
            display:flex;
            justify-content:center;
            color:#40852F;
            font-size:50px;
        }
        .image {
        display: flex;
        justify-content: center;
        }
        .pdp {
            width: 25%;
            border-radius: 50%;
            opacity: 1;
            height: auto;
            align-self: center; /* Pour centrer l'image horizontalement */
        }
        .champsModal{
            color:#40852F;
        }
        .champsModal p{
            margin-top :40px;
            font-size : 35px;
        }
        .line{
            border: 0.5px solid #adbca9;
            margin-top : 10px;
        }
        /* modal settings */
        .panelAdmin{
            text-decoration:none;
            text-align:center;
            background-color:#40852F;
            border: 2px solid #40852F;
            color:white;
            border-radius:10px;
            height:50px;
            width:200px;
            display:flex;
            justify-content:center;
            align-items: center; /* Centrage vertical */
            margin: 0 auto; /* Centrage horizontal */
            margin-bottom:60px;
        }
        .panelAdmin:hover{
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
        #param{
            padding-bottom:70px;
        }

</style>
