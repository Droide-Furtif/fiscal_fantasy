<div class="topnav">
    <a <?php if ($_SERVER['REQUEST_URI'] == '/')
        echo 'class="active"'; ?> href="/">Accueil</a>
    <a <?php if ($_SERVER['REQUEST_URI'] == '/login.php')
        echo 'class="active"'; ?> href="login.php">Connexion</a>
    <a <?php if ($_SERVER['REQUEST_URI'] == '/subscribe.php')
        echo 'class="active"'; ?>
        href="subscribe.php">Inscription</a>
</div>
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