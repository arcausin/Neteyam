<?php $title = "Mentions légales - " . ucfirst($host); ?>

<?php $description = "Mentions légales du site " . ucfirst($host); ?>

<?php $image = $urlNative . "/public/img/logo.png"; ?>

<?php ob_start(); ?>
<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > Mentions légales</p>

    <h1 class="mb-3">Mentions légales</h1>

    <div class="row">
        <div class="col-12">
            <h2 class="mb-3">Editeur</h2>
            <p class="mb-3">Le site <?= ucfirst($host); ?> est édité par <a class="text-white animate-opacity" href="https://www.linkedin.com/in/alexisdambrosio/" target="_blank">Alexis D'Ambrosio</a></p>

            <h2 class="mb-3">Hébergeur</h2>
            <p class="mb-3">Le site est hébergé par <a class="text-white animate-opacity" href="https://www.o2switch.fr/" target="_blank">o2switch</a>, 222-224 Boulevard Gustave Flaubert, 63000 Clermont-Ferrand, France.</p>

            <h2 class="mb-3">Liens vers d'autres sites</h2>
            <p class="mb-3">Le site <?= ucfirst($host); ?> peut inclure des liens vers d'autres sites Internet. Nous ne sommes pas responsables du contenu de ces sites tiers ni de la protection et de la confidentialité des informations que vous pouvez leur fournir. Nous vous encourageons à prendre connaissance des politiques de confidentialité de ces sites avant de leur fournir des informations personnelles.</p>

            <h2 class="mb-3">Responsabilité vis-à-vis de sites tiers</h2>
            <p class="mb-3">Les liens vers d'autres sites ne sont fournis qu'à titre de commodité et ne signifient pas que nous approuvons les informations qu'ils contiennent. Nous ne sommes pas responsables du contenu de ces sites et n'assumons aucune responsabilité pour les dommages ou les pertes résultant de l'utilisation de ces informations ou de ces sites.</p>

            <p class="mb-3">Remarque : Il est important de toujours vérifier les politiques de confidentialité et les mentions légales des sites tiers avant de les utiliser ou de leur fournir des informations personnelles.</p>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/layout.php'); ?>