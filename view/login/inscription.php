

    <form id="form-inscription" action="controller/utilisateur/utilisateurController.php" method="POST">
        <input type ="text" name="nom" placeholder="Nom" required>
        <input type ="text" name="prenom" placeholder="Prénom" required>
        <input type ="email" name="email" placeholder="Email" required>
        <input type ="password" name="mdp" placeholder="Mot de passe" required>
        <input type ="text" name="telephone" placeholder="Téléphone" required>
        <input type="hidden" value="inscrire" name= "action">
        <input type="submit" value="inscrire" name= "inscrire">
    </form>