<img id="logo" src="/phpmotors/images/site/logo.png" alt="PHP Motors Logo">
<?php if(isset($cookieFirstname)){
 echo "<span id='welcome-message'>Welcome $cookieFirstname</span>";
} else{
    echo "<span id='welcome-message'>Welcome</span>";
}
$_SESSION['clientFirstName'] = $_SESSION['clientData']['clientFirstname'];
if(!$_SESSION['loggedin']){
    echo "<a href='/phpmotors/accounts/index.php?action=login' id='myAccount'>My account</a>";
}else{
    $myAccount = "<div id='myAccountDiv'>";
    $myAccount .= "<a href='/phpmotors/accounts/index.php?action=admin' id='myAccountName'>$_SESSION[clientFirstName]</a>";
    $myAccount .= "<p>|</p>";
    $myAccount .= "<a href='/phpmotors/accounts/index.php?action=Logout' id='logout'>Logout</a>";
    $myAccount .= "</div>";
    echo $myAccount;
}
?>


