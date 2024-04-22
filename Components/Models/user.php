<?php
  function initTable($db)
  {
      $request = "CREATE TABLE IF NOT EXISTS `fiscal_fantasybdd`.`user` (`id` INT NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL ,`email` TEXT NOT NULL , `password` TEXT NOT NULL , PRIMARY KEY (`id`), UNIQUE `email` (`email`), UNIQUE `name` (`name`)) ENGINE = InnoDB";
      return mysqli_query($db, $request);
  }
 
  function getUser($db, $email)
  {
      $request = "SELECT * FROM `user` WHERE `email` = '" . $email . "'";
      return mysqli_fetch_array(mysqli_query($db, $request));
  }
  
  function registerUser($db, $email, $hashed_password, $username) {
      $request = "INSERT INTO `user` (`email`, `password`, `name`) VALUES ('" . $email . "', '" . $hashed_password . "', '" . $username . "')";
      return mysqli_query($db, $request);
  }

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
  }
  