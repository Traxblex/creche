<?php
session_start();

ob_start();
$page = isset($_GET['page']) ? $_GET['page'] : 'index';

if ($page === 'deconnexion') {
    $_SESSION = [];
    session_destroy();
    header('Location: index.php?page=index');
    exit;
}

include __DIR__ . '/view/layout/header.php';

    switch ($page) {
        case 'index':
            include __DIR__ . '/view/accueil/index.php';
            break;
        case 'inscription':
            include __DIR__ . '/view/login/inscription.php';
            break;
        case 'connexion':
            include __DIR__ . '/view/login/connexion.php';
            break;
        case 'userController':
            include __DIR__ . "/controller/utilisateur/utilisateurController.php";
            break;

        default:
            include __DIR__ . '/view/accueil/index.php';
            break;
    }
    ?>