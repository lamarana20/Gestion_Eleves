
<?php include 'config.php';?><?php
session_start();

// Vérifie si l'utilisateur est déjà connecté en tant qu'administrateur, si oui, le redirige vers la page d'accueil de l'administrateur
if(isset($_SESSION["role"]) && $_SESSION["role"] === "administrateur"){
    header("Location: login_admin.php");
    exit();
}

// Vérifie si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification du nom d'utilisateur et du mot de passe
    $nomUtilisateur = $_POST["nomUtilisateur"];
    $motDePasse = $_POST["motDePasse"];

    // Vérification des informations d'identification
    if ($nomUtilisateur === "admin" && $motDePasse === "admin123") {
        // Authentification réussie pour l'administrateur
        $_SESSION["role"] = "administrateur";
        header("Location: login_admin.php");
        exit();
    } else {
        // Authentification échouée
        $messageErreur = "Nom d'utilisateur ou mot de passe incorrect !";
    }
}
?>