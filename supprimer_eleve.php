<?php
include 'config.php';

// Vérifier si l'ID de l'élève à supprimer est défini
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Supprimer l'élève de la base de données
    $sqlDelete = "DELETE FROM eleves WHERE id='$id'";
    if ($conn->query($sqlDelete) === TRUE) {
        // Réorganiser les identifiants des élèves restants
        $sqlUpdate = "SET @num := 0;
                      UPDATE eleves SET id = @num := (@num+1);
                      ALTER TABLE eleves AUTO_INCREMENT = 1;";
        if ($conn->query($sqlUpdate) === TRUE) {
            // Rediriger vers la page liste_eleves.php avec un paramètre pour indiquer que la suppression a réussi
            header("Location: liste_eleves.php?suppression=success");
            exit();
        } else {
            echo "Erreur lors de la mise à jour des identifiants des élèves : " . $conn->error;
        }
    } else {
        echo "Erreur lors de la suppression de l'élève : " . $conn->error;
    }
} else {
    echo "ID de l'élève non spécifié.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
