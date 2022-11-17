<!-- Lien vers la Base de données du fichier connect.php -->

<?php
    session_start();
    include "includes/connect.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/list.css">
    <script src="https://kit.fontawesome.com/306ccec929.js" crossorigin="anonymous"></script>
    <title>Liste de ma Bibliothèque</title>
</head>
<body>
    <div id="TitrePresentation">
        <h1>MA BIBLIOTHEQUE</h1>
    </div>
    <div id="blocCreation">
        <a href="create.php" id="boutonCreation">Créer une nouvelle ligne</a>
    </div> 

    <table id="tableau">
        <tr id="blocNomColonnes">
            <th>Titre</th>
            <th>Synopsis</th>
            <th>Auteur</th>
            <th>Parution</th>
            <th>Actions</th>
        </tr>

        <!-- Création puis liaison des données de la BDD vers les infos présentes sur la page -->
        <?php
            $response = $bdd -> query('SELECT * FROM Livre INNER JOIN Auteur ON Livre.idAuteur = Auteur.id');

            while($donnees = $response -> fetch()){
        ?>

        <tr id="blocDonnees">
            <td align="center"><?= $donnees['title']?></td>
            <td width="50%"><?= $donnees['synopsis']?></td>
            <td align="center"><?= $donnees['auteur']?></td>
            <td align="center"><?= $donnees['DP']?></td>
            <td align="center"><a href="update.php" id="edit">Éditer</a><a href="delete.php" id="del">Supprimer</a></th>
        </tr>
        <?php
            }

            $response -> closeCursor();
        ?>
    </table>
</body>
</html>