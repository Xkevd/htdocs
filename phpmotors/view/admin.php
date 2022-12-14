<?php
if(!$_SESSION['loggedin']){
    header('Location: /phpmotors/');
}
$_SESSION['clientFullName'] = $_SESSION['clientData']['clientFirstname'];
$_SESSION['clientFullName'] .= " ";
$_SESSION['clientFullName'] .= $_SESSION['clientData']['clientLastname'];
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Admin</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/header-small.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/main-small.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/body-format.css" >
</head>
<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/header.php' ?>
        <nav id="nav-bar">
            <?php echo $navList; ?>
        </nav>
    </header>
    <main id="admin-client">
        <h1>
            <?php echo $_SESSION['clientData']['clientFirstname'];?>
        </h1>
        <div id="login-info">
            <h2>
                You are logged in.
            </h2>
            <ul>
                <li>First Name: <?php echo $_SESSION['clientData']['clientFirstname'];?></li>
                <li>Last Name: <?php echo $_SESSION['clientData']['clientLastname'];?></li>
                <li>Email: <?php echo $_SESSION['clientData']['clientEmail'];?></li>
            </ul>
        </div>
        <div id="user-admin">
            <h2>Account management</h2>
            <a href="/phpmotors/accounts/?action=upd">Update account information</a>
        </div>
        <?php
        if($_SESSION['clientData']['clientLevel']==3){
            echo '<div id="login-vehicle">
            <h2>
                Inventory Management
            </h2>
            <p>Use this link to manage the inventory.</p>
            <a href="/phpmotors/vehicles/">Vehicle Management</a>
        </div>';
        }
        ?>
    </main>
    <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php' ?>
    </footer>
</body>
</html>