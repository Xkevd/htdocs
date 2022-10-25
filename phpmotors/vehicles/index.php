<?php

//Vehicles controller

// Get the database connection file
require_once '../library/connections.php';

// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

// Get the Vehicles Model
require_once '../model/vehicles-model.php';


$classifications = getClassifications();

$navList = '<ul>';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
 $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

$classificationsAndIds = getIdAndClassification();
//Create the clasifications list
$classificationList = '<select id="optionsList" name="optionsList" form="add-car-form">';
foreach ($classificationsAndIds as $car){
    $classificationList .= "<option id='$car[classificationName]Option' value='$car[classificationId]'>$car[classificationName]</option>";
}
$classificationList .= '</select>';

//Control views
$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
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
        $invMake = filter_input(INPUT_POST, 'invMake');
        $invModel = filter_input(INPUT_POST, 'invModel');
        $invDescription = filter_input(INPUT_POST, 'invDescription');
        $invImage = "phpmotors/images/no-image.png";
        $invThumbnail = "phpmotors/images/no-image.png";
        $invPrice = filter_input(INPUT_POST, 'invPrice');
        $invStock = filter_input(INPUT_POST, 'invStock');
        $invColor = filter_input(INPUT_POST, 'invColor');
        $classificationId = filter_input(INPUT_POST, 'optionsList');
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