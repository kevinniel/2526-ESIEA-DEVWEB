<?php

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

// on gère le traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = "UPDATE film SET nom=:nom, genre=:genre, annee=:annee WHERE id=:id";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id"   => $_POST["id"],
        ":nom"   => $_POST["titre"],
        ":genre" => $_POST["genre"],
        ":annee" => $_POST["year"]
    ]);
}


header("location:index.php");