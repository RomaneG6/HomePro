<?php 

function selectAllOptions($pdo){
    try{
        $query = "Select * from options";
        $selectAllOptions = $pdo->prepare($query);
        $selectAllOptions->execute();
        $options = $selectAllOptions -> fetchAll();
        return $options;
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}
function addOptionsArt($pdo, $artId, $optionId){
    try{
        $query = "Insert into arts_options (artId, optionId)  values (:artId, :optionId)";
        $createArt = $pdo->prepare($query);
        $createArt->execute([
            'artId' => $artid,
            'optionId' => $optionId
        ]);
    }catch(PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}