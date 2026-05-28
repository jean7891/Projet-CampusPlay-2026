<?php

require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $mot_de_passe = $_POST["mot_de_passe"];

    $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (nom, prenom, email, mot_de_passe, role)
            VALUES (:nom, :prenom, :email, :mot_de_passe, 'etudiant')";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":nom" => $nom,
        ":prenom" => $prenom,
        ":email" => $email,
        ":mot_de_passe" => $mot_de_passe_hash
    ]);

    header("Location: ../frontend/login.html");
    exit;
}
?>