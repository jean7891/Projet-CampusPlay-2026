<?php
session_start();

if (!isset($_SESSION["id_user"])) {
    header("Location: login.html");
    exit;
}

if ($_SESSION["role"] !== "admin" && $_SESSION["role"] !== "responsable") {
    die("Accès refusé. Cette page est réservée aux responsables et administrateurs.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un événement - CampusPlay</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<header>
    <h1>CampusPlay</h1>
    <nav>
            <a href="index.html">Accueil</a>
        <a href="events.php">Événements</a>
        <a href="resources.php">Ressources</a>
        <a href="my-events.php">Mes inscriptions</a>
        <a href="my-reservations.php">Mes réservations</a>
        <a href="create-event.php">Créer événement</a>
        <a href="dashboard.php">Dashboard</a>
         <a href="../backend/logout.php">Déconnexion</a>
    </nav>
</header>

<main>
<section class="hero">

    <h2>Créer un événement</h2>

    <form action="../backend/create_event.php" method="POST">

        <label>Titre</label><br>
        <input type="text" name="titre" required>

        <br><br>

        <label>Description</label><br>
        <input type="text" name="description" required>

        <br><br>

        <label>Date</label><br>
        <input type="date" name="date_event" required>

        <br><br>

        <label>Heure</label><br>
        <input type="time" name="heure_event" required>

        <br><br>

        <label>Lieu</label><br>
        <input type="text" name="lieu" required>

        <br><br>

        <label>Capacité</label><br>
        <input type="number" name="capacite" min="1" required>

        <br><br>

        <button type="submit" class="btn">Créer l’événement</button>

    </form>

</section>
</main>

<footer>
    <p>Projet Web Dynamique 2026 - CampusPlay</p>
</footer>

</body>
</html>