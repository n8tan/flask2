<?php
session_start();
require '../vendor/autoload.php'; //Load the library for Mongodb
/*
if($_POST['inputEmail'] != NULL){
  echo("email: " . $_POST['inputEmail'] . "<br />\n");
  echo("inputPassword: " . $_POST['inputPassword'] . "<br />\n");

}else{
  echo "It went here.";
}
*/

$user = "";
$pass = "";
$userPassFlag=False; //<-- This flag indicates if user or pass is empty.


if(isset($_POST['inputEmail'])){
  $user = htmlspecialchars($_POST['inputEmail']);
}else {
  $userPassFlag=True;
}

if(isset($_POST['inputPassword'])){
  $pass = htmlspecialchars($_POST['inputPassword']);
}else {
  $userPassFlag=True;
}

try {

  if(!$userPassFlag) { //If userPassFlag is False, it means input was not empty
    //Creating Connection 
    $connection = new MongoDB\Client("mongodb://localhost:27017");
  
    //Getting collection
    $db = $connection->flask2w;
    $collection = $db->users;
    $result = $collection->findOne(
      array(
        'email' => $user,
        'password' => $pass 
      )
    );
  
    if($result != NULL) {
      $_SESSION['user'] = $user;
      header("location: ../dashboard.php?msg=success");
      exit();
    }else {
      header("location: ../index.php?msg=invalid");
      exit();
    }
  
  }else {
    header("location: ../index.php?msg=invalid");
    exit();
  }


} catch (MongoConnectionException $e) {
  die('Error connecting to MongoDB server');
} catch (MongoException $e) {
  die('Error: ' . $e->getMessage());
}



 ?>
