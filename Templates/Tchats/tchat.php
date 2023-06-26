<h1>Tchat :</h1>

<p>Parler à qui vous voulez !</p>

<div>
    
    <?php foreach ($users as $user) : ?>
        <h3><a href="voirMessages?userId=<?= $user-> userId ?>"><?= $user-> userLogin ?></a></h3>
    <?php endforeach ?>
</div>