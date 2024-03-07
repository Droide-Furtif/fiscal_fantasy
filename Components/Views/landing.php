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

        <!-- la navbar vertical a gauche + container centrale-->
        <section >
            <div class="container-fluid" id="containerNavbar">
                <div class="row" >
                    <!-- navbar -->
                    <div class="col-2" id="navbarVertical" >
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link" id="v-pills-Accueil-tab" data-toggle="pill" href="#v-pills-Accueil" role="tab" aria-controls="v-pills-Accueil" aria-selected="true">Accueil</a>
                            <a class="nav-link" id="v-pills-Porte-feuille-tab" data-toggle="pill" href="#v-pills-Porte-feuille" role="tab" aria-controls="v-pills-Porte-feuille" aria-selected="false">Porte-feuille</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                            <a class="nav-link" id="v-pills-Paramètre-tab" data-toggle="pill" href="#v-pills-Paramètre" role="tab" aria-controls="v-pills-Paramètre" aria-selected="false">Paramètre</a>
                        </div>
                        
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-Accueil" role="tabpanel" aria-labelledby="v-pills-Accueil-tab">...</div>
                            <div class="tab-pane fade" id="v-pills-Porte-feuille" role="tabpanel" aria-labelledby="v-pills-Porte-feuille-tab">...</div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                            <div class="tab-pane fade" id="v-pills-Paramètre" role="tabpanel" aria-labelledby="v-pills-Paramètre-tab">...</div>
                        </div>
                    </div>
                    
                </div>
                <!-- container central -->
                <div class="col-11" style="flex-grow: 1;">
                    <div class="container mainContent" style="display: flex; flex-direction: column; height: 100vh;">
                        <div class="containerCentral">
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </section>
    </body>
</html>
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

    /* id */    
        /* navbar */
            #containerNavbar {
                padding: 0px;
                height: 100%;
                display:flex;
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

    /*navbar*/
        .container-fluid {
            display: flex;
            flex-grow: 1;
        }
        .container-fluid,
            #navbarVertical {
            align-items: stretch;
        }

        #navbarVertical {
        background-color: #40852F;
        color: white;
        font-size: 20px;
        text-align: center;
        height: 90vh;
        display: flex;
        flex-direction: column;
        width:200px;
        z-index: 1;
        }
        .navbar {
                height: 100%;
                flex-direction: column;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 1;
                
            }
            .nav.flex-column{
                width:100%;
            }
            .nav-pills{
                flex:1;
                display:flex;
                flex-direction:column;
                justify-content:space-around;
                align-items: center;
            }
            .nav-pills a {
                flex: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                position:relative;
                transition: all 0.5s ease;
            }
            .nav-pills a:hover {
                color: white;
                text-decoration: none;
                transform: scale(1.1); 
                letter-spacing: 2px;
            }
            .nav-pills a:before,
            .nav-pills a:after{
                position: absolute;
                left: 0px;
                width: 100%;
                height: 2px;
                background: white;
                content: "";
                opacity: 0;
                transition: all 0.5s;
            }
            .nav-pills a:before {
                top: 0px;
                transform: translateY(60px);
            }

            .nav-pills a:after {
                bottom: 0px;
                transform: translateY(-60px);
            }

            .nav-pills a:hover:before,
            .nav-pills a:hover:after {
                opacity: 1;
            }
            .nav-pills a:last-child{
                margin-bottom:20px;
            }

            .navbar-brand {
                padding: 0.75rem;
            }

            .navbar-nav {
                width: 100%;
            }

            .navbar-nav .nav-link {
                text-align: center;
                
            } 

            .nav-link{
                color:#AFC0AB;
                flex:1;
                display:flex;
                align-items:center;
                justify-content:center;
                transition: background-color 0.3s;
            
            }

            .nav-link:hover{
                color:white;
                text-decoration:none;

            }
        
        
    /* container au centre */
        .mainContent {
            display: flex;
            align-items: center;
            height: calc(100vh - 70px);
        }
            
        .containerCentral {
            width: 100%;
            background-color: #F9F9F9;
            border-radius: 10px;
            flex-grow: 1;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column; 
            margin-left: -20px;
            margin-bottom: 143px;
        }


</style>
