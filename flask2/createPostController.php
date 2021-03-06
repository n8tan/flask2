<?php
session_start();
    /*
    BLOG
    Image : (File path to the picture) (Optional)
    Quotes : (Special holder so we know later during viewing that it is indeed a quote and not some text)
    Text : (Can include links or just plain text) (Can also act as description)
    User :
    Timestamp :
    Comment : {
        Array of comments containing {
            User name :
            Comment :
        }
    }

    NEW BLOG
    User:
    ContentLink:
    Timestamp:
    Comment: {
        User Name:
        Comment:
    }

    content will be saved as post + utc time
    */ 

    //Retrieving the stuff typed in the editor by the user 
    $editorData = $_POST['about'];

    //Retrieving current user
    $currentUser = $_SESSION['user'];

    //Get Unix Time
    $time = time();
    
    //Create file path (contentLink)
    $file_loc = "posts/blog".strval($time).".html";
    
    $timestamp = gmdate("Y-m-d\TH:i:s\Z");

    $myfile = fopen($file_loc, "w") or die("Unable to open file!");
    fwrite($myfile, $editorData);
    fclose($myfile);

    //Load the library
    require 'vendor/autoload.php';

    //Creating Connection 
    $connection = new MongoDB\Client("mongodb://localhost:27017");
    
    //Connect to the flask2 db
    $db = $connection->flask2w;

    //Connect to the collection 'posts' in 'flask2' db
    $collection = $db->posts;

    $newPost = array(
        "author" => $currentUser,
        "contentLink" => $file_loc,
        "timestamp" => $timestamp,
        "time" => $time
     );

     $collection->InsertOne($newPost);

    //redirect back to dashboard.
    header("location: dashboard.php");
    exit();
?>