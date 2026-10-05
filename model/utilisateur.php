<?php

class utilisateur
{
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function ajouterUtilisateur ($nom, $prenom, $email, $mdp, $telephone, $role, $profession= null, $annee_exp = null,$disponible = null)
    {
        $req = $this -> bdd -> prepare("INSERT INTO utilisateur (nom, prenom, email, mdp, telephone, role) values (:nom, :prenom, :email, :mdp, :telephone, :role)");
        $req -> bindparam(":nom", $nom);
        $req -> bindparam(":prenom", $prenom);
        $req -> bindparam(":email", $email);
        $req -> bindparam(":mdp", $mdp);
        $req -> bindparam(":telephone", $telephone);
        $req -> bindparam(":role", $role);
        $req->execute();
        $id_utilisateur = $this->bdd->lastInsertId();

        if ($role == 'parent') {
            $reqs = $this->bdd->prepare('insert into parent(profession, id_utilisateur) values (:profession, :id_utilisateur)');
            $reqs->bindParam(':profession', $profession);
            $reqs->bindParam(':id_utilisateur', $id_utilisateur); 
            $reqs->execute();

        } else {
            $reqs = $this->bdd->prepare('insert into animateur(annee_exp, disponible, id_utilisateur) values (:annee_exp, :disponible, :id_utilisateur)');
            $reqs->bindParam(':annee_exp', $annee_exp);
            $reqs->bindParam(':disponible', $disponible);
            $reqs->bindParam(':id_utilisateur', $id_utilisateur);
            $reqs->execute();
        }
        return true;        

    }
        

    public function delete(){
    }
    public function update()
    {
    }
     public function login($email,$mdp)
    {
        $req = $this->bdd->prepare("SELECT * FROM utilisateur WHERE email = :email && mdp =:mdp");
        $req->execute(['email' => $email,'mdp'=>$mdp]);
        return $req->fetch();
    }
    
}

?>









