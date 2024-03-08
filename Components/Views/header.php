<?php 
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
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
        <!-- la partie pour acceder au profil et aux paramètres - le header-  -->
        <section >
            <header >
                <a href="#" class="totalHeader">
                    <div class="containerImage">
                        <?php 
                            $URLphotoDeProfil = "https://i.pinimg.com/236x/93/d4/2e/93d42e90b085e14f98bbca41c6ba43b4.jpg";
                            echo "<img class='photoDeProfil'  src='$URLphotoDeProfil'>" ;
                        ?>
                    </div>
                </a>
                <!-- texte pour souhaiter la bienvenue a l'utilisateur -->
                <div class="texteHeader">
                    <?php
                        $user = "Lisa, Majd et Mathis";
                        echo "<h1>Bonjour, $user !</h1>";
                    ?>
                </div>
                <!-- icon pour ouvrir les paramètre faire une modal -->
                <div class="iconHeader">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                        </svg>
                    </a>
                </div> 
            </header>
        </section>


<br>
<style>
    /* balises */

    body{
            overflow: hidden;
            font-family: Hind Siliguri;
        }

        header{
            display: flex;
            justify-content: space-between;
            align-items: center; 
            padding: 10px; 
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
</style>
