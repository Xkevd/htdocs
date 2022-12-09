<?php

function searchDatabase($search){
    $db = phpmotorsConnect();
    $sql = "SELECT * FROM inventory WHERE (invMake LIKE '%$search%') OR (invModel LIKE '%$search%') OR (invDescription LIKE '%$search%') OR (invColor LIKE '%$search%')";
    $stmt = $db->prepare($sql);
    //$stmt->bindValue(':search', $search);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $result;
}
function searchDisplayElements($result){
    $ds = '<div id="elementsDiv" class="searchElement">';
    foreach($result as $element){
        $ds .= "<section class=searchedElementSection >";
        $ds .= "<a href='/phpmotors/vehicles/?action=open-vehicle&invId=$element[invId]'>";
        $ds .= "<h2>$element[invMake] $element[invModel]</h2>";
        $ds .= "<p>$element[invDescription]</p>";
        $ds .= "</a>";
        $ds .= "</section>";
    }
    $ds .='</div>';
    return $ds;
}
/* function displayElementsDiv($search){
    $div = "<div id='elementsDiv' class='searchElement' value='$search'></div>";
    return $div;
} */