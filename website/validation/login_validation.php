<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : "";
    $password = isset($_POST["mdp"]) ? $_POST["mdp"] : "";
     // Vérifier si tous les champs obligatoires sont remplis
     if (empty($firstname) || empty($password)) {
                              
     }
}


?>