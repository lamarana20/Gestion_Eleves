<?php include 'config.php'; ?>
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Administrateur</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-JvtJbl1XOgd62zCnJZVKjqJxxBm1NGA91ZevrRVOicfE0jGdjKJ+PQw2U4oUcCpXeOufaTaXuL3jCxYHvuKW4A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Lien vers les fichiers CSS de Bootstrap -->
    <style>
        /* Styling pour le footer */
        footer {
            background-color: #435D7E;
            color: white;
            text-align: start;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 200px;
        }

        body {
            height: 200vh;
            background-color: #f4f4f4;
        }

        .liste {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            /* Aligner les éléments en haut */
            height: 100vh;
        }

        .container {
            display: flex;
            flex-direction: row;
            /* Disposition en ligne des éléments */
            align-items: flex-start;
            /* Aligner les éléments en haut */
            width: 80%;
            /* Largeur de la page */
            padding-top: 60px;
        }

        .list-container {
            flex: 1;
            /* Prend autant d'espace que possible */
            margin-right: 20px;
            /* Marge à droite pour l'espace entre les colonnes */
        }

        .inscription-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        .modify-btn {
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .modify-btn:hover {
            background-color: #218838;
        }

        .inscription-btn {
            background-color: #007bff;
            color: rgb(255,255,255);
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            text-decoration: none;
        }
  .btn_ajout{
    background-color: #0056b3;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            text-decoration: none;

  }
  .btn_ajout{
    background-color: #28a745;
    color: rgb(255,255,255);
  }
        .inscription-btn:hover {
            background-color: green;
        }

        tr {
            color: black;
        }

        th {
            background-color: #435D7E;
        }

        .logo {
            width: 80px;
            /* Largeur de votre logo */
            height: auto;
            /* La hauteur s'ajustera automatiquement pour maintenir les proportions */
            display: block;
            /* Pour centrer le logo horizontalement */
            margin: 0 auto;
            /* Pour centrer le logo horizontalement */
        }
        .delete-btn{
            color: rgb(220,53,70);
        }
    </style>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#435D7E;height: 80px;">
        <a class="navbar-brand" href="#">MLD
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                

                <!-- Ajoutez d'autres éléments de navigation selon vos besoins -->
            </ul>
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                   <button class="btn_ajout"> <a class="nav-link"  class="btn btn-success"    href="ajouter_eleve.php"><span>ajouter_eleve</span></a></button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="liste">
        <!-- Contenu HTML -->
        <?php
        // Afficher un message de confirmation si l'inscription a réussi
        if (isset($_GET['inscription']) && $_GET['inscription'] == 'success') {
            echo "<p>L'inscription a été effectuée avec succès !</p>";
        }
        ?>
        <div class="container">
            <!-- Liste des élèves -->
            <table>
                <!-- En-têtes -->
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Numéro</th>
                    <th>Action</th>

                </tr>
                <!-- Récupération des élèves depuis la base de données -->
                <?php
                $sql = "SELECT * FROM eleves";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['nom'] . "</td>";
                        echo "<td>" . $row['prenom'] . "</td>";
                        echo "<td><a href='mailto:" . $row['email'] . "'>" . $row['email'] . "</a></td>";
                        echo "<td>" . $row['numero'] . "</td>";
                        // Bouton pour modifier les informations de l'élève
                        echo "<td>
        <button class='modify-btn' onclick='modifierInformations(\"" . $row['id'] . "\", \"" . $row['nom'] . "\", \"" . $row['prenom'] . "\", \"" . $row['email'] . "\", \"" . $row['numero'] . "\")'>Modifier</button>
        <a href='supprimer_eleve.php?id=" . $row['id'] . "' class='delete-btn'>Supprimer</a>
      </td>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Aucun élève trouvé.</td></tr>";
                }
                ?>
            </table>
        </div>
        <!-- Colonne pour le bouton d'inscription -->


        <!-- Script JavaScript -->
        <script>
            function modifierInformations(id, nom, prenom, email, numero) {
                // Redirection vers la page d'inscription avec les informations préremplies
                window.location.href = "inscription.php?id=" + id + "&nom=" + encodeURIComponent(nom) + "&prenom=" + encodeURIComponent(prenom) + "&email=" + encodeURIComponent(email) + "&numero=" + encodeURIComponent(numero);
            }

            function supprimerEleve(id) {
                if (confirm('Êtes-vous sûr de vouloir supprimer cet élève ?')) {
                    // Effectuer une requête AJAX pour supprimer l'élève de la base de données
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'supprimer_eleve.php');
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            // Actualiser la page pour afficher la liste mise à jour des élèves
                            window.location.reload();
                        } else {
                            alert('Erreur lors de la suppression de l\'élève.');
                        }
                    };
                    xhr.send('id=' + id);
                }
            }
        </script>





    </main>

    <footer class="footer  text-white mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <ul class="list-unstyled d-flex flex-column">
                        <li class="mb-2">
                            <a href="" class="text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                                </svg>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="" class="text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                                </svg>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="" class="text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                    <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                                </svg>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="" class="text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-md-4 text-center">
                <h5>Coordonnées</h5>
                <p>Adresse:Conakry</p>
                <p></p>
            </div>
            <div class="col-md-4"></div> <!-- Colonne vide pour centrer le contenu -->
        </div>
        </div>
    </footer>



    <!-- Liens vers les fichiers JavaScript de Bootstrap (jQuery et Popper.js requis) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>