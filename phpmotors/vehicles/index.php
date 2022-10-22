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


//Create the clasifications list
$classificationList = '<select >';
foreach ($classifications as $car){
    $classificationList .= "<option value='$car[classificationName]'>$car[classificationName]</option>";
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
    default:
        include '../view/vehicle-management.php';
    }