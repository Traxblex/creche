<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Crèche</title>
    <!-- Chargement de Tailwind via CDN pour le développement -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 flex flex-col min-h-screen text-slate-800 font-sans">
    
    <header class="bg-white shadow-sm border-b border-slate-200 sticky top-0 z-50">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="index.php?page=index" class="text-2xl font-black text-indigo-600 hover:text-indigo-700 transition-colors flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                </svg>
                Ma Crèche
            </a>
            <div class="flex items-center space-x-6">
                <a href="index.php?page=index" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors">Accueil</a>
                <?php if (!isset($_SESSION['user_id'])): ?>
                <a href="index.php?page=connexion" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors">Connexion</a>
                <a href="index.php?page=inscription" class="bg-indigo-600 text-white px-5 py-2.5 rounded-lg hover:bg-indigo-700 transition-colors font-medium shadow-sm">S'inscrire</a>
                <?php else: ?>
                <a href="index.php?page=deconnexion" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors">Deconnexion</a>
                <a href="index.php?page=dashboard" class="bg-indigo-600 text-white px-5 py-2.5 rounded-lg hover:bg-indigo-700 transition-colors font-medium shadow-sm">dashboard</a>
                <?php endif ?>
            </div>
            
        </nav>
    </header>

    <!-- Conteneur principal -->
    <main class="flex-grow container mx-auto px-6 py-10">

