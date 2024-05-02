<?php
  include "Components/Controllers/transaction.php";
?>
<html>
<head>
  <title>Transactions</title>
  
</head>
<body>
  <p class="line"></p>
  <h1 class="titre">Transaction</h1>
  <p class="line"></p>
  <br>
  <div class="boutonDisplay">
    <!-- Bouton pour ajouter un revenu -->
    <a href="#" id="boutonRevenu" class="button">Ajouter un revenu</a>
    <br><br>
    <!-- Bouton pour ajouter une dépense -->
    <a href="#" id="boutonDepense" class="button">Ajouter une dépense</a>
    <br><br>
  </div>

<!--   modal pour ajouter un revenu  -->
  <div id="modalRevenu" class="modalTr" style="display: none;">
    <div class="modalTr-content">
    <span class="close">&times;</span>
      <div id="elementsToDisplayRevenu">
        <h1 class="titre" >Revenu</h1>
        <br>
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
          <input class="submit" type="submit" required></input>
        </form>
      </div>
    </div>
  </div>

  <!-- modal de dépenses -->

  <div id="modalDepense" class="modalTr" style="display: none;">
    <div class="modalTr-content">
    <span class="close">&times;</span>
      <div id="elementsToDisplayDepense">
      <h1 class="titre" >Dépense</h1>
      <br>
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
          <input class="submit" type="submit" required></input>
        </form>
      </div>
    </div>
  </div>

</body>
<script>
  // Affichage des élements quand on click sur le bouton revenu
  document.getElementById('boutonRevenu').addEventListener('click', function(event) {
    event.preventDefault(); // Empêche le navigateur de suivre le lien
    var modal = document.getElementById('modalRevenu');
    modal.style.display = "block";
  });

  // Affichage des élements quand on click sur le bouton dépense
  document.getElementById('boutonDepense').addEventListener('click', function(event) {
    event.preventDefault(); // Empêche le navigateur de suivre le lien
    var modal = document.getElementById('modalDepense');
    modal.style.display = "block";
  });
</script>
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
  .titre{
      display:flex;
      justify-content:center;
      color:#40852F;
      font-size:50px;
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
  .boutonDisplay{
    display:flex;
    justify-content:space-evenly;
    align-items: center;
    padding-top:25vh;
    padding-left:20vh;
  }
  .annuler{
    width:100px;
    height:50px;
    text-align:center;
    color:white;
    background-color: #b7}

    .modalTr {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    left: 0;
    top:0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 3;
    overflow: auto;
  }

  .modalTr-content {
    margin:auto;
    margin-top:30vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #fefefe;
    padding: 20px;
    border-radius: 10px;
    width: 50%;
  }

  .submit{
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
  .submit:hover{
    box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 10px -18px inset;
  
  }

  #elementsToDisplayRevenu,
  #elementsToDisplayDepense {
    text-align: center;
  }
  