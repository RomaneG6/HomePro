<?php if (isset($_SESSION['user'])) : ?>
    <form method="post" action="" class="formulairePro">
        <div class="text-center">
            <?php if (isset($_POST['btnInscr'])) : ?>
                <div>
                    <input type="text" class="forms" name= "image" value="<?= $_SESSION['user']-> userPP ?>" alt="imgProfil">
                </div> 
                <div>
                    <input type="text" class="forms" id="Prenom" name="prenom" value="<?= $_SESSION['user']-> userPrenom ?>">
                </div>
                <div>
                    <input type="text" class="forms" id="Nom" name="nom" value="<?= $_SESSION['user']-> userNom ?>"> 
                </div>
                <div>
                    <input type="email" class="forms" id="Email" name="email" <?php if(isset($_POST['btnInscr'])) : ?>disabled<?php endif ?> value="<?= $_SESSION['user']-> userEmail ?>"> 
                </div>
                <div>
                    <input type="text" class="forms" id="Ville" name="ville" value="<?= $_SESSION['user']-> userVille ?>">  
                </div>
                <div>
                    <input type="text" class="forms" id="Password" name="mp" value="<?= $_SESSION['user']-> userPassWord ?>">
                </div>
                <button name="btnModif" class="btn" value="Envoyer">Modifier</button>
            <?php else : ?>
                <div class="flexSup">
                    <div class="row">
                        <img class="image" src="<?= $_SESSION['user']->userPP ?>" alt="imgProfil"><!-- user => voir connectUser function -->
                        <div class="column">
                            <h3><?= $_SESSION['user']-> userLogin ?></h3>
                            <button name="btnInscr" class="btnInscr" value="Envoyer">Modify</button>
                        </div>
                    </div>
                        <a class="linDel" href="/deleteProfil">Delete</a>
                </div>
                <h3><?= $_SESSION['user']-> userPrenom ?></h3>
                <h3><?= $_SESSION['user']-> userNom ?></h3>
                <h3><?= $_SESSION['user']-> userEmail ?></h3>
                <h3><?= $_SESSION['user']-> userVille ?></h3>
                <h3><?= $_SESSION['user']-> userPassWord ?></h3>
                <h3><?= $_SESSION['user']-> userRole ?></h3>
                <button name="btnEnvoi" class="btn" value="Envoyer">Deconnexion</button>
            <?php endif ?>  
            </div>
        </div>
    </form>
<?php else : ?>
    <form method="post" action="" class="formulaireCo">
        <div class="text-center">
            <h1>Inscription :</h1>
            <div>             
                <label for="nom" class="nom">
                    <input type="text" placeholder="Name" class="form" id="Nom" aria-describedby="nomHelp" name="nom" autocomplete="off" required>  
                    <?php if(isset($messError["nom"])) :?><small><?= $messError["nom"] ?></small><?php endif ?>
                </label>
            </div>
            <div>             
                <label for="prenom" class="prenom">
                    <input type="text" placeholder="First Name" class="form" id="Prenom" aria-describedby="prenomHelp" name="prenom" autocomplete="off" required>  
                    <?php if(isset($messError["prenom"])) :?><small><?= $messError["prenom"] ?></small><?php endif ?>
                </label>
            </div>
            <div>             
                <label for="login" class="Login">
                    <input type="text" placeholder="Login" class="form" id="Login" aria-describedby="loginHelp" name="login" autocomplete="off" required>
                    <?php if(isset($messError["login"])) :?><small><?= $messError["login"] ?></small><?php endif ?>  
                </label>
            </div>
            <div>             
                <label for="email" class="email">
                    <input type="email" placeholder="Mail" class="form" id="Email" aria-describedby="emailHelp" name="email" autocomplete="off" required> 
                    <?php if(isset($messError["email"])) :?><small><?= $messError["email"] ?></small><?php endif ?> 
                </label>
            </div>
            <div>             
                <label for="ville" class="Ville">
                    <input type="text" placeholder="Town" class="form" id="Ville" aria-describedby="villeHelp" name="ville" autocomplete="off" required>  
                    <?php if(isset($messError["ville"])) :?><small><?= $messError["ville"] ?></small><?php endif ?>
                </label>
            </div>
            <div>
                <label for="mp" class="mp">
                    <input type="password" placeholder="Password" class="form" id="Password" name="mp" required>
                    <?php if(isset($messError["mp"])) :?><small><?= str_replace('_', ' ', $messError["mp"]) ?></small><?php endif ?>
                </label>
            </div>
            <div class="envoie">
                <button name="btnEnvoi" class="btnEnvoi" value="Envoyer">Submit</button>
                <a href="/connexion" class="btnInscr">Déjà inscrit ?</a>
            </div>
        </div>
    </form>
<?php endif ?>