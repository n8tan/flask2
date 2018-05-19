<?php
session_start();
    $username = "";
    $email = "";
    $password = "";
    $confirmPassword = "";

    $inputFlag=False; //<-- This flag indicates if input is empty.
    $mismatchFlag=False; //<-- This flag indicates if passwords are not matching.
    //Retrieving the data
    if(isset($_POST['userName'])){
        $username = htmlspecialchars($_POST['userName']);
    }else {
        $inputFlag=True;
    }
    
    if(isset($_POST['inputEmail'])){
        $email = htmlspecialchars($_POST['inputEmail']);
    }else {
        $inputFlag=True;
    }

    if(isset($_POST['inputPassword'])){
        $password = htmlspecialchars($_POST['inputPassword']);
    }else {
        $inputFlag=True;
    }

    if(isset($_POST['confirmPassword'])){
        $confirmPassword = htmlspecialchars($_POST['confirmPassword']);    
    }else {
        $inputFlag=True;
    }

    //If the two passwords do not match. Return an error.
    if(strcmp($password,$confirmPassword)!= 0) {
        $mismatchFlag=True;
    }
    
    //TODO The Following code from this line until the end must only run if there are no errors detected.
    try {
        if((!$inputFlag) && (!$mismatchFlag)) { //If input has no errors, proceed.
            //Load the library
            require 'vendor/autoload.php';
    
            //Creating Connection 
            $connection = new MongoDB\Client("mongodb://localhost:27017");
        
            //Connect to the flask2 db
            $db = $connection->flask2w;
            //Connect to the collection 'users' in 'flask2' db
            $collection = $db->users;
            $password = hash("sha256",$password);
            //Prepare the data for insertion
            //data is of type associative array
            $newUser = array(
                "username" => $username,
                "email" => $email,
                "password" => $password
            );
        
            //Now insert document to collection
            $collection->InsertOne($newUser);
            $_SESSION['user'] = $username;
            header("location: dashboard.php");
            exit();
        }else {
            if($mismatchFlag) {
                header("location: registerUser.php?msg=mismatch");
                exit();
            }else {
                header("location: registerUser.php?msg=invalid");
                exit();
            }
        }

    } catch (MongoConnectionException $e) {
        die('Error connecting to MongoDB server');
    } catch (MongoException $e) {
        die('Error: ' . $e->getMessage());
    }

?>