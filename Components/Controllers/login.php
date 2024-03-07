<?php
include(__DIR__ . "/../Models/user.php");
include(__DIR__ . "/../Models/db_connection.php");
session_start();

// Si user déjà connecté, on le redirige vers le dashboard
if (isset($_SESSION['user_id'])) {
  header("Location: dashboard.php");
  exit();
}

$db =connection();

// Réception du formulaire login
if (isset($_POST['email'], $_POST['password'])) {

  $email = $_POST['email'];
  $password = $_POST['password'];

  $user = getUser($db, $email);

  if ($user && password_verify($password, $user['password'])) {
    // Si le mdp est bon on stock l'user dans la session et on redirige vers le dashboard
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_email'] = $user['email'];
    header("Location: dashboard.php");
    exit();
  } else {
    echo "Email ou mot de passe incorrect.";
  }
}

?>