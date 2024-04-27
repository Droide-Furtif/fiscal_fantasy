<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin</title>
</head>
<body>
    <form action="" method="post">
        <p class="line"></p>
        <h1 class="Admin">Administration</h1>
        <p class="line"></p>
        <label class="intTable" for="table">Choisissez une table:</label>
<!-- /!\ Les 'value' des options, dans l'html comme le js, DOIVENT correspondrent au nom du champ/table dans la bdd -->
        <select id="table" name="table" onchange="updateFields()">
            <option value="user">User</option>
            <option value="compte">Compte</option>
            <option value="transaction">Transaction</option>
        </select>

        <label class="intField" for="field">Choisissez un champ:</label>
        <select id="field" name="field">
            <!-- Les options seront ajoutées ici par JS -->
        </select>

        <label class="intFilter" for="filter">Filtre (facultatif):</label>
        <input type="text" id="filter" name="filter">

        <input type="submit" value="Rechercher">
    </form>

    <div id="results">
        <!-- Les resultats seront ajoutés ici par PHP -->
    </div>

    <script>
      // Fonction pour ajouter les bonnes options dans le select de Champ, selon la Table choisie
        function updateFields() {
            var table = document.getElementById('table').value;
            var fieldSelect = document.getElementById('field');
            fieldSelect.innerHTML = '';

            if (table == 'user') {
                fieldSelect.innerHTML = '<option value="name">Nom</option><option value="email">Email</option>';
            } else if (table == 'compte') {
                fieldSelect.innerHTML = '<option value="name">Nom</option><option value="capital">Capital</option><option value="devise">Devise</option><option value="type">Type</option>';
            } else if (table == 'transaction') {
                fieldSelect.innerHTML = '<option value="amount">Montant</option><option value="id_compte">Compte</option><option value="date">Date</option><option value="note">Note</option>';
            }
        }

        // On lance la fonction au lancement pour éviter d'avoir un dropdown vide
        window.onload = function() {
            updateFields();
        };
    </script>
</body>
</html>
<style>
    .Admin{
        display:flex;
        justify-content:center;
        text-align:center;
        color: #40852F;
    }
    #filter{
        border: 2px solid #40852F;
        border-radius: 10px;
    }
    #field{
        border: 2px solid #40852F;
        border-radius: 10px;
    }
    #table{
        border: 2px solid #40852F;
        border-radius: 10px;
    }
    .intTable{

    }
    .intField{
        padding-left: 50px;
    }
    .intFilter{
        padding-left: 50px;
    }
</style>
<?php
include(__DIR__ . "/../Controllers/admin.php");
?>