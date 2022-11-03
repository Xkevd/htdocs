<?php
$classificationsAndIds = getIdAndClassification();
//Create the clasifications list
$classificationList = '<select id="optionsList" name="optionsList" form="add-car-form" required>';
foreach ($classificationsAndIds as $car){
    $classificationList .= "<option id='$car[classificationName]Option' value='$car[classificationId]'";
    if(isset($classificationId)){
        if($car['classificationId'] === $classificationId){
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
    <title>Vehicle Managment</title>
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
    <main id="add-vehicle">
        <h1>
            Add Vehicle
        </h1>
        <?php
            if (isset($message)) {
                echo $message;
            }
        ?>
        <p>*Note all fields are required</p>
        
        <form action="/phpmotors/vehicles/index.php" method="post" id="add-car-form">
            <label for="optionsList">Choose car classification</label>
            <?php echo($classificationList) ?>
            <label for="invMake">Make</label>
            <input type="text" id="invMake" name="invMake" required <?php if(isset($invMake)){echo "value='$invMake'";}  ?>>
            <label for="invModel">Model</label>
            <input type="text" id="invModel" name="invModel" required <?php if(isset($invModel)){echo "value='$invModel'";}  ?>>
            <label for="invDescription">Description</label>
            <input type="text" id="invDescription" name="invDescription" required <?php if(isset($invModel)){echo "value='$invModel'";}  ?>>
            <label for="invImage">Image Path</label>
            <input type="text" id="invImage" name="invImage" required <?php if(isset($invImage)){echo "value='$invImage'";}  ?>>
            <label for="invThumbnail">Thumbnail Path</label>
            <input type="text" id="invThumbnail" name="invThumbnail" required <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";}  ?>>
            <label for="invPrice">Price</label>
            <input type="number" id="invPrice" name="invPrice" required <?php if(isset($invPrice)){echo "value='$invPrice'";}  ?>>
            <label for="invStock">Stock</label>
            <input type="number" id="invStock" name="invStock" required <?php if(isset($invStock)){echo "value='$invStock'";}  ?>>
            <label for="invColor">Color</label>
            <input type="text" id="invColor" name="invColor" required <?php if(isset($invColor)){echo "value='$invColor'";}  ?>>
            <input type="submit" id="send-vehicle" value="Add Vehicle">
            <input type="hidden" name="action" value="vehicle-added">
        </form>        
    </main>
    <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php' ?>
    </footer>
</body>
</html>