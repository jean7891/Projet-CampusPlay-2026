<?php

session_start();
require_once "../backend/config.php";

if (!isset($_SESSION["id_user"])) {
    header("Location: login.html");
    exit;
}

$id_user = $_SESSION["id_user"];

$sql = "SELECT events.*
        FROM registrations
        INNER JOIN events ON registrations.id_event = events.id_event
        WHERE registrations.id_user = :id_user
        AND registrations.statut = 'inscrit'
        ORDER BY events.date_event ASC";

$stmt = $pdo->prepare($sql);
$stmt->execute([":id_user" => $id_user]);

$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes inscriptions - CampusPlay</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<header>
    <h1>CampusPlay</h1>

    <nav>
        <a href="index.html">Accueil</a>
        <a href="events.php">Événements</a>
        <a href="my-events.php">Mes inscriptions</a>
        <a href="resources.php">Ressources</a>
        <a href="my-events.php">Mes inscriptions</a>
        <a href="my-reservations.php">Mes réservations</a>
        <a href="../backend/logout.php">Déconnexion</a>
    </nav>
</header>

<main>
    <section class="hero">

        <h2>Mes inscriptions</h2>

        <?php if (count($events) === 0): ?>
            <p>Vous n’êtes inscrit à aucun événement pour le moment.</p>
        <?php endif; ?>

        <?php foreach ($events as $event): ?>
            <div class="card">
                <h3><?= htmlspecialchars($event["titre"]) ?></h3>
                <p>Date : <?= htmlspecialchars($event["date_event"]) ?></p>
                <p>Heure : <?= htmlspecialchars($event["heure_event"]) ?></p>
                <p>Lieu : <?= htmlspecialchars($event["lieu"]) ?></p>

                <form action="../backend/cancel_registration.php" method="POST">
                    <input type="hidden" name="id_event" value="<?= $event["id_event"] ?>">
                    <button type="submit" class="btn">Annuler inscription</button>
                </form>
            </div>
        <?php endforeach; ?>

    </section>
</main>

<footer>
    <p>Projet Web Dynamique 2026 - CampusPlay</p>
</footer>

</body>
</html>