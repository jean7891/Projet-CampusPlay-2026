<?php
require_once "../backend/config.php";

$sql = "SELECT * FROM resources ORDER BY nom ASC";
$stmt = $pdo->query($sql);
$resources = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ressources - CampusPlay</title>
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
        <a href="../backend/logout.php">Déconnexion</a>
    </nav>
</header>

<main>

<section class="hero">

<h2>Réservation des ressources</h2>

<?php if (count($resources) === 0): ?>
    <p>Aucune ressource disponible.</p>
<?php endif; ?>

<?php foreach ($resources as $resource): ?>

<div class="card">

    <h3><?= htmlspecialchars($resource["nom"]) ?></h3>

    <p>Type : <?= htmlspecialchars($resource["type"]) ?></p>

    <p>
        Disponibilité :
        <?= $resource["disponibilite"] ? "Disponible" : "Indisponible" ?>
    </p>

    <?php if ($resource["disponibilite"]): ?>

    <form action="../backend/reserve_resource.php" method="POST">

        <input type="hidden"
               name="id_resource"
               value="<?= $resource["id_resource"] ?>">

        <label>Date début</label>
        <br>

        <input type="datetime-local"
               name="date_debut"
               required>

        <br><br>

        <label>Date fin</label>
        <br>

        <input type="datetime-local"
               name="date_fin"
               required>

        <br><br>

        <button type="submit" class="btn">
            Demander réservation
        </button>

    </form>

    <?php endif; ?>

</div>

<?php endforeach; ?>

</section>

</main>

<footer>
    <p>Projet Web Dynamique 2026 - CampusPlay</p>
</footer>

</body>
</html>