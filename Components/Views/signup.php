<html>
<head><title>Sign-up</title></head>
<body>
  <form method="post" action="">
    <input class="input" type="text" name="username" required></input>
    <label name="username">Username</label>
    <br>
    <input class="input" type="email"  name="email" required></input>
    <label name="email">Email</label>
    <br>
    <input class="input" type="password" name="password" required></input>
    <label name="password">Password</label>
    <br>
    <input class="input" type="password" name="confirm-password" required></input>
    <label name="confirm-password">Confirm password</label>
    <br>
    <input class="inputSubmit" type="submit" required></input>
  </form>
</body>
</html>
<?php  
include(__DIR__ . "/../Controllers/signup.php");
?>

