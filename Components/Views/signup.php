<html>
<head><title>Sign-up</title></head>
<body>
  <div class="Libellé">
    <h1>Inscrivez-vous :</h1>
  </div>
  <!-- fromulaire d'inscription -->
  <div class="form">
    <form method="post" action="">
      <div class="row" id="userEmail">
        <div class="col">
          <label name="username">Username</label>
          <input class="input" type="text" name="username" required></input>
          <br>
        </div>
        <div class="col">
          <label name="email">Email</label>
          <input class="input" type="email"  name="email" required></input>
          <br>
        </div>
      </div>
      <div class="row" id="passwords">
        <div class="col">
          <label name="password">Password</label>
          <input class="input" type="password" name="password" required></input>
          <br>
        </div>
        <div class="col">
          <label name="confirm-password">Confirm password</label>
          <input class="input" type="password" name="confirm-password" required></input>
          <br>
        </div>
      </div>
      <input class="inputSubmit" type="submit" required></input>
    </form>
  </div>
</body>
</html>
<?php  
include(__DIR__ . "/../Controllers/signup.php");
?>

<style>
  input{
    display : flex;
    justify-content: center;
    align-items:center;
    height:35px;
    border-radius: 8px;
    border : 2px solid green;
    transition: all 0.5s ease;
  }
  

  label{
    color:green;
    display: block;
    margin-bottom: 5px;
  }    
  #userEmail{
    display:flex;
    justify-content:inline;
  }

  #passwords{
    display:flex;
    justify-content:inline;
  }
  .libellé{
    color:green;
    display : flex;
    justify-content: center;
    align-items:center;
    margin-top:50px;
    margin-bottom: 20px;
  }
  .libellé h1{
    font-size:70px;
  }
  .form{
    display : flex;
    justify-content: center;
    align-items:center;
  }
  .input:hover{
    width:102%;
    height:37px;
    border: 1px solid rgb(87, 213, 59);
  }
  .inputSubmit{
    background-color:green;
    color:white;
    box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
  }
  .inputSubmit:hover{
    box-shadow: rgb(30, 30, 30, 0.5) 3px 3px 6px 0px inset, rgba(30, 30, 30, 0.5) -3px -3px 6px 1px inset;
  }

</style>

