<?php

class EnfantModel
{
    private $bdd;

    public function __construct(PDO $bdd) { $this->bdd = $bdd; }

    public function ajouter(int $parentId, array $donnees): int
    {
        $pai = !empty($donnees['pai']) ? 1 : 0;
        $detailPai = $pai ? trim($donnees['detail_pai'] ?? '') : null;
        $requete = $this->bdd->prepare('INSERT INTO enfant (nom, prenom, date_naissance, pai, detail_pai, id_parent) VALUES (?, ?, ?, ?, ?, ?)');
        $requete->execute([trim($donnees['nom']), trim($donnees['prenom']), $donnees['date_naissance'], $pai, $detailPai, $parentId]);
        return (int) $this->bdd->lastInsertId();
    }

    public function affecterAnimateur(int $enfantId, int $animateurId): bool
    {
        $requete = $this->bdd->prepare('UPDATE enfant SET id_animateur = ? WHERE id = ?');
        $requete->execute([$animateurId, $enfantId]);
        return $requete->rowCount() === 1;
    }

    public function listePourAdministration(): array
    {
        return $this->bdd->query('SELECT e.*, CONCAT(pu.prenom, " ", pu.nom) AS parent, CONCAT(au.prenom, " ", au.nom) AS animateur FROM enfant e JOIN parent p ON p.id = e.id_parent JOIN utilisateur pu ON pu.id = p.id_utilisateur LEFT JOIN animateur a ON a.id = e.id_animateur LEFT JOIN utilisateur au ON au.id = a.id_utilisateur ORDER BY e.id_animateur IS NOT NULL, e.nom')->fetchAll(PDO::FETCH_ASSOC);
    }
}
