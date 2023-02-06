<?php $title = "Entreprises - " . ucfirst($host); ?>

<?php $description = "Retrouvez toutes les entreprises référencées sur " . ucfirst($host); ?>

<?php $image = $urlNative . "/public/img/logo.png"; ?>

<?php ob_start(); ?>
<script>
function showCompagniesSearch(str) {
    if (str.length == 0 || str.trim() == "") {
        document.getElementById("allCompagnies").style.display = "flex";
        document.getElementById("compagniesSearch").innerHTML = "";
        return;
    } else {
        document.getElementById("allCompagnies").style.display = "none";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("compagniesSearch").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "/entreprises/rechercher/" + str, true);
        xmlhttp.send();
    }
}
</script>

<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > Entreprises</p>

    <div class="mb-3">
        <a href="/entreprises"><span class="badge text-bg-light py-2 fs-2 animate-opacity"><h1 class="rajdhani fs-2 mb-0 fw-bold">Entreprises</h1></span></a>
    </div>

    <div class="row mb-3">
        <div class="col-12 offset-lg-3 col-lg-6">
            <input class="form-control form-control-lg bg-dark text-white" type="text" placeholder="Barre de recherche" onkeyup="showCompagniesSearch(this.value)">
        </div>
    </div>

    <div id="compagniesSearch"></div>

    <div class="row g-4 align-items-center mb-3" id="allCompagnies">
        <?php
        foreach ($compagnies as $company) {
        ?>
        <div class="col-6 col-md-3 col-lg-2">
            <div class="shadow rounded p-3 bg-light">
                <a class="text-decoration-none text-white animate-opacity" href="/entreprises/<?= $company['id_public']; ?>">
                    <img class="img-fluid rounded" src="/public/img/compagnies/<?= $company['illustration']; ?>" alt="">
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