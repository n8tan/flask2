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

    $time = $_POST['time'];
    
    //Create file path (contentLink)
    $file_loc = "posts/blog".strval($time).".html";
    
    $myfile = fopen($file_loc, "w") or die("Unable to open file!");
    fwrite($myfile, $editorData);
    fclose($myfile);

    //redirect back to dashboard.
    header("location: dashboard.php");
    exit();
?>