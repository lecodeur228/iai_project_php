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

// Traitez les autres champs du formulaire...

// Traitez le téléchargement des fichiers PDF

session_start();
$etudiant_id = $_SESSION['user']['id'];

$userFolder = "uploads/doc/etudant_" . $etudiant_id . "/";

// Créez le répertoire s'il n'existe pas encore
if (!file_exists($userFolder)) {
    mkdir($userFolder, 0777, true);
}

// Traitez le téléchargement des fichiers PDF dans le répertoire de l'utilisateur
$pdfNaissance = $userFolder . "pdf_naissance.pdf";
$pdfNationalite = $userFolder . "pdf_nationalite.pdf";
$pdfAttestation = $userFolder . "pdf_attestation.pdf";


// Traitez chaque fichier PDF
if (move_uploaded_file($_FILES["pdf_naissance"]["tmp_name"], $pdfNaissance) &&
    move_uploaded_file($_FILES["pdf_nationalite"]["tmp_name"], $pdfNationalite) &&
    move_uploaded_file($_FILES["pdf_attestation"]["tmp_name"], $pdfAttestation)) {

    // Fichiers téléchargés avec succès, maintenant insérez les informations dans la base de données
    $query = "INSERT INTO document_confirmation (nais, nat, attes, etudiant_id) 
              VALUES (:nais, :nat, :attes, :etudiant_id)";

    $stmt = $db->prepare($query);

    // Binder les valeurs
    $stmt->bindParam(':nais', $pdfNaissance);
    $stmt->bindParam(':nat', $pdfNationalite);
    $stmt->bindParam(':attes', $pdfAttestation);
    $stmt->bindParam(':etudiant_id', $etudiant_id); // Assurez-vous de définir cette variable

    // Exécuter la requête
    $stmt->execute();

    // Redirigez ou affichez un message de succès
    header("Location: index.php");
    exit();

} else {
    // Erreur lors du téléchargement des fichiers
    echo "Erreur lors du téléchargement des fichiers PDF.";
}
?>
