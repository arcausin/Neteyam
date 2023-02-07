<?php $title = "Politique de confidentialité - " . ucfirst($host); ?>

<?php $description = "Politique de confidentialité du site " . ucfirst($host); ?>

<?php $image = $urlNative . "/public/img/logo.png"; ?>

<?php ob_start(); ?>
<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > Politique de confidentialité</p>

    <h1 class="mb-3">Politique de confidentialité</h1>

    <div class="row">
        <div class="col-12">
            <h2 class="mb-3">Introduction</h2>
            <p class="mb-3">Nous prenons très au sérieux la protection de vos données personnelles et nous nous engageons à respecter les lois en vigueur en matière de protection des données. Cette politique de confidentialité décrit les types de données que nous collectons, les raisons pour lesquelles nous les collectons et comment nous les utilisons.</p>

            <h2>Collecte de données</h2>
            <p class="mb-3">Nous collectons des données à travers l'utilisation de Google Analytics pour suivre les performances de notre site et pour améliorer l'expérience utilisateur. Les données collectées incluent, mais sans s'y limiter, les informations de base sur les pages visitées, les durées de visite et les sources de trafic.</p>

            <h2 class="mb-3">Utilisation de vos données</h2>
            <p class="mb-3">Nous utilisons les données collectées uniquement à des fins d'analyse et d'optimisation de notre site. Nous ne vendons ni ne partageons vos données avec des tiers à des fins commerciales.</p>

            <h2 class="mb-3">Sécurité de vos données</h2>
            <p class="mb-3">Nous prenons les mesures de sécurité appropriées pour protéger vos données contre la perte, l'utilisation abusive, la modification ou la divulgation non autorisée.</p>

            <h2 class="mb-3">Vos droits</h2>
            <p class="mb-3">Vous avez le droit de demander une copie de vos données personnelles collectées par notre site et de demander la correction ou la suppression de ces données.</p>

            <h2 class="mb-3">Mises à jour de la politique de confidentialité</h2>
            <p class="mb-3">Nous pouvons mettre à jour notre politique de confidentialité de temps à autre. Nous vous encourageons à consulter régulièrement cette politique pour rester informé de la manière dont nous protégeons vos données.</p>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/layout.php'); ?>