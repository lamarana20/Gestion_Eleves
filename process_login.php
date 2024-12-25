<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $username = $_POST['email'];
    $password = $_POST['mot_de_passe'];

    // Requête SQL pour vérifier les informations d'authentification dans la base de données
    $sql = "SELECT * FROM eleves WHERE email='$email' AND mot_de_passe='$'$mot_de_passe'";
    $result = $conn->query($sql);

    // Vérification si l'utilisateur existe dans la base de données
    if ($result->num_rows == 1) {
        // Démarrage de la session et enregistrement de l'identifiant de l'utilisateur
        session_start();
        $_SESSION['email'] = $email;
        
        // Redirection vers la page d'accueil de l'élève
        header("Location: index_eleve.php");
    } else {
        // Redirection vers la page de connexion avec un message d'erreur
        header("Location: login.php?error=1");
    }
}
?>
