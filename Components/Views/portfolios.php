<?php
include(__DIR__ . "/../Controllers/portfolios.php");
?>
<html>
<head>
  <title>Vos comptes</title>
  <style>
  .button {
    display: inline-block;
    padding: 10px 15px;
    background-color: blue;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    cursor: pointer;
    width: 120px;
    text-align: center;
  }
  </style>
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
      <input type="submit" required></input>
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
        } else {
            elements.style.display = 'none';
            document.getElementById('showElementsBtn').innerHTML = "Ajouter un compte";
        }
    });
</script>
</html>
