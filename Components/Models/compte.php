<?php
  function initTableAcc($db)
  {
      $request = "CREATE TABLE IF NOT EXISTS `fiscal_fantasybdd`.`compte` (`id` INT NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL ,`type` INT NOT NULL , `devise` INT NOT NULL , `capital` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
      return mysqli_query($db, $request);
  }

  /*
  function getAccounts($db, $user)
  {
      $request = "SELECT * FROM `compte` WHERE `email` = '" . $email . "'";
      return mysqli_fetch_array(mysqli_query($db, $request));
  }*/

  function registerAccount($db, $user, $name, $type, $devise) {
    // Première requête pour insérer le nouveau compte
    $capital = 0;
    $request = "INSERT INTO `compte` (`name`, `type`, `devise`, `capital`) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($db, $request);
    mysqli_stmt_bind_param($stmt, "sssi", $name, $type, $devise, $capital);

    // Exécuter la requête d'insertion du compte
    if (mysqli_stmt_execute($stmt)) {
        // Obtenir l'ID du compte nouvellement inséré
        $accountId = mysqli_insert_id($db);

        // Seconde requête pour insérer dans la table de liaison `comptes-users`
        $linkRequest = "INSERT INTO `comptes_users` (`id_compte`, `id_user`) VALUES (?, ?)";
        $stmtLink = mysqli_prepare($db, $linkRequest);
        mysqli_stmt_bind_param($stmtLink, "ii", $accountId, $user['id']);

        // Exécuter la requête d'insertion dans la table de liaison
        if (mysqli_stmt_execute($stmtLink)) {
            // Si tout se passe bien, retourner true
            return true;
        } else {
            // En cas d'erreur lors de l'insertion dans la table de liaison
            return false;
        }
    } else {
        // En cas d'erreur lors de l'insertion du compte
        return false;
    }
}

function getUserAccounts($db, $user) {
  $userId = $user['id'];
  // Préparer la requête SQL
  $query = "SELECT compte.* FROM compte 
            JOIN comptes_users ON compte.id = comptes_users.id_compte 
            WHERE comptes_users.id_user = ?";

  // Préparer la requête pour éviter les injections SQL
  if ($stmt = mysqli_prepare($db, $query)) {
      // Lier le paramètre $userId à la requête
      mysqli_stmt_bind_param($stmt, "i", $userId);

      // Exécuter la requête
      mysqli_stmt_execute($stmt);

      // Récupérer les résultats
      $result = mysqli_stmt_get_result($stmt);

      // Initialiser un tableau pour stocker les comptes
      $accounts = [];

      // Parcourir les résultats et les ajouter au tableau
      while ($row = mysqli_fetch_assoc($result)) {
          $accounts[] = $row;
      }

      // Libérer le résultat
      mysqli_stmt_free_result($stmt);

      // Fermer la déclaration
      mysqli_stmt_close($stmt);

      // Retourner le tableau des comptes
      return $accounts;
  } else {
      // Gestion de l'erreur de préparation de la requête
      return false;
  }
}
/*
  function findInstances($db, $champ, $instance) {
      $query = "SELECT * FROM user WHERE " . $champ . " = ?";
      $stmt = mysqli_prepare($db, $query);
      mysqli_stmt_bind_param($stmt, "s", $instance);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      $liste = [];

      while ($row = mysqli_fetch_assoc($result)) {
          $liste[] = $row;
      }

      mysqli_stmt_close($stmt);

      return $liste;
  }*/
  
