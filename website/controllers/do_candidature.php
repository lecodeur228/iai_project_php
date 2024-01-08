<?php
// @include('../validation/document_validation.php');
// @include('./website/config.php');

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



    // Fichiers téléchargés avec succès, maintenant insérez les informations dans la base de données
    $query = "INSERT INTO candidats (date_cand, etudiant_id) 
              VALUES (:date_cand, :etudiant_id)";

    $stmt = $db->prepare($query);
    session_start();

    ;
    // Binder les valeurs
    $date_now = date("Y-m-d");
    $stmt->bindParam(':date_cand', $date_now );
    $stmt->bindParam(':etudiant_id', $_SESSION["user"]["id"]); // Assurez-vous de définir cette variable

    // Exécuter la requête
    $stmt->execute();

    // Redirigez ou affichez un message de succès
    header("Location: ../index.php");
    exit();

?>
