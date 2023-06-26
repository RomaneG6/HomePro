<form method="post" action="" class="formulaireCo">
<h1>Vos Messages</h1>
                                <!-- mettre un emty car sinon il y aurait une erreur car $messages n'existe pas encore dans le foreach-->
<?php if (empty($messages)) : ?>
    <h3>Vous n'avez pas de message avec cette personne</h3>
<?php else : ?>
    <?php foreach ($messages as $message) : ?>
        <div class="info">
            <h3><span><?= $message-> messageText ?></span></h3>
            <div class="flex-message">
                <p><span><?= $message-> messageDate?></span></p>
                <p><span><?= $message-> messageHeure?></span></p>
            </div>
        </div>
    <?php endforeach ?>
<?php endif ?>
    <h3>Envoyer un message :</h3>
    <div class="text-center">
        <div class="login">             
            <label for="message" class="message">
                <input type="text" placeholder="Votre message..." class="form" id="Message" name="message" required> 
                <?php if(isset($messError["message"])) :?><small><?= $messError["message"] ?></small><?php endif ?> 
            </label>
        </div>
        <div class="envoie">
            <button name="btnEnvoi" class="btnEnvoi" value="Envoyer">Send</button>
        </div>
    </div>
</div>