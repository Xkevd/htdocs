<?php
//Check if user is Level 3
if(($_SESSION['clientData']['clientLevel']!=3) || $_SESSION['loggedin']==false){
    header('Location: /phpmotors/');
    exit;
}

$classificationsAndIds = getIdAndClassification();
//Create the clasifications list
$classificationList = '<select id="optionsList" name="classificationId" form="mod-car-form" required>';
$classificationList .= "<option>Choose a Classification</option>";
foreach ($classificationsAndIds as $car){
    $classificationList .= "<option id='$car[classificationName]Option' value='$car[classificationId]'";
    if(isset($classificationId)){
        if($car['classificationId'] === $classificationId){
            $classificationList .= ' selected '; 
        }
    }
    elseif(isset($invInfo['classificationId'])){
        if($car['classificationId'] === $invInfo['classificationId']){
            $classificationList .= ' selected ';
        }
    }
    $classificationList .= ">$car[classificationName]</option>";
}
$classificationList .= '</select>';

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
    if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	    echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
	elseif(isset($invMake) && isset($invModel)) { 
		echo "Modify $invMake $invModel"; }?> | PHP Motors</title>
    <link rel="stylesheet" href="../css/body-format.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/header-small.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/main-small.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/header.php' ?>
        <nav id="nav-bar">
            <?php echo $navList; ?>
        </nav>
    </header>
    <main id="mod-vehicle">
    <h1><?php 
    if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	    echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
    elseif(isset($invMake) && isset($invModel)) { 
	    echo "Modify$invMake $invModel"; }?></h1>
        <?php
            if (isset($message)) {
                echo $message;
            }
        ?>
        <p>*Note all fields are required</p>
        
        <form action="/phpmotors/vehicles/index.php" method="post" id="mod-car-form">
            <label for="optionsList">Choose car classification</label>
            <?php echo($classificationList) ?>
            <label for="invMake">Make</label>
            <input type="text" id="invMake" name="invMake" required <?php if(isset($invMake)){echo "value='$invMake'";}elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'";}?>>
            <label for="invModel">Model</label>
            <input type="text" id="invModel" name="invModel" required <?php if(isset($invModel)){echo "value='$invModel'";}elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>>
            <label for="invDescription">Description</label>
            <input type="text" id="invDescription" name="invDescription" required <?php if(isset($invDescription)){echo "value='$invDescription'";}elseif(isset($invInfo['invDescription'])) {echo "value='$invInfo[invDescription]'"; }?>>
            <label for="invImage">Image Path</label>
            <input type="text" id="invImage" name="invImage" required <?php if(isset($invImage)){echo "value='$invImage'";}elseif(isset($invInfo['invImage'])) {echo "value='$invInfo[invImage]'"; } ?>>
            <label for="invThumbnail">Thumbnail Path</label>
            <input type="text" id="invThumbnail" name="invThumbnail" required <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";}elseif(isset($invInfo['invThumbnail'])) {echo "value='$invInfo[invThumbnail]'"; }  ?>>
            <label for="invPrice">Price</label>
            <input type="number" id="invPrice" name="invPrice" required <?php if(isset($invPrice)){echo "value='$invPrice'";}elseif(isset($invInfo['invPrice'])) {echo "value='$invInfo[invPrice]'"; }  ?>>
            <label for="invStock">Stock</label>
            <input type="number" id="invStock" name="invStock" required <?php if(isset($invStock)){echo "value='$invStock'";}elseif(isset($invInfo['invStock'])) {echo "value='$invInfo[invStock]'"; }  ?>>
            <label for="invColor">Color</label>
            <input type="text" id="invColor" name="invColor" required <?php if(isset($invColor)){echo "value='$invColor'";}elseif(isset($invInfo['invColor'])) {echo "value='$invInfo[invColor]'"; }  ?>>
            <input type="submit" id="send-vehicle" name="submit" value="Update Vehicle">
            <input type="hidden" name="action" value="updateVehicle">
            <input type="hidden" name="invId" value="
            <?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} 
            elseif(isset($invId)){ echo $invId; } ?>
            ">
        </form>        
    </main>
    <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php' ?>
    </footer>
</body>
</html>