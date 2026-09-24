<?php
    include("../../model/utilisateur.php");
    include("../../bdd/bdd.php");
    session_start();

    if (isset($_POST["action"])) {
        
        $utilisateurController = new utilisateurController($bdd);
        switch($_POST["action"]) {
            case "inscrire":
                $utilisateurController->create();
            break;
            case "login":
                $utilisateurController->login();
            break;
            case "modifier":
            break;
        }
    }

    class utilisateurController {
        private $utilisateur;

        public function __construct($bdd) {
            $this->utilisateur = new Utilisateur($bdd);
        }

        public function create(){
            $this->utilisateur->ajouterUtilisateur($_POST["nom"],$_POST["prenom"],$_POST["email"],$_POST["mdp"],$_POST["telephone"] );
            header('location:http://localhost:8888/promo321/info/cours_info_shapeche/creche/index.php?page=index');
            var_dump('je passe ici');
        die();
        }
        public function login()
        
        {
            $result = $this->utilisateur->checkUtilisateur($_POST['email'],$_POST['mdp']);
            if ($result){
                $_SESSION['utilisateur']=$result;
                header('location:http://localhost:8888/promo321/info/cours_info_shapeche/creche/index.php?page=index');
            }
            else{
                echo('mot de passe ou mail incorrect');
            }
        }
    }