<?php

class ParentModel
{
    private $bdd;

    public function __construct(PDO $bdd) { $this->bdd = $bdd; }

    public function trouverIdParUtilisateur(int $utilisateurId): ?int
    {
        $requete = $this->bdd->prepare('SELECT id FROM parent WHERE id_utilisateur = ?');
        $requete->execute([$utilisateurId]);
        $parent = $requete->fetch(PDO::FETCH_ASSOC);
        return $parent ? (int) $parent['id'] : null;
    }

    public function enfantsDuParent(int $utilisateurId): array
    {
        $requete = $this->bdd->prepare('SELECT e.*, i.date_debut, CONCAT(u.prenom, " ", u.nom) AS animateur FROM enfant e JOIN parent p ON p.id = e.id_parent LEFT JOIN inscription_enfant i ON i.id_enfant = e.id LEFT JOIN animateur a ON a.id = e.id_animateur LEFT JOIN utilisateur u ON u.id = a.id_utilisateur WHERE p.id_utilisateur = ? ORDER BY e.nom, e.prenom');
        $requete->execute([$utilisateurId]);
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
}
