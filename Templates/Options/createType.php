<form method="post" action="" class="formulairePro">
    <div class="text-center">
        <h1>Add type :</h1>
        <div>             
            <label for="nom" class="nom">
                <input type="text" placeholder="Name" class="form" id="TypeNom" name="typeNom" required>  
                <?php if(isset($messError["typeNom"])) :?><small><?= $messError["typeNom"] ?></small><?php endif ?>
            </label>
        </div>
        <div class="envoie">
            <button name="btnEnvoi" class="btnEnvoi" value="Envoyer">Submit</button>
        </div>
</form>