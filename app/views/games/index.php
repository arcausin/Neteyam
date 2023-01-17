<?php $title = "Jeux - Neteyam.com"; ?>

<?php $description = "Retrouvez tous les jeux de Neteyam.com"; ?>

<?php $image = $urlNative . "/public/img/logo.png"; ?>

<?php ob_start(); ?>
<script>
function showGamesSearch(str) {
    if (str.length == 0) {
        document.getElementById("allGames").style.display = "flex";
        document.getElementById("gamesSearch").innerHTML = "";
        return;
    } else {
        document.getElementById("allGames").style.display = "none";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("gamesSearch").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "/jeux/rechercher/" + str, true);
        xmlhttp.send();
    }
}
</script>
<div class="mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > Jeux</p>

    <div class="mb-3">
        <a href="/jeux"><span class="badge text-bg-light py-2 fs-2 animate-opacity"><h1 class="rajdhani fs-2 mb-0 fw-bold">Jeux</h1></span></a>
    </div>

    <div class="row mb-3">
        <div class="col-12 offset-lg-3 col-lg-6">
            <input class="form-control form-control-lg bg-dark text-white" type="text" placeholder="Barre de recherche" onkeyup="showGamesSearch(this.value)">
        </div>
    </div>

    <div id="gamesSearch"></div>

    <div class="row" id="allGames">
        <?php
        foreach ($games as $game) {
        ?>
        <div class="col-6 col-md-3 col-lg-2 mb-3">
            <div class="shadow rounded">
                <a class="text-decoration-none text-white animate-opacity" href="/jeux/<?= $game['id_public']; ?>">
                    <img class="img-fluid rounded-top" src="/public/img/games/<?= $game['illustration']; ?>" alt="">

                    <div class="p-2">
                        <h3 class="fs-6 text-center shortcut-word"><?= $game['title']; ?></h3>
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