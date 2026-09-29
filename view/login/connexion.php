<div class="max-w-md mx-auto bg-white p-8 border border-slate-200 rounded-2xl shadow-sm mt-8 md:mt-16">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-slate-900">Te connecter</h2>
        <p class="text-slate-500 mt-2">Accède à ton espace parent</p>
    </div>
   <?php if (isset($erreur)): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded-md mb-4 text-sm text-center">
            <?= ($erreur) ?>
        </div>
    <?php endif; ?>
    <form action="controller/utilisateur/utilisateurController.php"  method="POST">
        <div>
            <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">Adresse email</label>
            <input type="email" id="email" name="email" required placeholder="nom.prenom@email.com"
                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
        </div>
        
        <div>
            <label for="password" class="block text-sm font-semibold text-slate-700 mb-1.5">Mot de passe</label>
            <input type="password" id="password" name="mdp" required placeholder="••••••••"
                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
        </div>
        <!--
        <div class="flex items-center justify-between pt-2">
            <label class="flex items-center cursor-pointer">
                <input type="checkbox" class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                <span class="ml-2 text-sm text-slate-600">Se souvenir de moi</span>
            </label>
            <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-700 hover:underline">Mot de passe oublié ?</a>
        </div>
    -->

        <input type="hidden" value="login" name= "action" >
        <input type="submit" value="se connecter" name= "login" class="w-full bg-indigo-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-100 transition-all mt-4">
    </form>

    <div class="mt-8 pt-6 border-t border-slate-100 text-center">
        <p class="text-sm text-slate-600">
            Tu n'as pas encore de compte ? 
            <a href="index.php?page=inscription" class="text-indigo-600 font-semibold hover:underline">S'inscrire</a>
        </p>
    </div>
</div>