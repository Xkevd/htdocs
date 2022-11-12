<?php
if(!$_SESSION['loggedin']){
    header('Location: /phpmotors/');
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/header-small.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/main-small.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/body-format.css">
</head>
<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/header.php' ?>
        <nav id="nav-bar">
            <?php echo $navList; ?>
        </nav>
    </header>
    <main id="client-update">
        <h1>
            Manage Account
        </h1>
        <h2>
            Update Account
        </h2>
        <?php
            if (isset($message)) {
                echo $message;
            }
        ?>
        <form action="/phpmotors/accounts/index.php" method="POST">
            <label for="clientFirstname">First Name</label>
            <input type="text" id="clientFirstname" name="clientFirstname" required <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}?>>
            <label for="clientLastname">Last Name</label>
            <input type="text" id="clientLastname" name="clientLastname" required <?php if(isset($clientLastname)){echo "value='$clientLastname'";}?>>
            <label for="clientEmail">Email</label>
            <input type="email" id="clientEmail" name="clientEmail" required <?php if(isset($clientEmail)){echo "value='$clientEmail'";}?>>
            <input type="submit" name="updData" value="Update Data">
            <input type="hidden" name="action" value="updData">
            <input type="hidden" name="clientId" value="
            <?php if(isset($_SESSION['clientData']['clientId'])){ echo $_SESSION['clientData']['clientId'];}?>
            ">
        </form>
        <h2>Change your password</h2>
        <?php
            if (isset($messagePass)) {
                echo $messagePass;
            }
        ?>
        <form action="/phpmotors/accounts/index.php" method="POST">
            <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
            <label for="newPassword">New Password</label>
            <input type="password" id="newPassword" name="newPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
            <input type="submit" name="updPass" value="Update Password">
            <input type="hidden" name="action" value="updPass">
            <input type="hidden" name="clientId" value="
            <?php if(isset($_SESSION['clientData']['clientId'])){ echo $_SESSION['clientData']['clientId'];}?>
            ">
        </form>
    </main>
    <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php' ?>
    </footer>
</body>
</html>