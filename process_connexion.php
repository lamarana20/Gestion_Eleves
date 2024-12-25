<?php
// Inclure le fichier de configuration pour établir la connexion à la base de données
include 'config.php';

// Vérifier si des données ont été envoyées via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données envoyées depuis le formulaire de connexion
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    // Préparer et exécuter la requête SQL pour vérifier les informations d'identification de l'utilisateur
    $sql = "SELECT * FROM eleves WHERE email='$email' AND mot_de_passe='$mot_de_passe'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Si les informations d'identification sont correctes, rediriger l'utilisateur vers sa propre page
        header("Location: page_utilisateur.php?email=" . urlencode($email));
        exit();
    } else {
        // Si les informations d'identification sont incorrectes, afficher un message d'erreur
        echo "Email ou mot de passe incorrect.";
    }
    
    // Fermer la connexion à la base de données
    $conn->close();
}
?>
