<?php

session_start();
require_once "config.php";

if (!isset($_SESSION["id_user"])) {
    header("Location: ../frontend/login.html");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id_user = $_SESSION["id_user"];
    $id_resource = $_POST["id_resource"];
    $date_debut = $_POST["date_debut"];
    $date_fin = $_POST["date_fin"];

    if ($date_debut >= $date_fin) {
        die("La date de début doit être avant la date de fin.");
    }

    $sql = "INSERT INTO reservations 
            (id_user, id_resource, date_debut, date_fin, statut)
            VALUES 
            (:id_user, :id_resource, :date_debut, :date_fin, 'en_attente')";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id_user" => $id_user,
        ":id_resource" => $id_resource,
        ":date_debut" => $date_debut,
        ":date_fin" => $date_fin
    ]);

    header("Location: ../frontend/resources.php");
    exit;
}
?>