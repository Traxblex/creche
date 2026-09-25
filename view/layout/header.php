<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Petits Explorateurs · Crèche &amp; éveil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg creche-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?page=index">🚂 Les Petits Explorateurs</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="index.php?page=notre_approche">Notre approche</a>
                    <a class="nav-link" href="index.php?page=infos_pratiques">Infos pratiques</a>
                    <div class="justify-content-end d-flex align-items-center">
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <a class="nav-link" href="index.php?page=mon_compte">Mon compte</a>
                            <a class="nav-link" href="index.php?page=deconnexion">Déconnexion</a>
                        <?php else: ?>
                            <a class="nav-link" href="index.php?page=connexion">se connecter</a>
                            <a class="nav-link" href="index.php?page=inscription">s'inscrire</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main class="container flex-grow-1 my-5">