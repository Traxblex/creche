
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card creche-card">
            <div class="card-body p-4">
                <h2 class="card-title text-center mb-4" style="color: var(--primary-color);">Connexion</h2>

                <?php if (isset($erreur)): ?>
                    <div class="bg-red-100 text-red-700 p-3 rounded-md mb-4 text-sm text-center">
                        <?= ($erreur) ?>
                    </div>
                <?php endif; ?>
                <form action="controller/utilisateur/utilisateurController.php"  method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="mdp" required>
                    </div>
                    <input type="hidden" value="login" name= "action">
                    <input type="submit" value="Se connecter" name="login" class="btn creche-btn-primary w-100 mt-3">
                </form>
            </div>
        </div>
    </div>
</div>