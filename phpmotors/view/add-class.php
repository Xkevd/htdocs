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
    <title>Vehicle Managment</title>
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
    <main id="add-classification-page">
        <h1>
            Add Car Classification
        </h1>
        <?php
            if (isset($message)) {
                echo $message;
            }
        ?>
        <form action="/phpmotors/vehicles/index.php" method="post">
            <label for="new-classification">Classification Name</label>
            <input type="text" name="new-classification" id="new-classification" required maxlength="30">
            <input type="submit" id="send-classification" value="Add Classification">
            <input type="hidden" name="action" value="classification-added">
        </form>
    </main>
    <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php' ?>
    </footer>
</body>
</html>