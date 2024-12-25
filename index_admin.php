<?php 
include 'config.php'; 

// Vérifier si des données ont été envoyées via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Votre logique de validation des identifiants d'administrateur ici
    // Si les identifiants sont valides, rediriger vers login_admin.php
    header("Location: login_admin.php");
    exit(); // Assurez-vous de terminer le script après la redirection
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Accueil Administrateur</title>
    <style>
        /* Styling pour la mise en forme de la page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        .logout-btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .logout-btn:hover {
            background-color: #0056b3;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

       .submit-btn {
            background-color: #0056b3;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Connexion administrateur</h2>
        <!-- Formulaire de connexion -->
        <form method="post" action="process_admin.php">
            <input type="text" name="nomUtilisateur" placeholder="Nom d'utilisateur" required><br>
            <input type="password" name="motDePasse" placeholder="Mot de passe" required><br>
            <button type="submit" class="submit-btn">Se connecter</button>
        </form>
    </div>
</body>
</html>
