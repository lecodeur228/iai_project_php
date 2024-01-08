<?php

$hostname = "localhost";
$database = "iai_project";
$username = "root";
$password = "";

try {
    $dsn = "mysql:host=$hostname;dbname=$database;charset=utf8";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Récupérer les valeurs depuis le formulaire ou toute autre source appropriée
$date_concour = isset($_POST["date_concour"]) ? $_POST["date_concour"] : "";
$date_depot = isset($_POST["date_depot"]) ? $_POST["date_depot"] : "";

// Requête UPDATE
$query = "UPDATE `date_concours` SET `date_concour` = :date_concour, `date_limit` = :date_limit WHERE `id` = :id";
$stmt = $db->prepare($query);
$id = 1;

// Binder les valeurs
$stmt->bindParam(':id', $id);
$stmt->bindParam(':date_concour', $date_concour);
$stmt->bindParam(':date_limit', $date_depot);

// Exécution de la requête
try {
    $stmt->execute();
    header("../html/index.php");
} catch (PDOException $e) {
    echo "Erreur lors de la mise à jour : " . $e->getMessage();
}

?>
