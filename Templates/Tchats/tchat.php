<form method="post" action="" class="formulaireCo">
    <h1>Tchat :</h1>
    <button name="btnCreer" class="btnInscr" value="Envoyer">Créer un grp</button>
    <?php if(isset($_POST['btnCreer'])) : ?>
        <label for="user-select">users :</label>
        <select name="types" id="type-select" multiple required>
            <option value="">User</option>
            <?php foreach ($users as $user) : ?>
                <option value="<?= $user -> userId ?>"><?= $user -> userLogin ?></option>
            <?php endforeach ?>
        </select>
        <button name="btnEnvoie" class="btnInscr" value="Envoyer">Créer</button>
    <?php else : ?>
        <p>Parler à qui vous voulez !</p>

        <div>
            <?php foreach ($users as $user) : ?>
                <h3><a href="voirMessages?userId=<?= $user-> userId ?>"><?= $user-> userLogin ?></a></h3>
            <?php endforeach ?>
        </div>
        <p>groupe :</p>
        <div>
            <?php foreach ($tchats as $tchat) : ?>
                <h3><a href="voirMessages?tchatId=<?= $tchat-> tchatId ?>"><?= $tchat-> tchatType ?> - <?= $tchat-> tchatId ?></a></h3>
            <?php endforeach ?>
        </div>
    <?php endif ?>
</div>