<?php
  include "Components/Controllers/transaction.php";
?>
<html>
<head>
  <title>Transactions</title>
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
  <!-- Bouton pour ajouter un revenu -->
  <a href="#" id="boutonRevenu" class="button">Ajouter un revenu</a>
  <div id="elementsToDisplayRevenu" style="display: none;">
    <form method="post" action="">
      <label name="accountName">Compte</label>
      <?php
      // On affiche chaque nom de compte dans un menu déroulant
      echo '<select name="accountName" required>';
      $accounts = getAccountsNames();
      foreach ($accounts as $account) {
          $accountNameEscaped = htmlspecialchars($account['name'], ENT_QUOTES, 'UTF-8');
          echo "<option value='{$accountNameEscaped}'>{$accountNameEscaped}</option>";
      }
      echo '</select>';
      ?>
      <br>
      <label name="amount">Montant</label>
      <input type="number" min="0" name="amount" required></input>
      <br>
      <label name="date">Date</label>
      <input type="date" name="date" required></input>
      <br>
      <label name="note">Note</label>
      <input type="text" name="note" value=""></input>
      <br>
      <input type="hidden" name="incomeOrExpense" value="income" />
      <input type="submit" required></input>
    </form>
  </div>
  <br><br>

  <!-- Bouton pour ajouter une dépense -->
  <a href="#" id="boutonDepense" class="button">Ajouter une dépense</a><br>
  <div id="elementsToDisplayDepense" style="display: none;">
    <form method="post" action="">
      <label name="accountName">Compte</label>
      <?php
      echo '<select name="accountName" required>';
      $accounts = getAccountsNames();
      foreach ($accounts as $account) {
          $accountNameEscaped = htmlspecialchars($account['name'], ENT_QUOTES, 'UTF-8');
          echo "<option value='{$accountNameEscaped}'>{$accountNameEscaped}</option>";
      }
      echo '</select>';
      ?>
      <br>
      <label name="amount">Montant</label>
      <input type="number" min="0" name="amount" required></input>
      <br>
      <label name="date">Date</label>
      <input type="date" name="date" required></input>
      <br>
      <label name="note">Note</label>
      <input type="text" name="note" value=""></input>
      <br>
      <input type="hidden" name="incomeOrExpense" value="expense" />
      <input type="submit" required></input>
    </form>
  </div>
</body>
<script>
  // Affichage des élements quand on click sur le bouton revenu
    document.getElementById('boutonRevenu').addEventListener('click', function(event) {
        event.preventDefault(); // Empêche le navigateur de suivre le lien
        var elements = document.getElementById('elementsToDisplayRevenu');
        if (elements.style.display === 'none') {
            elements.style.display = 'block';
            document.getElementById('boutonRevenu').innerHTML = "Annuler";
        } else {
            elements.style.display = 'none';
            document.getElementById('boutonRevenu').innerHTML = "Ajouter un revenu";
        }
    });

  // Pareil pour le bouton dépense
    document.getElementById('boutonDepense').addEventListener('click', function(event) {
        event.preventDefault(); // Empêche le navigateur de suivre le lien
        var elements = document.getElementById('elementsToDisplayDepense');
        if (elements.style.display === 'none') {
            elements.style.display = 'block';
            document.getElementById('boutonDepense').innerHTML = "Annuler";
        } else {
            elements.style.display = 'none';
            document.getElementById('boutonDepense').innerHTML = "Ajouter une dépense";
        }
    });
</script>
</html>