<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Ajout d'Élève</title>
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
            width: 100%;
        }
        .container {
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        input[type="text"],[type="password"] {
            padding: 20px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            width: 100%;
        }
     
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ajout d'Élève</h2>
        <!-- Formulaire d'ajout d'élève -->
        <form action="process_inscription.php" method="post">
            <label for="nom">Nom:</label><br>
            <input type="text" id="nom" name="nom" required><br>
            <label for="prenom">Prénom:</label><br>
            <input type="text" id="prenom" name="prenom" required><br>
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email" required><br>
            <label for="numero">Numéro:</label><br>
            <input type="text" id="numero" name="numero" required><br>
            <label for="mot_de_passe">Mot de passe:</label><br>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br><br>
            <input type="submit" value="Ajouter">
            
        </form>
    </div>
</body>
</html>
