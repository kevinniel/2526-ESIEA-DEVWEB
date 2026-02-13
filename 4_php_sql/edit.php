<?php

// connexion BDD
$dsn = "mysql:host=localhost:8889;dbname=films_db;charset=utf8mb4";
$user = "root";
$password = "root";

try {
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Erreur connexion : " . $e->getMessage());
}

// Requete du film en question
$sql = "SELECT * FROM film WHERE id=:id";
$stmt = $pdo->prepare($sql);

$stmt->execute([
    ":id" => $_GET["id"],
]);

$film = $stmt->fetch();

var_dump($film);



?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Films - Catalogue</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrap">
        <header>
            <div>
                <h1>Catalogue de films</h1>
                <div class="subtitle">Une sélection courte et élégante, prête à être enrichie par de nouveaux titres.</div>
            </div>
            <span class="badge">Sélection 2026</span>
        </header>

        <section class="grid">
            <div class="card">
                <form id="submitform" action="update.php" method="POST">
                    <input type="hidden" name="id" value="<?= $film["id"] ?>">
                    <div class="field">
                        <label for="titre">Nom du film</label>
                        <input id="titre" name="titre" type="text" placeholder="Ex. Inception" value="<?= $film["nom"] ?>" />
                    </div>
                    <div class="two">
                        <div class="field">
                            <label for="annee">Année</label>
                            <input id="annee" name="year" type="number" placeholder="Ex. 2010"  value="<?= $film["annee"] ?>" />
                        </div>
                        <div class="field">
                            <label for="genre">Genre</label>
                            <select id="genre" name="genre">
                                <option value="Drame" <?= ($film["genre"] === "Drame") ? "selected" : "" ?>>
                                    Drame
                                </option>

                                <option value="Science-fiction" <?= ($film["genre"] === "Science-fiction") ? "selected" : "" ?>>
                                    Science-fiction
                                </option>

                                <option value="Comédie" <?= ($film["genre"] === "Comédie") ? "selected" : "" ?>>
                                    Comédie
                                </option>

                                <option value="Thriller" <?= ($film["genre"] === "Thriller") ? "selected" : "" ?>>
                                    Thriller
                                </option>
                            </select>
                        </div>
                    </div>
                    <button type="submit">Mettre à jour</button>
                </form>
            </div>
        </section>
    </div>
</body>
</html>
