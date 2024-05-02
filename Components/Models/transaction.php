<?php

function updateAccountAndAddTransaction($db, $user, $accountName, $amount, $date, $note) {
  // Démarrer la transaction
  mysqli_begin_transaction($db);

  try {
      // Recherche de l'ID du compte à partir du nom et de l'ID de l'utilisateur
      $accountSearchQuery = "SELECT `id` FROM `compte` INNER JOIN `comptes_users` ON `compte`.`id` = `comptes_users`.`id_compte` 
                              WHERE `compte`.`name` = ? AND `comptes_users`.`id_user` = ?";
      $accountStmt = mysqli_prepare($db, $accountSearchQuery);
      mysqli_stmt_bind_param($accountStmt, "si", $accountName, $user['id']);
      mysqli_stmt_execute($accountStmt);
      $result = mysqli_stmt_get_result($accountStmt);
      $accountData = mysqli_fetch_assoc($result);

      if ($accountData) {
          $accountId = $accountData['id'];

          // Mise à jour du capital dans le compte
          $updateCapitalQuery = "UPDATE `compte` SET `capital` = `capital` + ? WHERE `id` = ?";
          $updateStmt = mysqli_prepare($db, $updateCapitalQuery);
          mysqli_stmt_bind_param($updateStmt, "di", $amount, $accountId);
          mysqli_stmt_execute($updateStmt);

          // Insertion de la nouvelle transaction
          $transactionInsertQuery = "INSERT INTO `transaction` (`id_compte`, `date`, `amount`, `note`) VALUES (?, ?, ?, ?)";
          $transactionStmt = mysqli_prepare($db, $transactionInsertQuery);
          mysqli_stmt_bind_param($transactionStmt, "isds", $accountId, $date, $amount, $note);
          mysqli_stmt_execute($transactionStmt);

          // Engagement de la transaction
          mysqli_commit($db);
          return true;
      } else {
          // Aucun compte trouvé, annulation de la transaction
          mysqli_rollback($db);
          return false;
      }
  } catch (Exception $e) {
      // En cas d'erreur, annulation de la transaction
      mysqli_rollback($db);
      return false;
  }
}
function getAllUserTransactions($db, $email) {
    require_once __DIR__ . '/user.php';
    require_once __DIR__ . '/compte.php';
    $user = getUser($db, $email);
    
    $accounts = getUserAccounts($db, $user);
  
    $allTransactions = [];
  
    foreach ($accounts as $account) {
        $accountId = $account['id'];
  
        $query = $db->prepare("SELECT * FROM transaction WHERE id_compte = ?");
        $query->bind_param("i", $accountId);
        $query->execute();
        $result = $query->get_result();
  
        while ($transaction = $result->fetch_assoc()) {
            $allTransactions[] = $transaction;
        }
  
        $query->close();
    }
  
    return $allTransactions;
  }

?>