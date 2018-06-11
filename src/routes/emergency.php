<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//Add costumers

$app->post('/emergency', function (Request $request, Response $response) {
    
    //Fetching data
    $ownerName      = $request->getParam('ownerName');
    $ownerAddress   = $request->getParam('ownerAddress');
    $mobNo          = $request->getParam('mobNo');
    $carNo          = $request->getParam('carNo');
    $carModel       = $request->getParam('carModel');
    $carColor       = $request->getParam('carColor');
    $locLattitude   = $request->getParam('locLattitude');
    $locLongitude   = $request->getParam('locLongitude');
    $emergencyType  = $request->getParam('emergencyType');
    $timeDate       = $request->getParam('timeDate');

    //Put the remaining functions over here...........
    $rescueCenterId = $request->getParam('rescueCenterId');
    
    $sql = "INSERT INTO EmergencyLog (ownerName, ownerAddress, mobNo,
                                      carNo, carModel, carColor,
                                      locLattitude, locLongitude, emergencyType,
                                      timeDate, rescueCenterId) 
                        
                        VALUES (:ownerName, :ownerAddress, :mobNo, 
                                :carNo, :carModel, :carColor, 
                                :locLattitude, :locLongitude, :emergencyType, 
                                :timeDate, :rescueCenterId)";

    try{
        //Get DB Object........
        $db = new db();
        
        //Connect............
        $db = $db->connect();

        //Prepared statement.......
        $stmt = $db->prepare($sql);
        
        //Binding values............
        $stmt->bindParam(':ownerName', $ownerName);
        $stmt->bindParam(':ownerAddress', $ownerAddress);
        $stmt->bindParam(':mobNo', $mobNo);
        $stmt->bindParam(':carNo', $carNo);
        $stmt->bindParam(':carModel', $carModel);
        $stmt->bindParam(':carColor', $carColor);
        $stmt->bindParam(':locLattitude', $locLattitude);
        $stmt->bindParam(':locLongitude', $locLongitude);
        $stmt->bindParam(':emergencyType', $emergencyType);
        $stmt->bindParam(':timeDate', $timeDate);
        $stmt->bindParam(':rescueCenterId', $rescueCenterId);
        $stmt->execute();

        echo '{"notice": {"text" : "Request sent!"}';

    } catch(PDOException $e){
        echo '{"error": {"text":'.$e->getMessage().'}';
    }

});