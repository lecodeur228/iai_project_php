<?php  
@include('../validation/register_validation.php');
// @include('./website/config.php');

$hostname = "localhost";
$database = "iaiprojetphp";
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


$firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : "";
$lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
$birthday = isset($_POST["birthday"]) ? $_POST["birthday"] : "";
$anne_bac = isset($_POST["anne_bac"]) ? $_POST["anne_bac"] : "";
$country = isset($_POST["country"]) ? $_POST["country"] : "";
$serie = isset($_POST["serie"]) ? $_POST["serie"] : "";
$sexe = isset($_POST["sexe"]) ? $_POST["sexe"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$image = isset($_POST["image"]) ? $_POST["image"] : "";
$targetDirectory = "uploads/";
$targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
if (empty($firstname) && empty($lastname) && empty($birthday) && empty($country) && empty($serie) && empty($sexe) && empty($password) && empty($image)) {
    header("../register.php?error=0");
}
if (empty($firstname)) {
    header("../register.php?error=1");
}
if (empty($lastname)) {
    header("../register.php?error=2");
}
if (empty($birthday)) {
    header("../register.php?error=3");
}
if (empty($anne_bac)) {
    header("../register.php?error=4");
}
if (empty($country)) {
    header("../register.php?error=5");
}
if (empty($serie)) {
    header("../register.php?error=6");
}
if (empty($sexe)) {
    header("../register.php?error=7");
}
if (empty($password)) {
    header("../register.php?error=8");
}
if (empty($image)) {
    header("../register.php?error=9");
}

// Vérifier si le fichier image est une image réelle ou une fausse image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        header("../register.php");
        $uploadOk = 0;
    }
}

// Vérifier si le fichier existe déjà
if (file_exists($targetFile)) {
    $uploadOk = 0;
    header("../register.php?error=10");
}

// Vérifier la taille du fichier (ici, limitée à 2 Mo)
if ($_FILES["image"]["size"] > 2000000) {
    
    $uploadOk = 0;
    header("../register.php?error=11");
}

// Autoriser certains formats de fichiers
$allowedExtensions = array("jpg", "jpeg", "png", "gif");
if (!in_array($imageFileType, $allowedExtensions)) {
    header("../register.php?error=12");
    $uploadOk = 0;
}

// Vérifier si $uploadOk est défini à 0 par une erreur
if ($uploadOk == 0) {
    header("../register.php?error=13");
    
} else {
    // Si tout est correct, essayer d'uploader le fichier
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        echo "Le fichier ". htmlspecialchars(basename($_FILES["image"]["name"])). " a été téléchargé.";

         // Préparer la requête d'insertion avec le nom du fichier image
    $query = "INSERT INTO etudiants (nom, prenom, date_nais, nationalite, annee_bac, serie, sexe, mdp, photo_passport) 
    VALUES (:nom, :prenom, :date_nais, :nationalite, :annee_bac,:serie, :sexe, :mdp, :photo_passport)";

$stmt = $db->prepare($query);

// Binder les valeurs
$stmt->bindParam(':nom', $firstname);
$stmt->bindParam(':prenom', $lastname);
$stmt->bindParam(':date_nais', $birthday);
$stmt->bindParam(':nationalite', $country);
$stmt->bindParam(':annee_bac', $anne_bac);
$stmt->bindParam(':serie', $serie);
$stmt->bindParam(':sexe', $sexe);
$stmt->bindParam(':mdp', $password);
$stmt->bindParam(':photo_passport', $_FILES["image"]["name"]);

// Exécuter la requête
$stmt->execute();

        // Rediriger l'utilisateur vers une page de confirmation ou effectuer d'autres actions nécessaires
        header("Location: ../login.php");
        exit();
    } else {
        echo "Désolé, une erreur s'est produite lors du téléchargement du fichier.";
    }
}

?>