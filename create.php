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
    <link rel="stylesheet" href="CSS/create.css">
    <title>Ajout Ligne</title>
</head>
<body>
    <div id="TitrePresentation">
        <h1>AJOUT D'UNE LIGNE AU TABLEAU</h1>
    </div>
    <a href="list.php" id="lienBiblio">Ma Bibliotheque</a>

    <?php
        if(isset($_POST['Valider'])){
            if(!empty($_POST['Titre']) AND !empty($_POST['Synopsis']) AND !empty($_POST['Annee'])){
                $titre = htmlspecialchars($_POST['Titre']);
                $synopsis = htmlspecialchars($_POST['Synopsis']);
                $annee = htmlspecialchars($_POST['Annee']);  

                $insererInfos = $bdd -> prepare('INSERT INTO Livre(title, synopsis, DP, idAuteur) VALUES(?, ?, ?, 8)');
                $insererInfos -> bindParam(1, $titre);
                $insererInfos -> bindParam(2, $synopsis);
                $insererInfos -> bindParam(3, $annee);
                $insererInfos -> execute();
            }
            else{
                echo "Veuillez remplir tous les champs";
            }
        }
    ?>
    <form method="POST">
        <div class="formulaire">
            <p>Titre <input type="text" id="titre" name="Titre" placeholder="Titre" size="70"></p><br>
            <p>Synopsis<input type="text" id="synopsis" name="Synopsis" placeholder="Synopsis" size="70"></p><br>
            <p>Année<input type="int" id="annee" name="Annee" placeholder="Année" size="70"></p><br>
            <div id="blocValider">
               <input type="submit" name="Valider" value="Valider">
            </div>

        </div>
    </form>
</body>
</html>