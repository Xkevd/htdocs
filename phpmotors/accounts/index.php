<?php
//Accounts controller
// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';

// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

// Get the accounts model
require_once '../model/accounts-model.php';

// Get the functions library
require_once '../library/functions.php';

$classifications = getClassifications();

//var_dump($classifications);
//	exit;

$navList = navBar($classifications);

//echo $navList;
//exit;

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

// Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
  $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 }

switch ($action){
  case 'registration':
    include '../view/registration.php';
    break;
  case 'login':
    include '../view/login.php';
    break;
  case 'register':
    // Filter and store the data
    $clientFirstname = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $clientLastname = filter_input(INPUT_POST, 'userLastName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $clientEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
    $clientPassword = trim(filter_input(INPUT_POST, 'userPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);
    $existingEmail = checkExistingEmail($clientEmail);

    // Check for existing email address in the table
    if($existingEmail==1){
    $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
    include '../view/login.php';
    exit;
    }

    // Check for missing data
    if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '../view/registration.php';
      exit; 
  }

    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
    // Send the data to the model
    $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
    
    // Check and report the result
    if($regOutcome === 1){
      $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
      setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');      
      header('Location: /phpmotors/accounts/?action=login');
      exit;
    } else {
      $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
      include '../view/registration.php';
      exit;
    }

    break;
  case 'Login':
    $clientEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
    $clientPassword = trim(filter_input(INPUT_POST, 'userPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);
    if(empty($clientEmail) || empty($checkPassword)){
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '../view/login.php';
      exit;
    }
    // A valid password exists, proceed with the login process
    // Query the client data based on the email address
    $clientData = getClient($clientEmail);
    // Compare the password just submitted against
    // the hashed password for the matching client
    $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
    // If the hashes don't match create an error
    // and return to the login view
    if(!$hashCheck) {
      $message = '<p class="notice">Please check your password and try again.</p>';
      include '../view/login.php';
      exit;
    }
    // A valid user exists, log them in
    $_SESSION['loggedin'] = TRUE;
    // Remove the password from the array
    // the array_pop function removes the last
    // element from an array
    array_pop($clientData);
    // Store the array into the session
    $_SESSION['clientData'] = $clientData;
    $clientFirstname = $_SESSION['clientData']['clientFirstname'];
    setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');      
    // Send them to the admin view
    header('Location: /phpmotors/accounts/?action=admin');
    exit;
    break;
  case 'admin':
    include '../view/admin.php';
    break;
  case 'Logout':
    setcookie("firstname", "", time()-3600, '/');
    unset($_COOKIE['firstname']);
    session_unset();
    session_destroy();
    header('Location: /phpmotors/accounts/?action=login');
    break;
  default:
    include '../view/home.php';
  }


