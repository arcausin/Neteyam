<?php $title = "Tests - Neteyam.com"; ?>

<?php ob_start(); ?>
<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > Tests</p>

    <div class="mb-3">
        <a href="/tests"><span class="badge text-bg-success py-2 fs-2 animate-opacity">Tests</span></a>
    </div>

    <div class="row">
    <?php
        foreach ($reviews as $review) {
        ?>
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <div class="shadow rounded">
                <a class="text-decoration-none text-white animate-opacity" href="/tests/<?= $review['id_public']; ?>">
                    <img class="img-fluid rounded-top" src="/public/img/articles/<?= $review['illustration']; ?>" alt="">

                    <div class="p-2">
                        <h3 class="fs-6"><?= $review['title']; ?></h3>
                    </div>
                </a>
            </div>
        </div>
        <?php
        }
    ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/layout.php'); ?>