<div class="row g-4 align-items-center mb-3">
    <?php
    foreach ($compagniesSearch as $companySearch) {
    ?>
    <div class="col-6 col-md-3 col-lg-2">
        <div class="shadow rounded p-3" style="--bs-bg-opacity: 1; background-color: rgba(var(--bs-light-rgb),var(--bs-bg-opacity)) !important;">
            <a class="text-decoration-none text-white animate-opacity" href="/entreprises/<?= $companySearch['id_public']; ?>">
                <img class="img-fluid rounded" src="/public/img/compagnies/<?= $companySearch['illustration']; ?>" alt="">
            </a>
        </div>
    </div>
    <?php
    }
    ?>
</div>