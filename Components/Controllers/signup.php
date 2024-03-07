<?php  
include(__DIR__ . "/../Models/user.php");
include(__DIR__ . "/../Models/db_connection.php");

    if (isset($_POST['email'], $_POST['password'], $_POST['confirm-password'], $_POST['username'])) {

      $conn = connection();
      initTable($conn);
  
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = $_POST['password'];
      $confirmPassword = $_POST['confirm-password'];
      $username = mysqli_real_escape_string($conn, $_POST['username']);
  
      // Vérification du mot de passe
      $errors = [];
      if (!preg_match('/\d/', $password)) {
        $errors[] = "Le mot de passe doit contenir au moins un chiffre.";
      }
      if (!preg_match('/[A-Z]/', $password)) {
        $errors[] = "Le mot de passe doit contenir au moins une lettre majuscule";
      }
      if (!preg_match('/[a-z]/', $password)) {
        $errors[] = "Le mot de passe doit contenir au moins une lettre minuscule";
      }
      if (!(strlen($password) >= 7)) {
        $errors[] = "Le mot de passe doit contenir au moins 7 caractères";
      }
  
      if ($password !== $confirmPassword) {
        $errors[] = "Les mots de passe ne correspondent pas.";
      }
  
      if (!empty($errors)) {
        foreach ($errors as $error) {
          echo $error . "<br>";
        }
      } else {
        // on vérifie si l'email est déjà utilisé
        $mailExists = findInstances($conn, 'email', $email);
  
        if ($mailExists) {
          echo "L'email est déjà utilisé. Veuillez en choisir un autre.";
  
        } else {
          // on vérifie si l'username est déjà utilisé
          $usernameExists = findInstances($conn, 'name', $username);
  
          if ($usernameExists) {
            echo "Le nom d'utilisateur est déjà utilisé. Veuillez en choisir un autre."; 
          } else {
            // Si tout va bien, on ajoute l'user à la database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            registerUser($conn, $email, $hashedPassword, $username);
            header('Location: login.php');
          }
        }
      }
    }
?>