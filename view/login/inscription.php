<div class="max-w-lg mx-auto bg-white p-8 border border-slate-200 rounded-2xl shadow-sm mt-8 md:mt-12">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-slate-900">Créer un compte</h2>
        <p class="text-slate-500 mt-2">Rejoins-nous pour inscrire tes enfants</p>
    </div>
    
    <form action= "controller/utilisateur/utilisateurController.php" method="POST">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label for="nom" class="block text-sm font-semibold text-slate-700 mb-1.5">Nom</label>
                <input type="text" id="nom" name="nom" required placeholder="Camara"
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
            </div>
            <div>
                <label for="prenom" class="block text-sm font-semibold text-slate-700 mb-1.5">Prénom</label>
                <input type="text" id="prenom" name="prenom" required placeholder="Allama"
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
            </div>
        </div>

        <div>
            <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">Adresse email</label>
            <input type="email" id="email" name="email" required placeholder="jean.dupont@email.com"
                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
        </div>
        
        <div>
            <label for="password" class="block text-sm font-semibold text-slate-700 mb-1.5">Mot de passe</label>
            <input type="password" id="password" name="mdp" required placeholder="••••••••"
                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
        </div>
        <!--
        <div>
            <label for="password_confirm" class="block text-sm font-semibold text-slate-700 mb-1.5">Confirmer le mot de passe</label>
            <input type="password" id="password_confirm" name="password_confirm" required placeholder="••••••••"
                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
        </div>
        -->
        <div>
            <label for="telephone" class="block text-sm font-semibold text-slate-700 mb-1.5">Numéro de téléphone</label>
            <input type="tel" id="telephone" name="telephone" required placeholder="+33 6 12 34 56 78"
                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
        </div>

        <div>
            <label for="role-select" class="block text-sm font-medium text-gray-700">Je suis un :</label>
                <select name="role" id="role-select" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    <option value="freelance">Parent</option>
                    <option value="client">Animateur</option>
                </select>
        </div>

        <div id="champs-client-supplementaires" class="hidden mt-4 space-y-4 p-4 border border-gray-200 rounded-lg">
            <h3 class="text-sm font-bold text-gray-700">Informations suplementaire</h3>

            <div>
                <label class="block text-sm font-medium text-gray-700"> Experience </label>
                <input type="text" name="annee_exp" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700"></label>
                <input type="number" name="siret" maxlength="14" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
                
        </div>

        <input type="hidden" value="inscrire" name= "action">
        <input type="submit" name="inscrire" class="w-full bg-indigo-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-100 transition-all mt-6">
    </form>
    
    <div class="mt-8 pt-6 border-t border-slate-100 text-center">
        <p class="text-sm text-slate-600">
            Tu as déjà un compte ? 
            <a href="index.php?page=connexion" class="text-indigo-600 font-semibold hover:underline">Se connecter</a>
        </p>
    </div>
</div>