<?php
require_once "../backend/config.php";

if (!isset($_GET["id"])) {
    die("Événement introuvable.");
}

$id_event = $_GET["id"];

$sql = "SELECT * FROM events WHERE id_event = :id_event";
$stmt = $pdo->prepare($sql);
$stmt->execute([":id_event" => $id_event]);

$event = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$event) {
    die("Événement introuvable.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail événement - CampusPlay</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<header>
    <h1>CampusPlay</h1>

    <nav>
            <a href="index.html">Accueil</a>
        <a href="events.php">Événements</a>
        <a href="resources.php">Ressources</a>
        <a href="login.html">Connexion</a>
        <a href="my-events.php">Mes inscriptions</a>
        <a href="my-reservations.php">Mes réservations</a>
        <a href="create-event.php">Créer événement</a>
        <a href="dashboard.php">Dashboard</a>
         <a href="../backend/logout.php">Déconnexion</a>
    </nav>
</header>

<main>
    <section class="hero">

        <h2><?= htmlspecialchars($event["titre"]) ?></h2>

        <p><?= htmlspecialchars($event["description"]) ?></p>

        <p><strong>Date :</strong> <?= htmlspecialchars($event["date_event"]) ?></p>

        <p><strong>Heure :</strong> <?= htmlspecialchars($event["heure_event"]) ?></p>

        <p><strong>Lieu :</strong> <?= htmlspecialchars($event["lieu"]) ?></p>

        <p><strong>Capacité :</strong> <?= htmlspecialchars($event["capacite"]) ?> participants</p>

        <form action="../backend/register_event.php" method="POST">
            <input type="hidden" name="id_event" value="<?= $event["id_event"] ?>">
            <button type="submit" class="btn">S’inscrire</button>
        </form>

    </section>
</main>

<footer>
    <p>Projet Web Dynamique 2026 - CampusPlay</p>
</footer>

</body>
</html>