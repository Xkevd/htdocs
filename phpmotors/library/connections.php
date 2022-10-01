<?php

function phpmotorsConnect(){
 $server = 'localhost';
 $dbname= 'phpmotor';
 $username = 'iClient';
 $password = 'zivjhCxPNlYX_NyL'; 
 $dsn = "mysql:host=$server;dbname=$dbname";
 $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

 // Create the actual connection object and assign it to a variable
 try {
  $link = new PDO($dsn, $username, $password, $options);
  return $link;
 } catch(PDOException $e) {
  header('Location: 500.php');
  exit;
 }
}
phpmotorsConnect();
