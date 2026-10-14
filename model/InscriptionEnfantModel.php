<?php

class InscriptionEnfantModel
{
    private $bdd;

    public function __construct(PDO $bdd) { $this->bdd = $bdd; }

    public function creer(int $enfantId, string $dateDebut): void
    {
        $requete = $this->bdd->prepare('INSERT INTO inscription_enfant (date_debut, id_enfant) VALUES (?, ?)');
        $requete->execute([$dateDebut, $enfantId]);
    }
}
