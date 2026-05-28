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

    $sql = "UPDATE registrations
            SET statut = 'annule'
            WHERE id_user = :id_user
            AND id_event = :id_event";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":id_user" => $id_user,
        ":id_event" => $id_event
    ]);

    header("Location: ../frontend/my-events.php");
    exit;
}
?>