<?php
// Inclure le fichier de configuration pour établir la connexion à la base de données
include 'config.php';

// Vérifier si des données ont été reçues via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données envoyées depuis la page HTML
    $id = $_POST['id'];
    $nouveauNom = $_POST['nom'];
    $nouveauPrenom = $_POST['prenom'];
    $nouvelEmail = $_POST['email'];
    $nouveauNumero = $_POST['numero'];
    $nouveauMotDePasse = $_POST['mot_de_passe'];

    // Préparer et exécuter la requête SQL pour mettre à jour les informations de l'élève dans la base de données
    $sql = "UPDATE eleves SET nom='$nouveauNom', prenom='$nouveauPrenom', email='$nouvelEmail', numero='$nouveauNumero', mot_de_passe='$nouveauMotDePasse' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Envoyer une réponse indiquant que la mise à jour a été effectuée avec succès
        echo "Informations mises à jour avec succès.";
    } else {
        // Envoyer une réponse en cas d'erreur lors de la mise à jour
        echo "Erreur lors de la mise à jour des informations: " . $conn->error;
    }
    
    // Fermer la connexion à la base de données
    $conn->close();
}
?>
