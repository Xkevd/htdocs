<?php
//Check if user is Level 3
if(($_SESSION['clientData']['clientLevel']!=3) || $_SESSION['loggedin']==false){
    header('Location: /phpmotors/');
    exit;
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($invInfo['invMake'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | PHP Motors</title>
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
    <h1><?php if(isset($invInfo['invMake'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?></h1>
        <p>Confirm Vehicle Deletion. The delete is permanent.</p>
        <form method="post" action="/phpmotors/vehicles/">
            <label for="invMake">Vehicle Make</label>
            <input type="text" readonly name="invMake" id="invMake" <?php
            if(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>>
            <label for="invModel">Vehicle Model</label>
            <input type="text" readonly name="invModel" id="invModel" <?php
            if(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>>
            <label for="invDescription">Vehicle Description</label>
            <input type="text" readonly id="invDescription" name="invDescription" required <?php if(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; } ?>>
            <input type="submit" name="submit" value="Delete Vehicle">
            <input type="hidden" name="action" value="deleteVehicle">
            <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){
            echo $invInfo['invId'];} ?>">
        </form>        
    </main>
    <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php' ?>
    </footer>
</body>
</html>