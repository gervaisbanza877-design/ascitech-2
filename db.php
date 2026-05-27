<?php
// Informations de connexion à WampServer
$host = 'localhost';
$dbname = 'ascitech_db';
$username = 'root';
$password = ''; // Par défaut sur WampServer, le mot de passe est vide

try {
    // Création de la connexion PDO avec activation des erreurs et du format UTF-8
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    // Si la connexion échoue, on arrête tout et on affiche l'erreur
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>