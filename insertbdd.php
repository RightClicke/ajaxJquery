<?php
$host = 'localhost';
$dbname = 'bddburger';
$user = 'root';
$mdp = '';
$charset = 'utf8';
try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname", $user, $mdp);
} catch (PDOException $fail) {
    echo 'erreur:' . $fail->getMessage();
    die();
}

$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$adresse = $_POST['adresse'];

$queryprep = " INSERT INTO user (ID_user,nom_user,Prenom_user,adresse_user) VALUES 
(null,:nom,:prenom,:adresse)";
$query = $bdd->prepare($queryprep);
$query->bindValue(':nom', $nom, PDO::PARAM_STR);
$query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
$query->bindValue(':adresse', $adresse, PDO::PARAM_STR);
$query->execute();
