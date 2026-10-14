<?php
require_once __DIR__ . '/../bdd/bdd.php';
require_once __DIR__ . '/../model/ParentModel.php';
require_once __DIR__ . '/../model/EnfantModel.php';
require_once __DIR__ . '/../model/InscriptionEnfantModel.php';
session_start();

function retourDashboardParent($message, $type = 'success') {
    $_SESSION['flash'] = ['message' => $message, 'type' => $type];
    header('Location: ../index.php?page=dashboard');
    exit;
}

try {
    if (!isset($_SESSION['user_id'])) throw new RuntimeException('Veuillez vous connecter.');
    if (($_SESSION['user_role'] ?? '') !== 'parent') throw new RuntimeException('Action non autorisée.');
    if (($_POST['action'] ?? '') !== 'ajouter_enfant') throw new RuntimeException('Action non reconnue.');
    foreach (['nom', 'prenom', 'date_naissance', 'date_debut'] as $champ) if (empty($_POST[$champ])) throw new RuntimeException('Tous les champs obligatoires doivent être renseignés.');

    $parent = new ParentModel($bdd);
    $parentId = $parent->trouverIdParUtilisateur((int) $_SESSION['user_id']);
    if (!$parentId) throw new RuntimeException('Profil parent introuvable.');

    $bdd->beginTransaction();
    $enfantId = (new EnfantModel($bdd))->ajouter($parentId, $_POST);
    (new InscriptionEnfantModel($bdd))->creer($enfantId, $_POST['date_debut']);
    $bdd->commit();
    retourDashboardParent('Votre enfant a bien été inscrit. L’équipe va procéder à son affectation.');
} catch (Throwable $e) {
    if ($bdd->inTransaction()) $bdd->rollBack();
    retourDashboardParent($e->getMessage(), 'error');
}
