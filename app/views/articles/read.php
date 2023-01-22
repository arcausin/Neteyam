<?php $title = $article['title'] . " - Neteyam.com"; ?>

<?php $description = printDescription(PrintContentsArticle($article['subtitle'])); ?>

<?php $image = $urlNative . "/public/img/articles/" . $article['illustration']; ?>

<?php ob_start(); ?>
<div class="row">
  <div class="col-12 col-lg-8 mt-3">
    <p class="mb-3"><a class="text-white animate-opacity" href="/">Acceuil</a> > <a class="text-white animate-opacity" href="<?= $categoryArticle['link']; ?>/"><?= $categoryArticle['name']; ?></a> > <?= $article['title']; ?></p>

    <div class="mb-3 d-flex justify-content-between align-items-center">
      <div>
        <!-- <p class="mb-0">Par <a class="text-white animate-opacity" href="/utilisateurs/<?= $author['id_public']; ?>"><?= $author['pseudonym']; ?></a></p> -->
        <p class="mb-0">Par <?= $author['pseudonym']; ?></p>
        <p class="mb-0">Publié le <?= creationDateLittleEndian($article['creation_date']); ?></p>
        <?php if ($article['update_date'] && creationDateLittleEndian($article['update_date']) != creationDateLittleEndian($article['creation_date'])) : ?>
          <p class="mb-0">Mis à jour le <?= creationDateLittleEndian($article['update_date']); ?></p>
        <?php endif ?>
      </div>
      <div class="d-flex justify-content-end align-items-center">
        <div>
          <p class="mb-0">PARTAGER</p>
        </div>
        <div>
          <span><a href="https://twitter.com/share?url=<?= $urlNative . $_SERVER['REQUEST_URI']; ?>&text=<?= $article['title']; ?>" target="_blank"><i class="bi bi-twitter fs-2 ms-2 text-white animate-opacity"></i></a></span>
          <span><a href="http://www.facebook.com/sharer.php?u=<?= $urlNative . $_SERVER['REQUEST_URI']; ?>&t=<?= $article['title']; ?>" target="_blank"><i class="bi bi-facebook fs-2 ms-2 text-white animate-opacity"></i></a></span>
        </div>
      </div>
    </div>

    <div class="mb-3">
      <a href="<?= $categoryArticle['link']; ?>"><span class="badge text-bg-<?= $categoryArticle['color']; ?> py-2 fs-6 mb-1 animate-opacity"><?= $categoryArticle['name']; ?></span></a>
      <?php
        foreach ($games as $game) {
        ?>
        <a href="/jeux/<?= $game['id_public']; ?>"><span class="badge text-bg-light py-2 fs-6 mb-1 animate-opacity"><?= $game['title']; ?></span></a>
        <?php
        }
      ?>
    </div>

    <h1 class="fs-2 mb-3"><?= $article['title']; ?></h1>

    <img class="img-fluid rounded mb-3" src="/public/img/articles/<?= $article['illustration']; ?>">

    <div class="fs-6 mb-3">
      <?= PrintContentsArticle($article['subtitle']); ?>
    </div>

    <hr>

    <div class="fs-6 mb-3">
      <?= PrintContentsArticle($article['contents']); ?>
    </div>

    <hr>

    <div class="mb-3">
      <a href="<?= $categoryArticle['link']; ?>"><span class="badge text-bg-<?= $categoryArticle['color']; ?> py-2 fs-6 mb-1 animate-opacity"><?= $categoryArticle['name']; ?></span></a>
      <?php
        foreach ($games as $game) {
        ?>
        <a href="/jeux/<?= $game['id_public']; ?>"><span class="badge text-bg-light py-2 fs-6 mb-1 animate-opacity"><?= $game['title']; ?></span></a>
        <?php
        }
      ?>
    </div>

    <div class="p-3 mb-3 shadow rounded">
      <div class="d-flex align-items-center">
        <img class="d-none d-md-inline-block img-fluid" width="100" src="/public/img/users/<?= $author['profile_picture']; ?>">
    
        <ul class="list-unstyled ms-0 ms-md-3 mb-0">
          <!-- <li><b><a class="text-white fs-4 animate-opacity" href="/utilisateurs/<?= $author['id_public']; ?>"><?= $author['pseudonym']; ?></a></b></li> -->
          <li><b class="text-white fs-4"><?= $author['pseudonym']; ?></b></li>
          <li class="fs-6"><?= $author['biography']; ?></li>
        </ul>
      </div>
      <!-- <div class="d-flex justify-content-end">
        <span><a href="#"><i class="bi bi-twitter fs-2 ms-2 text-white animate-opacity"></i></a></span>
      </div> -->
    </div>
  </div>
  
  <div class="col-12 col-lg-4 mt-3">
    <h2 class="fs-3 mb-3">À lire aussi</h2>

    <div class="row">
      <?php
      foreach ($lastArticles as $lastArticle) {
        $categoryLastArticle = getCategoryByArticle($lastArticle['id_public']);
        $authorLastArticle = getAuthorByArticle($lastArticle['id_public']);
        $gamesLastArticle = getGamesByArticle($lastArticle['id_public']);
      ?>
      <div class="col-12 col-md-6 col-lg-12 mb-3">
        <div class="shadow rounded">
          <a class="text-decoration-none text-white animate-opacity" href="<?= $categoryLastArticle['link']; ?>/<?= $lastArticle['id_public']; ?>">
            <img class="img-fluid rounded-top" src="/public/img/articles/<?= $lastArticle['illustration']; ?>">

            <div class="p-3">
              <div>
                <span class="badge text-bg-<?= $categoryLastArticle['color']; ?> py-2 fs-6 mb-1"><?= $categoryLastArticle['name']; ?></span>
                <?php
                  foreach ($gamesLastArticle as $gameLastArticle) {
                  ?>
                  <span class="badge text-bg-light py-2 fs-6 mb-1"><?= $gameLastArticle['title']; ?></span>
                  <?php
                  }
                ?>
              </div>
              <h3 class="fs-4 mb-0"><?= $lastArticle['title']; ?></h3>
            </div>
          </a>
        </div>
      </div>
      <?php
      }
      ?>
    </div>
  </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/app/views/layout.php'); ?>