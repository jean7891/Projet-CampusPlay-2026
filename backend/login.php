<?php

session_start();
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["email"];
    $mot_de_passe = $_POST["mot_de_passe"];

    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":email" => $email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($mot_de_passe, $user["mot_de_passe"])) {

        $_SESSION["id_user"] = $user["id_user"];
        $_SESSION["nom"] = $user["nom"];
        $_SESSION["role"] = $user["role"];

        header("Location: ../frontend/dashboard.php");
        exit;

    } else {
        echo "Email ou mot de passe incorrect.";
    }
}
?>