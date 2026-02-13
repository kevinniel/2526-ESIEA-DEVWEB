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

if (isset($_GET["delete"])) {

    $sql = "DELETE FROM film WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":id" => $_GET["delete"]
    ]);
}


header("location:index.php");
