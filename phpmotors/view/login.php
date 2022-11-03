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
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/header.php' ?>
        <nav id="nav-bar">
            <?php echo $navList; ?>
        </nav>
    </header>
    <main id="loginPage">
        <h1 id="signInTitle">
            Sign in
        </h1>
        <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
               }
        ?>
        <form action="/phpmotors/accounts/index.php" method="post">
            <label for="userEmail">Email</label>
            <input name="userEmail" id="userEmail" type="email" required <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?>>
            <label for="userPassword">Password</label>
            <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
            <input name="userPassword" id="userPassword" type="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
            <input id="submitLogin" type="submit" value="Sign-in">
            <input type="hidden" name="action" value="Login">
        </form>
        <a id="goToRegister" href="/phpmotors/accounts/index.php?action=registration">Not a member yet?</a>
    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php' ?>
    </footer>
</body>
</html>