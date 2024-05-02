<?php
require_once __DIR__ . '/../Models/db_connection.php';
require_once __DIR__ . '/../Models/user.php';
require_once __DIR__ . '/../Controllers/convert.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
  echo '<meta http-equiv="refresh" content="0;url=login.php">';
  exit;
}

$db = connection();
$user = getUser($db, $_SESSION['user_email']);

if ($user && isAdmin($db, $_SESSION['user_email'])) {
  echo "Bienvenue dans la zone admin !";
} else {
  echo '<meta http-equiv="refresh" content="0;url=index.php">';
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'] ?? '';
    $table = $_POST['table'] ?? '';

    $db = connection();

    switch ($action) {
        case 'search':
            $field = $_POST['field'];
            $filter = $_POST['filter'];

            if ($table == "user") {
                $columns = "`id`, `name`, `email`, `isAdmin`";
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
                
                echo "<table border='1'><tr>";
                foreach ($fields as $fieldName) {
                    echo "<th>" . htmlspecialchars(trim($fieldName, "`")) . "</th>";
                }
                echo "</tr>";

                while($row = $result->fetch_assoc()) {
                    echo "<tr data-id='" . $row['id'] . "'>";
                    foreach ($fields as $fieldName) {
                        echo "<td>" . htmlspecialchars($row[trim($fieldName, "`")]) . "</td>";
                    }
                    // Bouton de suppression
                    echo "<td><button onclick='deleteEntry(" . $row['id'] . ", \"$table\")'>X</button></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Aucun résultat trouvé.";
            }

            $stmt->close();
            break;

        case 'delete':
            if (isset($_POST['id'])) {
                $id = $_POST['id'];

                $sqlDelete = "DELETE FROM $table WHERE id = ?";
                $stmtDelete = $db->prepare($sqlDelete);
                $stmtDelete->bind_param("i", $id);
                $stmtDelete->execute();
                $stmtDelete->close();
                exit;
            }
            break;

        default:
            break;
    }

    if (isset($_POST['make_admin']) && isset($_POST['user_id'])) {
        $userId = $_POST['user_id'];
        if (promoteToAdmin($db, $userId)) {
            echo " L'utilisateur a été promu administrateur.";
        } else {
            echo "Erreur lors de la promotion de l'utilisateur.";
        }
      }
  
      $db->close();
    }
  
  
  // Fonction pour promouvoir un utilisateur en administrateur
  function promoteToAdmin($db, $userId) {
      $query = $db->prepare("UPDATE user SET isAdmin = 1 WHERE id = ?");
      $query->bind_param("i", $userId); // "i" pour integer
      return $query->execute();
  }
  ?>
  