<?php

class AnimateurModel
{
    private $bdd;

    public function __construct(PDO $bdd) { $this->bdd = $bdd; }

    public function enfantsDeAnimateur(int $utilisateurId): array
    {
        $requete = $this->bdd->prepare('SELECT e.*, CONCAT(pu.prenom, " ", pu.nom) AS parent, pu.telephone AS telephone_parent FROM enfant e JOIN animateur a ON a.id = e.id_animateur JOIN parent p ON p.id = e.id_parent JOIN utilisateur pu ON pu.id = p.id_utilisateur WHERE a.id_utilisateur = ? ORDER BY e.nom, e.prenom');
        $requete->execute([$utilisateurId]);
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function disponibles(): array
    {
        return $this->bdd->query('SELECT a.id, a.capacite, CONCAT(u.prenom, " ", u.nom) AS nom, COUNT(e.id) AS enfants_affectes FROM animateur a JOIN utilisateur u ON u.id = a.id_utilisateur LEFT JOIN enfant e ON e.id_animateur = a.id WHERE a.disponible = 1 GROUP BY a.id HAVING enfants_affectes < a.capacite ORDER BY nom')->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verrouiller(int $animateurId): ?array
    {
        $requete = $this->bdd->prepare('SELECT capacite, disponible FROM animateur WHERE id = ? FOR UPDATE');
        $requete->execute([$animateurId]);
        return $requete->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function nombreEnfantsAffectes(int $animateurId): int
    {
        $requete = $this->bdd->prepare('SELECT COUNT(*) FROM enfant WHERE id_animateur = ?');
        $requete->execute([$animateurId]);
        return (int) $requete->fetchColumn();
    }
}
