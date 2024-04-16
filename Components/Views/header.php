<?php 
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
?>

<div class="topnav">
    <a <?php if ($_SERVER['REQUEST_URI'] == '/fiscal_fantasy/index.php' || $_SERVER['REQUEST_URI'] == '/fiscal_fantasy/dashboard.php')
        echo 'class="active"'; ?> href="/fiscal_fantasy/index.php">Accueil</a>
    <?php if (!isset($_SESSION['user_id'])): ?>
        <a <?php if ($_SERVER['REQUEST_URI'] == '/fiscal_fantasy/login.php') echo 'class="active"'; ?> href="/fiscal_fantasy/login.php">Connexion</a>
        <a <?php if ($_SERVER['REQUEST_URI'] == '/fiscal_fantasy/signup.php') echo 'class="active"'; ?> href="/fiscal_fantasy/signup.php">Inscription</a>
    <?php endif; ?>
    <?php if (isset($_SESSION['user_id'])): ?> 
      <a href='/fiscal_fantasy/portfolios.php'>Comptes</a>
      <a href='/fiscal_fantasy/Components/Controllers/logout.php'>Déconnexion</a>
    <?php endif; ?>
</div>
<br>
<style>
    .topnav {
        background-color: #333;
        overflow: hidden;
    }

    /* Style the links inside the navigation bar */
    .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    /* Change the color of links on hover */
    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    /* Add a color to the active/current link */
    .topnav a.active {
        background-color: #04AA6D;
        color: white;
    }
</style>