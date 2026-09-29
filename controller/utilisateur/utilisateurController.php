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
            header('location:http://localhost:8888/promo321/info/cours_info_shapeche/creche/index.php?page=connexion');
            var_dump('je passe ici');
        die();
        }
        public function login()
        {
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];

            $user = $this->utilisateur->login($email, $mdp);

            
            if ($user && !empty($user['mdp']) ) {
        
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];

               
                header("Location: http://localhost:8888/promo321/info/cours_info_shapeche/creche/index.php?page=dashboard");
                
                
            } else {
                $erreur = "Email ou mot de passe incorrect.";
            }
        }
}
    
