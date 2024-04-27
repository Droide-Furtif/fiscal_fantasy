<?php
include(__DIR__ . "/../Controllers/convert.php");

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table = $_POST['table'];
    $field = $_POST['field'];
    $filter = $_POST['filter'];

    $db = connection();

    // Détermine les colonnes à récupérer en fonction de la table choisie (pas de mdp pour l'user par exemple)
    if ($table == "user") {
        $columns = "`id`, `name`, `email`";
    } else if ($table == "compte") {
        $columns = "`id`, `name`, `capital`, `devise`, `type`";
    } else if ($table == "transaction") {
        $columns = "`id`, `amount`, `id_compte`, `date`, `note`";
    }

    $sql = "SELECT $columns FROM $table";

    // Filtrage si demandé
    if (!empty($filter)) {
        $sql .= " WHERE $field LIKE ?";
        $stmt = $db->prepare($sql);
        $filter = "%$filter%";
        $stmt->bind_param("s", $filter);
    } else {
        $stmt = $db->prepare($sql);
    }

    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        // Construction du tableau HTML pour afficher les résultats
          $fields = explode(", ", $columns);
          
          echo "<table border='1' style='border-radius: 50px; border-color: #40852F; border-collapse: collapse;'>";
          echo "<tr style='background-color: #fff; color: #40852F; font-family: Arial, sans-serif;'>";
          foreach ($fields as $fieldName) {
              echo "<th style='padding: 10px;'>" . htmlspecialchars(trim($fieldName, "`")) . "</th>";
          }
          echo "</tr>";
  
          while($row = $result->fetch_assoc()) {
              echo "<tr style='background-color: #fff; color: #000; font-family: Arial, sans-serif;'>";
              foreach ($fields as $fieldName) {
                  echo "<td style='padding: 10px;'>" . htmlspecialchars($row[trim($fieldName, "`")]) . "</td>";
              }
              echo "</tr>";
          }
          echo "</table>";
      } else {
          echo "Aucun résultat trouvé.";
      }

    $stmt->close();
    $db->close();
}
?>
