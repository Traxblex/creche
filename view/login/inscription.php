
        <div class="row justify-content-center">
            <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <h2 class="card-title text-center mb-4">Inscription</h2>
                            <form action= "controller/utilisateur/utilisateurController.php" method="POST">
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="nom" name="nom" required>
                                    </div>
                                    <div class="col">
                                        <label for="prenom" class="form-label">Prénom</label>
                                        <input type="text" class="form-control" id="prenom" name="prenom" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Adresse Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" id="password" name="mdp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label"> Téléphone</label>
                                    <input type="text" class="form-control" id="telephone" name="telephone" required>
                                </div>
                                <input type="hidden" value="inscrire" name= "action">
                                <input type="submit" value="inscrire" class="btn btn-success w-100" name= "inscrire">
                            </form>
                        </div>
                    </div>
                </div>
        </div>
