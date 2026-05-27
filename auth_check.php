<?php
// On vérifie si la session n'est pas déjà démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Si le parent n'est pas connecté (la variable parent_id n'existe pas)
if (!isset($_SESSION['parent_id'])) {
    // On le redirige immédiatement vers la page de connexion
    header("Location: connexion.php");
    exit(); // On arrête le chargement de la page
}
?>