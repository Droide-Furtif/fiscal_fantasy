<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin</title>
</head>
<body>
    <form action="" method="post">
        <input type="hidden" name="action" value="search">
        <label for="table">Choisissez une table:</label>
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

    <br><br>
    <form action="admin.php" method="post">
      <label for="user_id">ID de l'utilisateur à promouvoir :</label>
      <input type="text" id="user_id" name="user_id" required>
      <button class="button" type="submit" name="make_admin">Promouvoir</button>
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
    <script>
    function deleteEntry(id, table) {
        if(confirm('Êtes-vous sûr de vouloir supprimer cette entrée ?')) {
            // Requête AJAX pour la suppression
            fetch('', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=delete&id=${id}&table=${table}`
            })
            .then(response => response.text()) // Recevez la réponse en tant que texte
            .then(text => {
                const element = document.querySelector('tr[data-id="' + id + '"]');
                if (element) {
                    element.remove();
                } else {
                    alert('Élément non trouvé dans le tableau.');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }
    </script>

</body>
</html>
<style>
    #table{
        border: 2px solid #40852F;
        border-radius: 10px;
    }#filter{
        border: 2px solid #40852F;
        border-radius: 10px;
    }
    #field{
        border: 2px solid #40852F;
        border-radius: 10px;
    }
    #user_id{
        border: 2px solid #40852F;
        border-radius: 10px;
    }
    .form{
        display:flex;
        justify-content:center;
    }
    .Admin{
        display:flex;
        justify-content:center;
        text-align:center;
        color: #40852F;
    }
    .button {
    padding: 10px 15px;
    background-color: #40852F;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    cursor: pointer;
    height: 40px;
    width: 130px;
    text-align: center;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
    transition: all 0.7s ease;
    }
    .button:hover{
        box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 10px -18px inset;
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
