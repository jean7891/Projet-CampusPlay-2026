<?php
require_once "../backend/config.php";

$sql = "SELECT * FROM events ORDER BY date_event ASC";
$stmt = $pdo->query($sql);
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Événements - CampusPlay</title>
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
    </nav>
</header>

<main>
    <section class="hero">
        <h2>Événements disponibles</h2>

        <?php if (count($events) === 0): ?>
            <p>Aucun événement disponible pour le moment.</p>
        <?php endif; ?>

        <?php foreach ($events as $event): ?>
            <div class="card">
                <h3><?= htmlspecialchars($event["titre"]) ?></h3>
                <p>Date : <?= htmlspecialchars($event["date_event"]) ?></p>
                <p>Lieu : <?= htmlspecialchars($event["lieu"]) ?></p>
                <p>Capacité : <?= htmlspecialchars($event["capacite"]) ?></p>

                <a class="btn" href="event-detail.php?id=<?= $event["id_event"] ?>">
                    Voir détail
                </a>
            </div>
        <?php endforeach; ?>

    </section>
</main>

<footer>
    <p>Projet Web Dynamique 2026 - CampusPlay</p>
</footer>

</body>
</html>