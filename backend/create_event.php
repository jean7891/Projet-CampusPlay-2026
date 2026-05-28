<?php

session_start();
require_once "config.php";

if (!isset($_SESSION["id_user"])) {
    header("Location: ../frontend/login.html");
    exit;
}

if ($_SESSION["role"] !== "admin" && $_SESSION["role"] !== "responsable") {
    die("Accès refusé.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $date_event = $_POST["date_event"];
    $heure_event = $_POST["heure_event"];
    $lieu = $_POST["lieu"];
    $capacite = $_POST["capacite"];
    $id_createur = $_SESSION["id_user"];

    if ($capacite <= 0) {
        die("La capacité doit être supérieure à 0.");
    }

    $sql = "INSERT INTO events 
            (titre, description, date_event, heure_event, lieu, capacite, id_createur)
            VALUES 
            (:titre, :description, :date_event, :heure_event, :lieu, :capacite, :id_createur)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":titre" => $titre,
        ":description" => $description,
        ":date_event" => $date_event,
        ":heure_event" => $heure_event,
        ":lieu" => $lieu,
        ":capacite" => $capacite,
        ":id_createur" => $id_createur
    ]);

    header("Location: ../frontend/events.php");
    exit;
}
?>