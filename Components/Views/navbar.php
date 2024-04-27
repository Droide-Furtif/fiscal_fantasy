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

        <!-- la navbar vertical a gauche -->
        <section >
            <div class="container-fluid" id="containerNavbar">
                <div class="row" >
                    <!-- navbar -->
                    <div class="col-2" id="navbarVertical" >
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <?php if (!isset($_SESSION['user_id'])): ?>
                            <a <?php if ($_SERVER['REQUEST_URI'] == '/fiscal_fantasy/accueilUnlogged.php') echo 'class="active"' ?>class="nav-link" id="v-pills-Accueil-tab" data-toggle="pill" href="/fiscal_fantasy/accueilUnlogged.php" role="tab" aria-controls="v-pills-Accueil" aria-selected="true">Accueil</a>
                            <a <?php if ($_SERVER['REQUEST_URI'] == '/fiscal_fantasy/login.php') echo 'class="active"'; ?>class="nav-link" id="v-pills-Accueil-tab" data-toggle="pill" href="/fiscal_fantasy/login.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Connexion</a>
                            <a <?php if ($_SERVER['REQUEST_URI'] == '/fiscal_fantasy/signup.php') echo 'class="active"'; ?>class="nav-link" id="v-pills-Accueil-tab" data-toggle="pill" href="/fiscal_fantasy/signup.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Inscription</a>
                            <?php endif; ?>

                            <?php if (isset($_SESSION['user_id'])): ?> 
                            <a <?php if ($_SERVER['REQUEST_URI'] == '/fiscal_fantasy/dashboard.php') echo 'class="active"' ?>class="nav-link" id="v-pills-Accueil-tab" data-toggle="pill" href="/fiscal_fantasy/dashboard.php" role="tab" aria-controls="v-pills-Accueil" aria-selected="true">Accueil</a>
                            <a class="nav-link" id="v-pills-Porte-feuille-tab" data-toggle="pill" href='/fiscal_fantasy/portfolios.php' role="tab" aria-controls="v-pills-messages" aria-selected="false">Comptes</a>
                            <a class="nav-link" id="v-pills-Porte-feuille-tab" data-toggle="pill" href='/fiscal_fantasy/portfolios.php' role="tab" aria-controls="v-pills-messages" aria-selected="false">Groupes</a>
                            <a class="nav-link" id="v-pills-Porte-feuille-tab" data-toggle="pill" href='/fiscal_fantasy/Components/Controllers/logout.php' role="tab" aria-controls="v-pills-messages" aria-selected="false">Déconnexion</a>
                            <?php endif; ?>
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
                            <?php 
                                $currentPage = isset($currentPage) ? $currentPage : '';

                                $pages = [
                                    'accueilUnlogged' => "C:/xampp/htdocs/fiscal_fantasy/Components/Views/accueilUnlogged.php",
                                    'dashboard' => "C:/xampp/htdocs/fiscal_fantasy/Components/Views/dashboard.php",
                                    'login' =>  "C:/xampp/htdocs/fiscal_fantasy/Components/Views/login.php",
                                    'signup' => "C:/xampp/htdocs/fiscal_fantasy/Components/Views/signup.php",
                                    'portfolios' => "C:/xampp/htdocs/fiscal_fantasy/Components/Views/portfolios.php"
                                ];

                                if (array_key_exists($currentPage, $pages)){
                                    include $pages[$currentPage];
                                }
                                else{
                                    include "C:/xampp/htdocs/fiscal_fantasy/Components/Views/errorPage.php";
                                }

                            ?>
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

            a.active{
                color: black;
                text-decoration: none;
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
<?php
  include(__DIR__ . "/../Controllers/landing.php");
?>


