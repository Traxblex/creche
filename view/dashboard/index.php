<?php
if (!isset($_SESSION['user_id'])) { header('Location: index.php?page=connexion'); exit; }
require_once __DIR__ . '/../../bdd/bdd.php';
require_once __DIR__ . '/../../model/utilisateur.php';
require_once __DIR__ . '/../../model/ParentModel.php';
require_once __DIR__ . '/../../model/AnimateurModel.php';
require_once __DIR__ . '/../../model/EnfantModel.php';
$utilisateurModel = new utilisateur($bdd);
$utilisateur = $utilisateurModel->trouverParId((int) $_SESSION['user_id']);
if (!$utilisateur) { session_destroy(); header('Location: index.php?page=connexion'); exit; }
$flash = $_SESSION['flash'] ?? null; unset($_SESSION['flash']);
?>
<section class="max-w-6xl mx-auto">
  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <div>
        <p class="text-indigo-600 font-semibold text-sm uppercase tracking-wider">Espace <?= htmlspecialchars($utilisateur['role']) ?>
        </p>
        <h1 class="text-3xl font-bold text-slate-900">
          Bonjour, <?= htmlspecialchars($utilisateur['prenom']) ?>
        </h1>
    </div>
    <div class="bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-600">
      <?= htmlspecialchars($utilisateur['email']) ?>
    </div>
  </div>
  <?php if ($flash): ?>
    <div class="mb-6 rounded-xl p-4 <?= $flash['type'] === 'error' ? 'bg-red-50 text-red-700 border border-red-200' : 'bg-emerald-50 text-emerald-700 border border-emerald-200' ?>">
      <?= htmlspecialchars($flash['message']) ?>
    </div><?php endif; ?>
  <?php if ($utilisateur['role'] === 'parent'): $enfants = (new ParentModel($bdd))->enfantsDuParent((int) $utilisateur['id']); ?>
    <div class="grid lg:grid-cols-5 gap-8">
      <div class="lg:col-span-3"><h2 class="text-xl font-bold mb-4">Mes enfants</h2>
      <?php if (!$enfants): ?>
        <div class="bg-white rounded-2xl border border-dashed border-slate-300 p-8 text-center text-slate-500">
          Aucun enfant inscrit pour le moment.
        </div>
        <?php else: ?>
          <div class="space-y-4">
            <?php foreach ($enfants as $enfant): ?>
              <article class="bg-white rounded-2xl border border-slate-200 p-5">
                <div class="flex justify-between gap-4">
                  <div>
                    <h3 class="font-bold text-lg"><?= htmlspecialchars($enfant['prenom'] . ' ' . $enfant['nom']) ?>
                  </h3>
                  <p class="text-sm text-slate-500">Né(e) le <?= date('d/m/Y', strtotime($enfant['date_naissance'])) ?>
                </p>
              </div>
              <span class="text-xs font-semibold px-3 py-1 rounded-full h-fit <?= $enfant['animateur'] ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' ?>">
                <?= $enfant['animateur'] ? 'Affecté' : 'En attente' ?>
              </span>
            </div>
            <div class="mt-4 text-sm text-slate-600 grid sm:grid-cols-2 gap-2">
              <span>Début : <?= date('d/m/Y', strtotime($enfant['date_debut'])) ?>
            </span>
            <span>Animateur : <?= htmlspecialchars($enfant['animateur'] ?: 'À définir') ?>
          </span>
          <?php if ($enfant['pai']): ?>
            <span class="sm:col-span-2 text-rose-600">PAI : <?= htmlspecialchars($enfant['detail_pai'] ?: 'Oui') ?>
          </span>
          <?php endif; ?>
        </div>
      </article>
      <?php endforeach; ?>
    </div><?php endif; ?>
  </div>
    <form action="controller/parentController.php" method="POST" class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 p-6 h-fit space-y-4">
      <h2 class="text-xl font-bold">Inscrire un enfant</h2>
      <input type="hidden" name="action" value="ajouter_enfant">
      <input required name="prenom" placeholder="Prénom *" class="w-full rounded-lg border-slate-300">
      <input required name="nom" placeholder="Nom *" class="w-full rounded-lg border-slate-300">
      <label class="block text-sm text-slate-600">Date de naissance
        <input required type="date" name="date_naissance" class="mt-1 w-full rounded-lg border-slate-300">
      </label>
      <label class="block text-sm text-slate-600">Date de début souhaitée
        <input required type="date" name="date_debut" class="mt-1 w-full rounded-lg border-slate-300">
      </label>
      <label class="flex gap-2 text-sm items-center">
        <input type="checkbox" name="pai" value="1"> Projet d’accueil individualisé (PAI)
      </label>
      <textarea name="detail_pai" placeholder="Précisions PAI (facultatif)" class="w-full rounded-lg border-slate-300"></textarea>
      <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-lg">Envoyer l’inscription</button>
    </form>
  </div>
  <?php elseif ($utilisateur['role'] === 'animateur'): $enfants = (new AnimateurModel($bdd))->enfantsDeAnimateur((int) $utilisateur['id']); ?>
    <h2 class="text-xl font-bold mb-4">Mes enfants accueillis <span class="text-slate-400 font-normal text-base">(<?= count($enfants) ?>)</span>
  </h2><div class="grid md:grid-cols-2 xl:grid-cols-3 gap-5"><?php foreach ($enfants as $enfant): ?>
    <article class="bg-white rounded-2xl border border-slate-200 p-6"><div class="text-3xl mb-3">
    </div>
    <h3 class="font-bold text-lg">
      <?= htmlspecialchars($enfant['prenom'] . ' ' . $enfant['nom']) ?>
    </h3>
    <p class="text-sm text-slate-500 mt-1">Parent : <?= htmlspecialchars($enfant['parent']) ?>
  </p>
  <p class="text-sm text-slate-500">Tél. <?= htmlspecialchars($enfant['telephone_parent']) ?>
</p><?php if ($enfant['pai']): ?><p class="mt-4 text-sm bg-rose-50 text-rose-700 p-3 rounded-lg">
  <strong>PAI :</strong> <?= htmlspecialchars($enfant['detail_pai'] ?: 'À consulter') ?>
</p>
<?php endif; ?>
</article>
<?php endforeach; ?>
<?php if (!$enfants): ?>
  <p class="col-span-full text-slate-500 bg-white border border-dashed rounded-2xl p-8 text-center">Aucun enfant ne vous est encore affecté.</p>
  <?php endif; ?>
    </div>
  <?php elseif ($utilisateur['role'] === 'admin'): $enfants = (new EnfantModel($bdd))->listePourAdministration(); $animateurs = (new AnimateurModel($bdd))->disponibles(); ?>
    <div class="flex items-center justify-between mb-4">
      <h2 class="text-xl font-bold">Affectation des enfants</h2>
      <span class="text-sm text-slate-500">
        <?= count($animateurs) ?> animateur(s) disponible(s)</span>
    </div>
    <div class="overflow-x-auto bg-white border border-slate-200 rounded-2xl">
      <table class="w-full text-left">
        <thead class="bg-slate-50 text-sm text-slate-600">
          <tr>
            <th class="p-4">Enfant</th>
            <th class="p-4">Parent</th>
            <th class="p-4">Animateur actuel</th>
            <th class="p-4">Affecter</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($enfants as $enfant): ?>
            <tr class="border-t">
              <td class="p-4 font-semibold">
                <?= htmlspecialchars($enfant['prenom'] . ' ' . $enfant['nom']) ?>
              </td>
              <td class="p-4 text-slate-600">
                <?= htmlspecialchars($enfant['parent']) ?>
              </td>
              <td class="p-4"><?= htmlspecialchars($enfant['animateur'] ?: 'Non affecté') ?>
            </td>
            <td class="p-4">
              <form action="controller/enfantController.php" method="POST" class="flex gap-2">
                <input type="hidden" name="action" value="affecter_enfant">
                <input type="hidden" name="enfant_id" value="<?= (int) $enfant['id'] ?>">
                <select required name="animateur_id" class="rounded-lg border-slate-300 text-sm">
                  <option value="">Choisir…</option><?php foreach ($animateurs as $animateur): ?>
                    <option value="<?= (int) $animateur['id'] ?>">
                      <?= htmlspecialchars($animateur['nom']) ?> (<?= $animateur['enfants_affectes'] ?>/<?= $animateur['capacite'] ?>)
                    </option>
                      <?php endforeach; ?>
                    </select>
                    <button class="bg-indigo-600 text-white text-sm px-3 rounded-lg">Valider</button>
                  </form>
                </td>
              </tr>
              <?php endforeach; ?>
              <?php if (!$enfants): ?>
                <tr>
                  <td colspan="4" class="p-8 text-center text-slate-500">Aucun enfant inscrit.</td>
                </tr><?php endif; ?></tbody>
              </table>
            </div>
  <?php else: ?>
    <div class="bg-white p-6 rounded-2xl border border-red-200 text-red-700">Votre rôle n’est pas reconnu. Contactez l’administration.</div>
    <?php endif; ?>
</section>
