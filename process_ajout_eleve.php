<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];
    $mot_de_passe=password_hash($_POST['mot_de_passe'],PASSWORD_DEFAULT); //hashage du mot depasse

    // Requête SQL pour insérer un nouvel élève dans la base de données
    $sql = "INSERT INTO eleves (nom, prenom, email, numero,mot_de_passe) VALUES ('$nom', '$prenom', '$email', '$numero','$mot_de_passe)";

    if ($conn->query($sql) === TRUE) {
        // Redirection vers la page de liste des élèves avec un message de succès
        header("Location: liste_eleves.php?success=1");
    } else {
        // Redirection vers la page d'ajout d'élève avec un message d'erreur
        header("Location: ajouter_eleve.php?error=1");
    }
}
?>
