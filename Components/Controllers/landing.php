<?php
// Si user déjà connecté, on le redirige vers le dashboards
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['user_id'])) {
  header("Location: /fiscal_fantasy/dashboard.php");
  exit();
}
?>