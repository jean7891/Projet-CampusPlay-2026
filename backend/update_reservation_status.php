<?php

require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_reservation = $_POST["id_reservation"];
    $statut = $_POST["statut"];

    if ($statut !== "validee" && $statut !== "refusee") {
        die("Statut invalide.");
    }

    $sql = "UPDATE reservations 
            SET statut = :statut 
            WHERE id_reservation = :id_reservation";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":statut" => $statut,
        ":id_reservation" => $id_reservation
    ]);

    header("Location: ../frontend/dashboard.php");
    exit;
}
?>