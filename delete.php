<!-- Lien vers la Base de données du fichier connect.php -->

<?php
    session_start();
    include "includes/connect.php";

    $response = $bdd -> query('SELECT * FROM Livre');
    $donnees = $response -> fetch();

    $livreID = $donnees['id'];
    $supprLigne = $bdd -> prepare('DELETE FROM Livre WHERE id = $livreID');

    header('Location : list.php');
?>