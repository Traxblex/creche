<?php
session_start();

ob_start();
 include __DIR__ . '/view/layout/header.php';  

 $page = isset($_GET['page']) ?$_GET['page'] : 'index';

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
        default:
            include __DIR__ . '/view/accueil/index.php';
            break;
    }