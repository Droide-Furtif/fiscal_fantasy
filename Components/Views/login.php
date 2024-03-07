<html>
<head><title>Log-in</title>
</head>
<body>
  <form method="post" action="">
    <input type="email" name="email" required></input>
    <label name="email">Email</label>
    <br>
    <input type="password" name="password" required></input>
    <label name="password">Password</label>
    <br>
    <input type="submit" required></input>
  </form>
</body>
</html>
<?php  
include(__DIR__ . "/../Controllers/login.php");
?>