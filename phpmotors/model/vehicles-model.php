<?php
//Vehicles PHP Motors Model
function newClassification($carclassification){
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // The SQL statement
    $sql = 'INSERT INTO carclassification (classificationName)
            VALUES (:carclassification)';
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':carclassification', $carclassification, PDO::PARAM_STR);

    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}