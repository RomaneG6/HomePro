<?php

    session_start();

    require_once "Config/connexionDB.php";

    /*$query ="Select * from users";
    $sth = $pdo->prepare($query); //$pdo car voir connexionDb.php
    $sth->execute();

    //Fetch all of the remaining rows in the result set 
    print("Fetch all of the remaining rows in the result set:\n");
    $result = $sth->fetchAll();
    echo "<pre>" . print_r($result) . "</pre>";*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="css/accueil.css">
    <link rel="stylesheet" href="css/profil.css">
    <title>Draw me</title>
</head>
<body>
            <!-- haut de page -->
    <header>
        <nav class=menu>
            <div class=logo>
                <img src="img/logo.png" alt="logoSite">
            </div>
            <ul>
                <li class=link><a href="/">Accueil</a></li>
                <?php if (isset($_SESSION['user'])) : ?>
                    <li class=link><a href="/profil"> My profile</a></li>
                <?php else : ?>
                    <li class=link><a href="/inscription">Inscription</a></li>
                    <li class=link><a href="/connexion">Connexion</a></li>
                <?php endif ?>
            </ul>
        </nav>
    </header>
            <!-- corps du site -->
    <main>
        <?php
            require_once "Controllers/artsController.php";
            require_once "Controllers/usersController.php";
        ?>
    </main>
            <!-- pied de page -->
    <footer>
            <div class="pied">
                <p>&copy 2023 Tous droits réservés. </p>
                <p>Livraison du produit acheté !!</p>
                <p>Rappelez-vous que Nous ne sommes en aucun cas associés ou autorisé par nos inspirations.</p>
                <p>Nous aimons tout simplement dessiner, sculpter ou encore peindre.</p>
                <p>Vous pouvez-nous rejoindre à tous moment pour partager votre contenu & bien sûr partager d'autres types d'arts.</p>
            </div>
            <img src="img/logo.png" alt="logoSite">
    </footer>
</body>
</html>