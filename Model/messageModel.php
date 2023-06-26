<?php

function selectAllMessages($pdo, $tchatId){
    try{
        $query = "Select * from messages where tchatId = :tchatId";
        $selectAllMessages = $pdo->prepare($query);
        $selectAllMessages->execute([
            'tchatId'=> $tchatId
        ]);
        $messages = $selectAllMessages -> fetchAll();
        return $messages;
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}
function addMessage($pdo, $messageDate, $messageHeure){

    try{
        $query = "Insert into messages (messageText, messageDate, messageHeure) values (:messageText, :messageDate, :messageHeure)";
        $addUser = $pdo->prepare($query);
        $addUser->execute([
            'messageText' => $_POST['messageText'],
            'messageDate' => $messageDate,
            'messageHeure' => $messageHeure
        ]);
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}