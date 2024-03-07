
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
