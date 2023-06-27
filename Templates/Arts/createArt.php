<form method="post" action="" class="formulairePro">
    <div class="text-center">
        <h1>Add something :</h1>
        <div>             
            <label for="nom" class="nom">
                <input class="form" type="text" placeholder="Name" id="ArtNom" name="artNom" required>  
                <?php if(isset($messError["artNom"])) :?><small><?= $messError["artNom"] ?></small><?php endif ?>
            </label>
        </div>
        <div>             
            <label for="login" class="Img">
                <input class="form" type="text" placeholder="Picture" id="Imag" name="img" required>
                <?php if(isset($messError["img"])) :?><small><?= $messError["img"] ?></small><?php endif ?>  
            </label>
        </div>
        <div>             
            <label for="prenom" class="prix">
                <input class="form" type="text" placeholder="Price" id="ArtPrix" name="artPrix" required>  
                <?php if(isset($messError["artPrix"])) :?><small><?= $messError["artPrix"] ?></small><?php endif ?>
            </label>
        </div>
        <label for="type-select">Choose a type :</label>
        <select name="types" id="type-select">
            <option value="">Type</option>
            <?php foreach ($types as $type) : ?>
            <option value="<?= $type -> typeId ?>"><?= $type -> typeNom ?></option>
            <?php endforeach ?>
        </select>*
        <label for="option-select">Choose an option (Maintenez ctrl pour choisir) :</label>
        <select name="options[]" id="option-select" multiple required>
            <option value="">Description</option>
            <?php foreach ($options as $option) : ?>
            <option value="<?= $option -> optionId ?>"><?= $option -> optionNom ?></option>
            <?php endforeach ?>
        </select>
        <div class="envoie">
            <button name="btnEnvoi" class="btnEnvoi" value="Envoyer">Submit</button>
        </div>
    </div>
</form>