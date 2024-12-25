<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Modification du Mot de Passe</title>
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
        input[type="password"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
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
        <h2>Modification du Mot de Passe</h2>
        <!-- Formulaire de modification du mot de passe -->
        <form action="process_modifier_mot_de_passe.php" method="post">
            <label for="current_password">Mot de Passe Actuel:</label><br>
            <input type="password" id="current_password" name="current_password" required><br>
            <label for="new_password">Nouveau Mot de Passe:</label><br>
            <input type="password" id="new_password" name="new_password" required><br>
            <label for="confirm_password">Confirmer le Nouveau Mot de Passe:</label><br>
            <input type="password" id="confirm_password" name="confirm_password" required><br>
            <input type="submit" value="Modifier">
        </form>
    </div>
</body>
</html>
