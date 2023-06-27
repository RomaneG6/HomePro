<form method="post" action="" class="formulairePro">
<h1>By <?= $art->userId ?></h1>
<div>
    <img class="divImg" src="<?= $art-> artImg ?>" alt="imgArt">
    <div class="info">
        <h3><span><?= $art-> artNom ?></span></h3>
        <h3><span><?= $art-> artPrix?>€</span></h3>
    </div>
</div>
</form>