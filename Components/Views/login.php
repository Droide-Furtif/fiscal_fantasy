<html>
<head><title>Log-in</title>
</head>
<body>
  <!-- connection -->
  <div class="Libelle">
    <h1>Connectez vous :</h1>
  </div>
  <form class="form" method="post" action="">
    <div class="row">
      <div class="col" id="colMail">
        <label  name="email">Email</label>
        <input class="input" id="userEmail" type="email" name="email" required></input>
        <br>
      </div>
      <div class="col" id="colPass">
        <label name="password">Password</label>
        <input class="input" id="password" type="password" name="password" required></input>
        <br>
      </div>
    </div>
    <input class="inputSubmit" type="submit" required></input>
  </form>
 
  </form>
</body>
</html>
<?php  
include(__DIR__ . "/../Controllers/login.php");
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
  .libelle{
    color:green;
    display : flex;
    justify-content: center;
    align-items:center;
    margin-top:150px;
    margin-bottom: 20px;
  }
  .libelle h1{
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
    margin-left:20px;
    background-color:green;
    color:white;
    box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
  }
  .inputSubmit:hover{
    box-shadow: rgb(30, 30, 30, 0.5) 3px 3px 6px 0px inset, rgba(30, 30, 30, 0.5) -3px -3px 6px 1px inset;
  }

</style>

