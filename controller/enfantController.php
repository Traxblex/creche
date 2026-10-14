<?php
require_once __DIR__ . '/../bdd/bdd.php';
require_once __DIR__ . '/../model/EnfantModel.php';
require_once __DIR__ . '/../model/AnimateurModel.php';
session_start();

function retourDashboardEnfant($message, $type = 'success') {
    $_SESSION['flash'] = ['message' => $message, 'type' => $type];
    header('Location: ../index.php?page=dashboard');
    exit;
}

try {
    if (!isset($_SESSION['user_id'])) throw new RuntimeException('Veuillez vous connecter.');
    if (($_SESSION['user_role'] ?? '') !== 'admin') throw new RuntimeException('Action non autorisée.');
    if (($_POST['action'] ?? '') !== 'affecter_enfant') throw new RuntimeException('Action non reconnue.');
    $enfantId = (int) ($_POST['enfant_id'] ?? 0);
    $animateurId = (int) ($_POST['animateur_id'] ?? 0);
    if (!$enfantId || !$animateurId) throw new RuntimeException('Veuillez choisir un enfant et un animateur.');

    $bdd->beginTransaction();
    $animateurs = new AnimateurModel($bdd);
    $animateur = $animateurs->verrouiller($animateurId);
    if (!$animateur || !$animateur['disponible']) throw new RuntimeException('Cet animateur n’est plus disponible.');
    if ($animateurs->nombreEnfantsAffectes($animateurId) >= (int) $animateur['capacite']) throw new RuntimeException('Cet animateur a atteint sa capacité d’accueil.');
    if (!(new EnfantModel($bdd))->affecterAnimateur($enfantId, $animateurId)) throw new RuntimeException('Enfant introuvable ou affectation inchangée.');
    $bdd->commit();
    retourDashboardEnfant('L’enfant a été affecté à son animateur.');
} catch (Throwable $e) {
    if ($bdd->inTransaction()) $bdd->rollBack();
    retourDashboardEnfant($e->getMessage(), 'error');
}
