<div class="corps">
    <?php if(isset($_SESSION['user'])) :?>
        <div class="row-a">
            <a class="linAd" href="/createArt">Add some arts</a>
            <a class="linAd" href="/createOption">Add some options</a>
            <a class="linAd" href="/createType">Add some types</a>
        </div>
        <h2 class="creations">My Creations :</h2>
        <?php else : ?>
            <h2 class="creations">Welcome !</h2>
        <?php endif ?>
    <div class="lart">
        <?php foreach ($arts as $art) : ?>
            <button name="selectArt"  class="art" value="Select">
                <div>
                    <img src="<?= $art-> artImg ?>" alt="imgArt">
                    <div class="info">
                        <h3><span><a class="linTitre" href="/voirArt?artId=<?= $art-> artId?>"><?= $art->artNom ?></a></span></h3>
                        <h3><span><?= $art-> artPrix?>€</span></h3>
                    </div>
                </div>
            </button>
        <?php endforeach ?>
    </div>
</div>