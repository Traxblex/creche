

<div class="max-w-md mx-auto mt-24 mb-12 bg-white p-8 border border-gray-200 rounded-xl shadow-sm mt-20">
    <h1 class="mt-10 text-2xl font-bold text-center mb-6">Connexion</h1>

    <?php if (isset($erreur)): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded-md mb-4 text-sm text-center">
            <?= ($erreur) ?>
        </div>
    <?php endif; ?>

    <form action="controller/utilisateur/utilisateurController.php" method="POST" class="space-y-4">
        
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Adresse Email</label>
            <input type="email" id="email" name="email" required 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 border">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
            <input type="password" id="password" name="mdp" required 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 border">
        </div>

        <input type="hidden" value="login" name= "action">
        <input type="submit" value="se connecter" name= "login">
        
    </form>
</div>