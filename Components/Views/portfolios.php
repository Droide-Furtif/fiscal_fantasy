<?php
  include "Components/Controllers/portfolios.php";
?>
<html>
<head>
  <title>Vos comptes</title>

</head>
<body>
  <br>
  <a href="#" id="showElementsBtn" class="button">Ajouter un compte</a><br>

  <div id="elementsToDisplay" style="display: none;">
    <form method="post" action="">
      <input type="text" name="accName" required></input>
      <label name="accName">Nom du compte</label>
      <br>
      <select name="accType" required>
        <option value="1">Compte Epargne</option>
        <option value="2">Compte Courant</option>
        <option value="3">Actions</option>
      </select>
      <label name="accType">Type</label>
      <br>
      <select name="devise" required>
        <option value="1">€</option>
        <option value="2">$</option>
        <option value="3">£</option> 
      </select>
      <label name="devise">Devise</label>     
      <br>
      <input class="button" type="submit" required></input>
      </form>
  </div>
</body>
<script>
    document.getElementById('showElementsBtn').addEventListener('click', function(event) {
        event.preventDefault(); // Empêche le navigateur de suivre le lien
        var elements = document.getElementById('elementsToDisplay');
        if (elements.style.display === 'none') {
            elements.style.display = 'block';
            document.getElementById('showElementsBtn').innerHTML = "Annuler";
            document.getElementById('showElementsBtn').classList.remove('ajouter'); // Supprime la classe 'add-account'
            document.getElementById('showElementsBtn').classList.add('annuler'); // Ajoute la classe 'cancel'
        } else {
            elements.style.display = 'none';
            document.getElementById('showElementsBtn').innerHTML = "Ajouter un compte";
            document.getElementById('showElementsBtn').classList.remove('annuler'); // Supprime la classe 'cancel'
            document.getElementById('showElementsBtn').classList.add('ajouter'); // Ajoute la classe 'add-account'
        }
    });
</script>
</html>  
<style>
  #elementsToDisplay{
    display:flex;
    justify-content:center;
  }
  input{
    height:40px;
    width:200px;
    border: 2px solid  #40852F;
    border-radius: 10px;
    margin-bottom: 10px;
  }
  select{
    height:40px;
    width:200px;
    border: 2px solid  #40852F;
    border-radius: 10px;
    margin-bottom:10px;
  }
  .button {
    display: inline-block;
    padding: 10px 15px;
    background-color: #40852F;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    cursor: pointer;
    width: 120px;
    text-align: center;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
    transition: all 0.7s ease;
  }
  .button:hover{
    box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 10px -18px inset;
  }
  .annuler{
    width:100px;
    height:50px;
    text-align:center;
    color:white;
    background-color: #b76b70;
    border: 5px solid #b76B70;
    font-size:15px
  }
  </style>