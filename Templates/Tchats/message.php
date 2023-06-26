<form method="post" action="" class="formulaireCo">
<h1>Vos Messages</h1>
<?php foreach ($messages as $message) : ?>
    <div class="info">
        <h3><span><?= $message-> messageText ?></span></h3>
        <h3><span><?= $message-> messageDate?></span></h3>
        <h3><span><?= $message-> messageHeure?></span></h3>
    </div>
    <?php endforeach ?>
    <h3>Envoyer un message :</h3>
    <div class="text-center">
        <div class="login">             
            <label for="message" class="message">
                <input type="text" placeholder="Votre message.." class="form" id="Message" name="message" required> 
                <?php if(isset($messError["message"])) :?><small><?= $messError["message"] ?></small><?php endif ?> 
            </label>
        </div>
        <div class="envoie">
            <button name="btnEnvoi" class="btnEnvoi" value="Envoyer">Send</button>
        </div>
    </div>
</div>