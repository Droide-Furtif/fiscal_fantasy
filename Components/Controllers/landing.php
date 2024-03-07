<?php
// Si user déjà connecté, on le redirige vers le dashboard
session_start();
if (isset($_SESSION['user_id'])) {
  header("Location: /fiscal_fantasy/dashboard.php");
  exit();
}
?>