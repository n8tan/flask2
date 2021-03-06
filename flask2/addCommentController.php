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

    //Retrieving current user
    $currentUser = $_SESSION['user'];
    $currentPage = $_GET['page'];
    $currentPost = $_GET['post'];

    $commentData = $_POST['comment'];
    //Load the library
    require 'vendor/autoload.php';

    //Creating Connection 
    $connection = new MongoDB\Client("mongodb://localhost:27017");
    
    //Connect to the flask2 db
    $db = $connection->flask2w;

    //Connect to the collection 'posts' in 'flask2' db
    $collection = $db->posts;
    $file_loc = "posts/blog".$currentPost.".html";
    $targetPost =  array('contentLink' => ($file_loc));
    
     //Get Unix Time
     $time = time();

     $timestamp = gmdate("Y-m-d\TH:i:s\Z");
   
    $commentOperations = array('$addToSet' => array (
            "comments" => array (
                "user" => ($currentUser),
                "comment" => ($commentData),
                "timestamp" => $timestamp,
                "time" => $time
            )
         )  
    );
    
    $cursor2 = $collection->updateOne($targetPost,$commentOperations, array("upsert" => true));

    
    //db.users.update({"username" : "BOB5"},{$addToSet: { "following": {"user": "BOB4" } } })

     //Todo use $exists to check if following document exist for current user
    //TODO $AND ($EXISTS following  / $match USER)
     
    //echo $userToFollow;


    //redirect back to dashboard.
    header("location: viewPost.php?post=".$currentPost."&page=".$currentPage);
    exit();
?>