<?php

function createUser($pdo){

    try{
        $query = "Insert into users (userPrenom, userNom, userLogin, userPP, userEmail, userVille, userPassWord, userRole) values (:userPrenom, :userNom, :userLogin, :userPP, :userEmail, :userVille, :userPassWord, :userRole)"; //nom des colonnes de user
        $addUser = $pdo->prepare($query);
        $addUser->execute([
            'userPrenom' => $_POST['prenom'],//name de l'input First Name
            'userNom' => $_POST['nom'],
            'userLogin' => $_POST['login'],
            'userPP' => 'img/ppAleat.png',
            'userEmail' => $_POST['email'],
            'userVille' => $_POST['ville'],
            'userPassWord' => $_POST["mp"],
            'userRole' => 'user'
        ]);
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}
function connectUser($pdo){

    try{
        $query = "Select * from users where userLogin = :userLogin and userPassWord = :userPassWord";
        $connect = $pdo->prepare($query);
        $connect->execute([
            'userLogin' => $_POST['login'],//name de l'input Login
            'userPassWord' => $_POST["mp"],
        ]);
        $user = $connect -> fetch();
        $_SESSION['user'] = $user;
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}

function updateUser($pdo){
    try{
        $query = "Update users set userPrenom = :userPrenom, userNom = :userNom, userPP = :userPP, userEmail = :userEmail, userVille = :userVille, userPassWord = :userPassWord where userId = :userId"; //nom des colonnes de user
        $updateUser = $pdo->prepare($query);
        $updateUser->execute([
            'userPrenom' => $_POST['prenom'],//name de l'input First Name
            'userNom' => $_POST['nom'],
            'userPP' => $_POST['image'],
            'userEmail' => $_POST['email'],
            'userVille' => $_POST['ville'],
            'userPassWord' => $_POST["mp"],
            'userId' => $_SESSION['user']-> userId // user => voir connectUser function
        ]);
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}
function updateSession($pdo){
    try{
        $query = "Select * from users where userId = :userId";
        $selectUser = $pdo->prepare($query);
        $selectUser->execute([
            'userId' => $_SESSION['user']-> userId//name de l'input Login
        ]);
        $user = $selectUser -> fetch();
        $_SESSION['user'] = $user;
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}
function deleteUser($pdo){
    try{
        $query = "Delete from users where userId = :userId";
        $addUser = $pdo->prepare($query);
        $addUser->execute([
            'userId' => $_SESSION['user']-> userId
        ]);
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}