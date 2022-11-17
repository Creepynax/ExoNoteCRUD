<!-- Fichier relié à la base de données et va être relié à toutes les pages -->

<?php 
    try{
        $bdd = new PDO("mysql:host=localhost;dbname=Bibliotheque", "root", "root");
    }

catch(PDOException $e){
  echo "connexion erreur: " . $e->getMessage();
}
?>