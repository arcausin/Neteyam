<?php $title = "Modifier le jeu " . $game['title'] . " - Neteyam.com"; ?>

<?php ob_start(); ?>
<div class="row">
    <div class="col-12">
        <div class="mb-2">
            <a href="/administration/jeux">Retourner sur la liste des jeux</a>
        </div>

        <?php if (isset($gameUpdated)) : ?>
            <?php if ($gameUpdated == false && !empty($message)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Modification du jeu échoué !<br/>
                    Erreur</strong> : <?= $message; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
        <?php endif ?>

        <h1 class="h3 mb-2 text-gray-800">Modification du jeu <strong><?= $game['title']; ?></strong></h1>
    </div>

    <div class="col-12 col-lg-6">
        <form class="border p-4 mb-4" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="gameTitle">Titre du jeu</label>
                <input type="text" class="form-control" id="gameTitle" name="gameTitle" maxlength="255" value="<?php if (!empty($game['title'])) : ?><?= $game['title']; ?><?php endif ?>" required>
            </div>

            <div class="form-group">
                <label for="gameSlug">Slug</label>
                <input type="text" class="form-control" id="gameSlug" name="gameSlug" maxlength="255" value="<?php if (!empty($game['id_public'])) : ?><?= $game['id_public']; ?><?php endif ?>" required>
            </div>

            <div class="form-group">
                <label for="gameDescription">Description</label>
                <textarea class="form-control" id="gameDescription" name="gameDescription" rows="5" required><?php if (!empty($game['description'])) : ?><?= $game['description']; ?><?php endif ?></textarea>
            </div>

            <div class="form-group">
                <p class="mb-2">illustration du jeu</p>
                <img class="img-fluid rounded mb-2" src="/public/img/games/<?= $game['illustration']; ?>" width="50%">
                <div class="custom-file">
                    <input type="hidden" name="MAX_FILE_SIZE" value="25000000"/>
                    <input type="file" class="custom-file-input" id="gameIllustration" name="gameIllustration">
                    <label class="custom-file-label" for="gameIllustration"><?php if (!empty($game['illustration'])) : ?><?= $game['illustration']; ?><?php else: ?>Choisir un fichier<?php endif ?></label>
                </div>
            </div>

            <div class="form-group">
                <label for="gameReleaseDate">Date de sortie</label>
                <input type="date" class="form-control" id="gameReleaseDate" name="gameReleaseDate" value="<?php if (!empty($game['release_date'])) : ?><?= $game['release_date']; ?><?php endif ?>" required>
            </div>

            <button type="submit" class="btn btn-warning" name="updateGameSubmit">Modifier</button>
        </form>
    </div>
    
    <div class="col-12 col-lg-6">
        <form class="border p-4 mb-4" action="" method="post">
            <h2 class="h4 mb-3 text-gray-800">Développement</h2>

            <div class="form-group">
                <select class="custom-select" id="developerGame" name="developerGame" required>
                    <option selected value="0">Sélectionner une entreprise</option>
                    <?php if (!empty($developersGame)) {
                        foreach ($compagnies as $company) {
                            foreach ($developersGame as $developerGame) {
                                if (count($developersGame) != count($compagnies)) {
                                    if ($company['id'] != $developerGame['id']) { ?>
                                        <option value="<?= $company['id']; ?>"><?= $company['title']; ?></option> <?php
                                    }
                                }
                            }
                        }
                    } else {
                        foreach ($compagnies as $company) { ?>
                            <option value="<?= $company['id']; ?>"><?= $company['title']; ?></option> <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <?php
            if (!empty($developersGame)) { ?>
                <div class="mb-3">
                    <ul>
                    <?php foreach ($developersGame as $developerGame) { ?>
                        <li><?= $developerGame['title']; ?></li>
                    <?php } ?>
                    </ul>
                </div>
            <?php } ?>

            <button type="submit" class="btn btn-warning" name="updateDevelopersGameSubmit">Modifier</button>
        </form>

        <form class="border p-4 mb-4" action="" method="post">
            <h2 class="h4 mb-3 text-gray-800">Édition</h2>

            <div class="form-group">
                <select class="custom-select" id="publisherGame" name="publisherGame" required>
                    <option selected value="0">Sélectionner une entreprise</option>
                    <?php if (!empty($publishersGame)) {
                        foreach ($compagnies as $company) {
                            foreach ($publishersGame as $publisherGame) {
                                if (count($publishersGame) != count($compagnies)) {
                                    if ($company['id'] != $publisherGame['id']) { ?>
                                        <option value="<?= $company['id']; ?>"><?= $company['title']; ?></option> <?php
                                    }
                                }
                            }
                        }
                    } else {
                        foreach ($compagnies as $company) { ?>
                            <option value="<?= $company['id']; ?>"><?= $company['title']; ?></option> <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <?php
            if (!empty($publishersGame)) { ?>
                <div class="mb-3">
                    <ul>
                    <?php foreach ($publishersGame as $publisherGame) { ?>
                        <li><?= $publisherGame['title']; ?></li>
                    <?php } ?>
                    </ul>
                </div>
            <?php } ?>

            <button type="submit" class="btn btn-warning" name="updatePublishersGameSubmit">Modifier</button>
        </form>

        <form class="border p-4 mb-4" action="" method="post">
            <h2 class="h4 mb-3 text-gray-800">Consoles</h2>

            <div class="mb-3">
                <?php foreach ($consoles as $console) { ?>
                    <?php
                    if (countConsoleGame($game['id'], $console['id'])) {
                        $checked = true;
                    } else {
                        $checked = false;
                    }
                    ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="console<?= $console['id']; ?>" name="consolesGame[]" value="<?= $console['id']; ?>" <?php if ($checked) : ?><?= "checked"; ?><?php endif ?>>
                        <label class="form-check-label" for="console<?= $console['id']; ?>"><?= $console['name']; ?></label>
                    </div>
                <?php } ?>
            </div>

            <input type="hidden" id="unchecked_consoles" name="unchecked_consoles[]">

            <button type="submit" class="btn btn-warning" name="updateConsolesGameSubmit">Modifier</button>
        </form>

        <form class="border p-4 mb-4" action="" method="post">
            <h2 class="h4 mb-3 text-gray-800">Genres</h2>

            <div class="mb-3">
                <?php foreach ($genres as $genre) { ?>
                    <?php
                    if (countGenreGame($game['id'], $genre['id'])) {
                        $checked = true;
                    } else {
                        $checked = false;
                    }
                    ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="genre<?= $genre['id']; ?>" name="genresGame[]" value="<?= $genre['id']; ?>" <?php if ($checked) : ?><?= "checked"; ?><?php endif ?>>
                        <label class="form-check-label" for="genre<?= $genre['id']; ?>"><?= $genre['name']; ?></label>
                    </div>
                <?php } ?>
            </div>

            <input type="hidden" id="unchecked_genres" name="unchecked_genres[]">

            <button type="submit" class="btn btn-warning" name="updateGenresGameSubmit">Modifier</button>
        </form>

        <form class="border p-4 mb-4" action="" method="post">
            <h2 class="h4 mb-3 text-gray-800">Thèmes</h2>

            <div class="mb-3">
                <?php foreach ($themes as $theme) { ?>
                    <?php
                    if (countThemeGame($game['id'], $theme['id'])) {
                        $checked = true;
                    } else {
                        $checked = false;
                    }
                    ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="theme<?= $theme['id']; ?>" name="themesGame[]" value="<?= $theme['id']; ?>" <?php if ($checked) : ?><?= "checked"; ?><?php endif ?>>
                        <label class="form-check-label" for="theme<?= $theme['id']; ?>"><?= $theme['name']; ?></label>
                    </div>
                <?php } ?>
            </div>

            <input type="hidden" id="unchecked_themes" name="unchecked_themes[]">

            <button type="submit" class="btn btn-warning" name="updateThemesGameSubmit">Modifier</button>
        </form>
    </div>
</div>
<script>
    document.querySelector('.custom-file-input').addEventListener('change',function(e){
        var fileName = document.getElementById("gameIllustration").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    })
</script>

<script>
    function slugifyJS(text, divider = '-') {
        // replace non letter or digits by divider
        text = text.replace(/[^\w\d]+/g, divider);

        // remove unwanted characters
        text = text.replace(/[^-\w]+/g, '');

        // trim
        text = text.trim(divider);

        // remove duplicate divider
        text = text.replace(/--+/g, divider);

        // lowercase
        text = text.toLowerCase();

        if (!text) {
            return makeIdPublicJS();
        }

        return text;
    }

    function makeIdPublicJS() {
        const crypto = window.crypto || window.msCrypto;
        const array = new Uint8Array(16);
        crypto.getRandomValues(array);
        const idPublic = Array.from(array, dec => ('0' + dec.toString(16)).slice(-2)).join('');

        return idPublic;
    }

  const titleInput = document.querySelector('#gameTitle');
  const slugInput = document.querySelector('#gameSlug');

  titleInput.addEventListener('input', function() {
    slugInput.value = slugifyJS(titleInput.value);
  });
</script>

<script>
    var checkboxesConsoles = document.querySelectorAll('input[name="consolesGame[]"]');
    var uncheckedConsoles = document.getElementById('unchecked_consoles');
    for (var i = 0; i < checkboxesConsoles.length; i++) {
        checkboxesConsoles[i].addEventListener('change', function(e) {
            if(!e.target.checked) {
                uncheckedConsoles.value += e.target.value + ',';
            } else {
                var newValue = uncheckedConsoles.value.replace(e.target.value + ',','');
                uncheckedConsoles.value = newValue;
            }
        });
    }
</script>

<script>
    var checkboxesGenres = document.querySelectorAll('input[name="genresGame[]"]');
    var uncheckedGenres = document.getElementById('unchecked_genres');
    for (var i = 0; i < checkboxesGenres.length; i++) {
        checkboxesGenres[i].addEventListener('change', function(e) {
            if(!e.target.checked) {
                uncheckedGenres.value += e.target.value + ',';
            } else {
                var newValue = uncheckedGenres.value.replace(e.target.value + ',','');
                uncheckedGenres.value = newValue;
            }
        });
    }
</script>

<script>
    var checkboxesThemes = document.querySelectorAll('input[name="themesGame[]"]');
    var uncheckedThemes = document.getElementById('unchecked_themes');
    for (var i = 0; i < checkboxesThemes.length; i++) {
        checkboxesThemes[i].addEventListener('change', function(e) {
            if(!e.target.checked) {
                uncheckedThemes.value += e.target.value + ',';
            } else {
                var newValue = uncheckedThemes.value.replace(e.target.value + ',','');
                uncheckedThemes.value = newValue;
            }
        });
    }
</script>
<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/views/layout.php'); ?>