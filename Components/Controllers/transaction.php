<?php
include(__DIR__ . "/../Models/compte.php");
include(__DIR__ . "/../Models/transaction.php");

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

$db = connection();

function getAccountsNames() {
  global $db;
  $user = getUser($db, $_SESSION['user_email']);
  $res = getUserAccounts($db, $user);
  return $res;
}

if (isset($_POST['accountName'], $_POST['amount'], $_POST['date'], $_POST['incomeOrExpense'])) {
  global $db;
  $user = getUser($db, $_SESSION['user_email']);
  
  $accName = $_POST['accountName'];
  $amount = $_POST['amount'];
  $date = $_POST['date'];
  $note = isset($_POST['note'])? $_POST['note'] : ""; // On check si le champ a été rempli ou pas

  if ($_POST['incomeOrExpense'] == 'expense') {
    $amount = - $amount;  // Si c'est un dépense on inverse le montant
  }

  updateAccountAndAddTransaction($db, $user, $accName, $amount, $date, $note);
}

?>