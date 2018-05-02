<?php
    $username = "";
    $email = "";
    $password = "";
    $confirmPassword = "";

    //Retrieving the data
    if(isset($_POST['userName'])){
        $username = htmlspecialchars($_POST['userName']);
    }else {
        //TODO Make user type in an input.
    }
    
    if(isset($_POST['inputEmail'])){
        $email = htmlspecialchars($_POST['inputEmail']);
    }else {

    }

    if(isset($_POST['inputPassword'])){
        $password = htmlspecialchars($_POST['inputPassword']);
    }else {

    }

    if(isset($_POST['confirmPassword'])){
        $confirmPassword = htmlspecialchars($_POST['confirmPassword']);    
    }else {

    }

    //If the two passwords do not match. Return an error.
    if(strcmp($password,$confirmPassword)!= 0) {

    }
    
    //TODO The Following code from this line until the end must only run if there are no errors detected.
    //Load the library
    require 'vendor/autoload.php';

    //Creating Connection 
    $connection = new MongoDB\Client("mongodb://localhost:27017");

    //Connect to the flask2 db
    $db = $connection->flask2w;
    //Connect to the collection 'users' in 'flask2' db
    $collection = $db->users;

    //Prepare the data for insertion
    //data is of type associative array
    $newUser = array(
        "username" => $username,
        "email" => $email,
        "password" => $password
    );

    //Now insert document to collection
    $collection->InsertOne($newUser);

?>