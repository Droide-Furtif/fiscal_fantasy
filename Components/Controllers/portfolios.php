<?php
require_once __DIR__ . "/../Models/compte.php";
require_once __DIR__ . "/../Controllers/convert.php";

# Messages d'erreurs activés, à enlever à la fin
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

$db = connection();
$user = getUser($db, $_SESSION['user_email']);

if (isset($_POST['accName'], $_POST['accType'], $_POST['devise'])) {

  $accName = $_POST['accName'];
  $accType = $_POST['accType'];
  $devise = $_POST['devise'];

  registerAccount($db, $user, $accName, $accType, $devise);
}
$accounts = getUserAccounts($db, $user);
echo '<div style="display: flex; flex-wrap: wrap; gap: 80px;">';
foreach($accounts as $account) {
  echo("<div>
    <h3>" . $account['name'] . "</h3>
    <p>Type: " . convertTypeCodeToString($account['type']) . "</p>
    <p>Capital: " . convertCurrencyCodeToSymbol($account['devise']) . " " . $account['capital'] . "</p>
    <form action='Components/Models/delete_account.php' method='POST'>
      <input type='hidden' name='account_id' value='" . $account['id'] . "'>
      <button type='submit' name='delete'>Supprimer</button>
    </form>
  </div>");
}
echo("</div>");

?>
