<?php include 'config.php';?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="styles_connexion.css">
   
</head>
<body>

    <form action="process_connexion.php" method="post">
        <h2>Connexion</h2>
        <label for="email">Email :</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="mot_de_passe">Mot de passe :</label><br>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br><br>
        <input type="submit" value="Se connecter">
    </form>

    <?php
    // Inclure le script PHP pour la gestion de la connexion
    include 'process_connexion.php';
    ?>

</body>
</html>
