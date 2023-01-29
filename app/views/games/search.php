<div class="row g-4 mb-3">
    <?php
    foreach ($gamesSearch as $gameSearch) {
    ?>
    <div class="col-6 col-md-3 col-lg-2">
        <div class="shadow rounded">
            <a class="text-decoration-none text-white animate-opacity" href="/jeux/<?= $gameSearch['id_public']; ?>">
                <img class="img-fluid rounded" src="/public/img/games/<?= $gameSearch['illustration']; ?>" alt="">
            </a>
        </div>
    </div>
    <?php
    }
    ?>
</div>