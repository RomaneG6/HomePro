<?php

function selectAllUsersSaufConnect($pdo){
    try{
        $query = "Select * from users WHERE NOT userId = :userId;";
        $selectAllUsers = $pdo->prepare($query);
        $selectAllUsers ->execute([
            'userId' => $_SESSION['user']->userId
        ]);
        $users = $selectAllUsers -> fetchAll();
        return $users;
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}
function selectAllGrpTchats($pdo, $tchatType){
    try{
        $query = "Select * from tchats where tchatType = :tchatType";
        $selectAllTchats = $pdo->prepare($query);
        $selectAllTchats ->execute([
            'tchatType'=> $tchatType
        ]);
        $tchats = $selectAllTchats -> fetchAll();
        return $tchats;
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}
function addTchat($pdo, $tchatType){

    try{
        $query = "Insert into tchats (tchatType) values (:tchatType)";
        $addTchat = $pdo->prepare($query);
        $addTchat->execute([
            'tchatType' => $tchatType
        ]);
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}

function addUsersTchat($pdo, $tchatId, $userId){
    try{
        $query = "Insert into users_tchats (tchatId, userId) values (:tchatId, :userId)";
        $addTchat = $pdo->prepare($query);
        $addTchat->execute([
            'tchatId' => $tchatId,
            'userId' => $userId
        ]);
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}
function verifTchat($pdo, $userId){
    try{
        $query = " SELECT * FROM users_tchats natural join tchats where userId = :userIdConnected and tchatId in (SELECT tchatId FROM users_tchats where userId = :userId) and tchatType = 'binaire'";
        $selectAllUsers = $pdo->prepare($query);
        $selectAllUsers ->execute([
            'userIdConnected' => $_SESSION['user']->userId,
            'userId' => $userId
        ]);
        $tchat = $selectAllUsers -> fetch();
        return $tchat;
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}