<?php

class utilisateur
{
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function ajouterUtilisateur ($nom, $prenom, $email, $mdp, $telephone)
    {
        $req = $this -> bdd -> prepare("INSERT INTO utilisateur (nom, prenom, email, mdp, telephone) values (:nom, :prenom, :email, :mdp, :telephone)");
        $req -> bindparam(":nom", $nom);
        $req -> bindparam(":prenom", $prenom);
        $req -> bindparam(":email", $email);
        $req -> bindparam(":mdp", $mdp);
        $req -> bindparam(":telephone", $telephone);
        return $req->execute();
    }

    public function delete($id){
        $req = $this->bdd->prepare('DELETE FROM utilisateur WERE id = ?');
        return $req->execute([$id]);
    }
    public function update($nom, $prenom, $email, $mdp, $telephone)
    {
    $req = $this -> bdd -> prepare("UPDATE utilisateur SET nom = :nom, prenom = :prenom, email = :email, mdp = :mdp, telephone = :telephone WHERE id = :id");
        $req -> bindparam(":nom", $nom);
        $req -> bindparam(":prenom", $prenom);
        $req -> bindparam(":$email", $email);
        $req -> bindparam(":mdp", $mdp);
        $req -> bindparam(":telephone", $telephone);
        return $req->execute();
    }
     public function login($email,$mdp)
    {
        $req = $this->bdd->prepare("SELECT * FROM utilisateur WHERE email = :email && mdp =:mdp");
        $req->execute(['email' => $email,'mdp'=>$mdp]);
        return $req->fetch();
    }
    
}

?>









