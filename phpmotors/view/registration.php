<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Login</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/header-small.css">
    <link rel="stylesheet" href="../css/body-format.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/registration.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/header.php' ?>
        <nav id="nav-bar">
            <?php echo $navList; ?>
        </nav>
    </header>
    <main id="registrationPage">
        <h1>
            Register
        </h1>
        <?php
            if (isset($message)) {
                echo $message;
            }
        ?>
        <form action="/phpmotors/accounts/index.php" method="post">
            <label for="userName">Name</label>
            <input name="userName" id="userName" type="text" required <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?>>
            <label for="userLastName">Last Name</label>
            <input name="userLastName" id="userLastName" type="text" required <?php if(isset($clientLastname)){echo "value='$clientLastname'";}  ?>>
            <label for="userEmail">Email</label>
            <input name="userEmail" id="userEmail" type="email" required <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?>>
            <label for="userPassword">Password</label>
            <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
            <input name="userPassword" id="userPassword" type="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
            <button id="showPassword">Show password</button>
            <input name="submit" id="registerButton" type="submit" value="register">
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="register">
        </form>
    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php' ?>
    </footer>
</body>
</html>