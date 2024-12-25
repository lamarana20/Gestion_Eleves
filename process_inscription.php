<?php
include 'config.php';

// Vérifier si des données ont été envoyées via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données envoyées depuis le formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT); // Hashage du mot de passe

    // Vérifier si l'ID est défini (modification)
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        // Préparer et exécuter la requête SQL pour mettre à jour les informations de l'utilisateur
        $sql = "UPDATE eleves SET nom='$nom', prenom='$prenom', email='$email', numero='$numero', mot_de_passe='$mot_de_passe' WHERE id='$id'";
    } else {
        // Si l'ID n'est pas défini, c'est une nouvelle inscription
        // Préparer et exécuter la requête SQL pour insérer les données
        $sql = "INSERT INTO eleves (nom, prenom, email, numero, mot_de_passe) VALUES ('$nom', '$prenom', '$email', '$numero', '$mot_de_passe')";
    }

    // Exécuter la requête SQL
    if ($conn->query($sql) === TRUE) {
        // Rediriger vers la liste des élèves après l'inscription ou la modification
        header("Location: login_admin.php");
        exit();
    } else {
        // En cas d'erreur, afficher un message d'erreur
        echo "Erreur : " . $conn->error;
    }
    
    // Fermer la connexion à la base de données
    $conn->close();
}
?>
