<?php
//Search controller

// Create or access a Session
session_start();

require_once '../library/connections.php';
// Get the PHP Motors models
require_once '../model/main-model.php';
require_once '../model/vehicles-model.php';
require_once '../library/functions.php';
require_once '../model/uploads-model.php';
require_once '../model/search-model.php';

$classifications = getClassifications();
$classificationsAndIds = getIdAndClassification();

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
    case 'open-search':
        include '../view/search.php';
        break;
    case 'onSearch':
        $search = filter_input(INPUT_POST, 'to-search', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if(empty($search)){
            $message = '<p>Please type something.</p>';
            include '../view/search.php';
            exit; }
        $result = searchDatabase($search);
        if(empty($result)){
            $message = '<p>No results found, try again.</p>';
            include '../view/search.php';
            exit; 
        }
        $div = searchDisplayElements($result);
        include '../view/search.php';
        break;
    case 'getSearchElements':
        $search = filter_input(INPUT_POST, 'to-search', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        var_dump($search);
        $result = searchDatabase($search);
        echo json_encode($result);
        break;
    default:
        include '../view/search.php';
        break;
}