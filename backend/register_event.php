<?php

session_start();
require_once "config.php";

if (!isset($_SESSION["id_user"])) {
    header("Location: ../frontend/login.html");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id_user = $_SESSION["id_user"];
    $id_event = $_POST["id_event"];

    // Vérifier si l'utilisateur est déjà inscrit
    $sql_check = "SELECT * FROM registrations 
                  WHERE id_user = :id_user 
                  AND id_event = :id_event 
                  AND statut = 'inscrit'";

    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([
        ":id_user" => $id_user,
        ":id_event" => $id_event
    ]);

    if ($stmt_check->rowCount() > 0) {
        die("Vous êtes déjà inscrit à cet événement.");
    }

    // Vérifier le nombre d'inscrits
    $sql_count = "SELECT COUNT(*) AS total 
                  FROM registrations 
                  WHERE id_event = :id_event 
                  AND statut = 'inscrit'";

    $stmt_count = $pdo->prepare($sql_count);
    $stmt_count->execute([":id_event" => $id_event]);

    $result = $stmt_count->fetch(PDO::FETCH_ASSOC);
    $total_inscrits = $result["total"];

    // Récupérer la capacité de l'événement
    $sql_event = "SELECT capacite FROM events WHERE id_event = :id_event";
    $stmt_event = $pdo->prepare($sql_event);
    $stmt_event->execute([":id_event" => $id_event]);

    $event = $stmt_event->fetch(PDO::FETCH_ASSOC);

    if (!$event) {
        die("Événement introuvable.");
    }

    if ($total_inscrits >= $event["capacite"]) {
        die("L'événement est complet.");
    }

    // Inscrire l'utilisateur
    $sql_insert = "INSERT INTO registrations (id_user, id_event, statut)
                   VALUES (:id_user, :id_event, 'inscrit')";

    $stmt_insert = $pdo->prepare($sql_insert);
    $stmt_insert->execute([
        ":id_user" => $id_user,
        ":id_event" => $id_event
    ]);

    header("Location: ../frontend/events.php");
    exit;
}
?>