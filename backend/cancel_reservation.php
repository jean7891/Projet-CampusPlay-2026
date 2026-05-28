<?php

session_start();
require_once "config.php";

if (!isset($_SESSION["id_user"])) {
    header("Location: ../frontend/login.html");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id_user = $_SESSION["id_user"];
    $id_reservation = $_POST["id_reservation"];

    $sql = "UPDATE reservations
            SET statut = 'annulee'
            WHERE id_reservation = :id_reservation
            AND id_user = :id_user";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_reservation" => $id_reservation,
        ":id_user" => $id_user
    ]);

    header("Location: ../frontend/my-reservations.php");
    exit;
}
?>