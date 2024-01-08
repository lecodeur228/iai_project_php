<?php
// Code pour établir la connexion à la base de données et initialiser $db
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

?>