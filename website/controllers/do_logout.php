<?php
    // Démarrez la session
    session_start();

    // Supprime la variable de session "user"
    unset($_SESSION['user']);

    // Facultatif : détruit complètement la session si nécessaire
    session_destroy();   
    header("Location: ../views/index.php");



?>