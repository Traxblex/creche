<?php
try {
    $host = getenv('DB_HOST') ?: 'localhost';
    $port = getenv('DB_PORT') ?: '3306';
    $db   = getenv('DB_DATABASE') ?: 'creche';
    $user = getenv('DB_USERNAME') ?: 'root';
    $pass = getenv('DB_PASSWORD') !== false ? getenv('DB_PASSWORD') : 'root';

    $bdd = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4", $user, $pass);
} catch (PDOException $e) {
    error_log('Connexion BDD : ' . $e->getMessage());
    die('Erreur de connexion à la base de données.');
}
