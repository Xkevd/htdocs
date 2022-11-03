<img id="logo" src="/phpmotors/images/site/logo.png" alt="PHP Motors Logo">
<?php if(isset($cookieFirstname)){
 echo "<span id='welcome-message'>Welcome $cookieFirstname</span>";
} ?>
<a href='/phpmotors/accounts/index.php?action=login' id="myAccount">My account</a>
