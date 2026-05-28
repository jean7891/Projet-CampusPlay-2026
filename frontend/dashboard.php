<?php

session_start();

if (!isset($_SESSION["id_user"])) {
    header("Location: login.html");
    exit;
}

if ($_SESSION["role"] !== "admin") {
    die("Accès refusé. Cette page est réservée aux administrateurs.");
}

require_once "../backend/config.php";

$users = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();

$events = $pdo->query("SELECT COUNT(*) FROM events")->fetchColumn();

$reservations = $pdo->query("
    SELECT COUNT(*) 
    FROM reservations 
    WHERE statut = 'en_attente'
")->fetchColumn();

$resources = $pdo->query("
    SELECT COUNT(*) 
    FROM resources 
    WHERE disponibilite = 1
")->fetchColumn();

$sql = "
SELECT reservations.*, 
       users.nom AS user_nom,
       users.prenom,
       resources.nom AS resource_nom
FROM reservations
INNER JOIN users 
ON reservations.id_user = users.id_user
INNER JOIN resources 
ON reservations.id_resource = resources.id_resource
WHERE reservations.statut = 'en_attente'
";

$stmt = $pdo->query($sql);

$pendingReservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - CampusPlay</title>
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

    <h2>Tableau de bord administrateur</h2>

    <div class="card">

        <h3>Statistiques générales</h3>

        <p>
            Utilisateurs inscrits : <?= $users ?>
        </p>

        <p>
            Événements créés : <?= $events ?>
        </p>

        <p>
            Réservations en attente : <?= $reservations ?>
        </p>

        <p>
            Ressources disponibles : <?= $resources ?>
        </p>

    </div>

    <div class="card">

        <h3>Demandes de réservation</h3>

        <?php if (count($pendingReservations) === 0): ?>

            <p>Aucune demande en attente.</p>

        <?php endif; ?>

        <?php foreach ($pendingReservations as $reservation): ?>

            <p>
                <strong>Utilisateur :</strong>

                <?= htmlspecialchars(
                    $reservation["prenom"] . " " . $reservation["user_nom"]
                ) ?>
            </p>

            <p>
                <strong>Ressource :</strong>

                <?= htmlspecialchars($reservation["resource_nom"]) ?>
            </p>

            <p>
                <strong>Début :</strong>

                <?= htmlspecialchars($reservation["date_debut"]) ?>
            </p>

            <p>
                <strong>Fin :</strong>

                <?= htmlspecialchars($reservation["date_fin"]) ?>
            </p>

            <form action="../backend/update_reservation_status.php"
                  method="POST">

                <input type="hidden"
                       name="id_reservation"
                       value="<?= $reservation["id_reservation"] ?>">

                <button class="btn"
                        name="statut"
                        value="validee">

                    Valider

                </button>

                <button class="btn"
                        name="statut"
                        value="refusee">

                    Refuser

                </button>

            </form>

            <hr>

        <?php endforeach; ?>

    </div>

</section>

</main>

<footer>
    <p>Projet Web Dynamique 2026 - CampusPlay</p>
</footer>

</body>
</html>