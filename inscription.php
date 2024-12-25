<?php
// Inclure le fichier de configuration pour établir la connexion à la base de données
include 'config.php';?>

<?php
// Récupération des valeurs passées dans l'URL
$id = $_GET['id'];
$nom = $_GET['nom'];
$prenom = $_GET['prenom'];
$email = $_GET['email'];
$numero = $_GET['numero'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="styles_inscription.css">
</head>
<body>
    
    <form action="process_inscription.php" method="post">
        <h2>Inscription</h2>
        <label for="nom">Nom:</label><br>
        <!-- Préremplissage du champ avec la valeur du nom -->
        <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>" required><br>
        <label for="prenom">Prénom:</label><br>
        <!-- Préremplissage du champ avec la valeur du prénom -->
        <input type="text" id="prenom" name="prenom" value="<?php echo $prenom; ?>" required><br>
        <label for="email">Email:</label><br>
        <!-- Préremplissage du champ avec la valeur de l'email -->
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br>
        <label for="numero">Numéro:</label><br>
        <!-- Préremplissage du champ avec la valeur du numéro -->
        <input type="text" id="numero" name="numero" value="<?php echo $numero; ?>" required><br>
        <!-- Champ caché pour passer l'ID de l'élève -->
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="mot_de_passe">Mot de passe:</label><br>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br><br>
        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>
