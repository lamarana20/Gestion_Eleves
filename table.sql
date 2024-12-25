<?php
include 'config.php';

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Instruction SQL pour créer la table des élèves
$sql = "CREATE TABLE IF NOT EXISTS eleves (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(30) NOT NULL,
    prenom VARCHAR(30) NOT NULL,
    email VARCHAR(50) UNIQUE,
    numero VARCHAR(15) UNIQUE
)";


// Exécution de la requête
if ($conn->query($sql) === TRUE) {
    echo "Table des élèves créée avec succès";
} else {
    echo "Erreur lors de la création de la table des élèves : " . $conn->error;
}

// Fermeture de la connexion
$conn->close();
?>
