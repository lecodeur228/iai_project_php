<?php


// Informations de connexion à la base de données
$hostname = "localhost";
$database = "iaiprojetphp";
$username = "root";
$password = "";

try {
    // Connexion à la base de données
    $dsn = "mysql:host=$hostname;dbname=$database;charset=utf8";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit;
}

// Récupérer les données du formulaire
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";

// Vérifier si les champs requis sont remplis
if (empty($email) && empty($mdp)) {
    header("Location: ../login_admin.php?error=3");
    exit;
}
if (empty($email)) {
    header("Location: ../login_admin.php?error=2?value2=$mdp");
    exit;
}
if (empty($mdp)) {
    header("Location: ../login.php?error=3?value1=$email");
    exit;
}


// Préparer et exécuter la requête SQL
$query = "SELECT * FROM admins WHERE email=:email AND mdp=:mdp";
$stmt = $db->prepare($query);

// Binder les valeurs
$stmt->bindParam(':email', $email);
$stmt->bindParam(':mdp', $mdp);

// Exécuter la requête
$stmt->execute();

// Vérifier le nombre de résultats
if ($stmt->rowCount() == 1) {
    // Récupérer les résultats sous forme de tableau associatif
    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    // Démarrer la session et enregistrer l'utilisateur
    session_start();
    $_SESSION['admin'] = $results; // Enregistre l'utilisateur dans la session

    // Rediriger vers la page d'accueil
    header("Location: ../index.php");
    exit();
} else {
    // Rediriger vers la page de connexion avec un message d'erreur
    header("Location: ./login_admin.php?error=1");
    exit();
}
?>
