<form method="post" action="" class="formulairePro">
    <div class="text-center">
        <h1>Add option :</h1>
        <div>             
            <label for="nom" class="nom">
                <input type="text" placeholder="Name" class="form" id="OptNom" name="optNom" required>  
                <?php if(isset($messError["optNom"])) :?><small><?= $messError["optNom"] ?></small><?php endif ?>
            </label>
        </div>
        <div class="envoie">
            <button name="btnEnvoi" class="btnEnvoi" value="Envoyer">Submit</button>
        </div>
</form>