<?php

session_start();
require_once "../backend/config.php";

if (!isset($_SESSION["id_user"])) {
    header("Location: login.html");
    exit;
}

$id_user = $_SESSION["id_user"];

$sql = "SELECT reservations.*, resources.nom, resources.type
        FROM reservations
        INNER JOIN resources ON reservations.id_resource = resources.id_resource
        WHERE reservations.id_user = :id_user
        ORDER BY reservations.date_debut ASC";

$stmt = $pdo->prepare($sql);
$stmt->execute([":id_user" => $id_user]);

$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes réservations - CampusPlay</title>
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

        <h2>Mes réservations</h2>

        <?php if (count($reservations) === 0): ?>
            <p>Vous n’avez aucune réservation pour le moment.</p>
        <?php endif; ?>

        <?php foreach ($reservations as $reservation): ?>
            <div class="card">
                <h3><?= htmlspecialchars($reservation["nom"]) ?></h3>

                <p>Type : <?= htmlspecialchars($reservation["type"]) ?></p>
                <p>Début : <?= htmlspecialchars($reservation["date_debut"]) ?></p>
                <p>Fin : <?= htmlspecialchars($reservation["date_fin"]) ?></p>
                <p>Statut : <?= htmlspecialchars($reservation["statut"]) ?></p>

                <form action="../backend/cancel_reservation.php" method="POST">
                    <input type="hidden" name="id_reservation" value="<?= $reservation["id_reservation"] ?>">
                    <button type="submit" class="btn">Annuler réservation</button>
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