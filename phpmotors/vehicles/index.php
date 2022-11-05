<?php

//Vehicles controller
// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';

// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

// Get the Vehicles Model
require_once '../model/vehicles-model.php';

// Get the functions library
require_once '../library/functions.php';

$classifications = getClassifications();

//Navigation Bar
$navList = navBar($classifications);

//Control views
$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

// Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   }

switch ($action){
    case 'add-class':
        include '../view/add-class.php';
        break;
    case 'add-vehicle':
        include '../view/add-vehicle.php';
        break;
    case 'classification-added':
        $newClassification = filter_input(INPUT_POST, 'new-classification');
       
        if(empty($newClassification)){
            $message = '<p>Please add a classification name</p>';
            include '../view/add-class.php';
            exit;
        }
        $classOutCome = newClassification($newClassification);
        
        //Check the result
        if($classOutCome===1){
            header('Location: ../vehicles/index.php');
            exit;
        } else{
            $message = '<p>Sorry, something went wrong. Try again.</p>';
            exit;
        }
        break;
    case 'vehicle-added':
        $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invImage = "phpmotors/images/no-image.png";
        $invThumbnail = "phpmotors/images/no-image.png";
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT);
        $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
        $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $classificationId = filter_input(INPUT_POST, 'optionsList');
        //
        if(empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/add-vehicle.php';
            exit; 
        }
        //Check Results
        $addVehicleOutCome = newVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);
        if($addVehicleOutCome===1){
            $message = '<p>New car added!</p>';
            include '../view/add-vehicle.php';
            
            exit;
        } else{
            $message = '<p>Sorry, something went wrong. Try again.</p>';
            exit;
        }
        break;
    default:
        include '../view/vehicle-management.php';
    }