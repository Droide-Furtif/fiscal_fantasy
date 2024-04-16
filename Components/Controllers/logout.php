<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

session_unset();
session_destroy();
header("Location: /fiscal_fantasy/index.php");
exit;
?>
