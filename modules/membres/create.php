<?php

require_once '../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    $stmt = $bdd->prepare("INSERT INTO membres (nom, prenom, email, telephone) VALUES (:nom, :prenom, :email, :telephone)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telephone', $telephone);

    if ($stmt->execute()) {
        header('Location: index.php?message=Membre ajouté avec succès');
        exit();
    } else {
        echo "Erreur lors de l'ajout du membre.";
    }
}