<?php
// Assurez-vous que le script est accédé via une requête POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    include 'db_connection.php'; // Incluez votre connexion à la base de données
    $db = connection();
    $accountId = $_POST['account_id'];

    // Préparation de la requête de suppression pour éviter les injections SQL
    if ($stmt = $db->prepare("DELETE FROM compte WHERE id = ?")) {
        $stmt->bind_param("i", $accountId);
        $stmt->execute();
        $stmt->close();

        // Redirection ou message de succès
        header("Location: /fiscal_fantasy/portfolios.php?success=1");
        exit;
    } else {
        // Gestion de l'erreur
        echo "Erreur lors de la suppression du compte.";
    }
} else {
    // Redirection si accédé sans POST
    header("Location: /fiscal_fantasy/index.php");
    exit;
}
?>
