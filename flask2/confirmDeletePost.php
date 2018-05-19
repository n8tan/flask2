<?php
    session_start();

	  if(!isset($_SESSION['user'])){
        header("location: index.php");
        exit();
      }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Flash Board</title>

    <!-- Bootstrap core CSS -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link href="css/createPost.css" rel="stylesheet">
   
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
 
  </head>

  <body>

     <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Flask ~ Dash</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ml-3">
                <a class="nav-link btn btn-outline-primary text-white" href="dashboard.php">Go Back to Dashboard</a>
            </li>
            <li class="nav-item ml-3">
                <a class="nav-link btn btn-outline-primary text-white" href="#">View My Profile</a>
            </li>
            <li class="nav-item ml-3">
                <a class="nav-link btn btn-outline-primary text-white" href="followList.php">Follow Users</a>
            </li>
          </ul>
          <ul class="navbar-nav">       
              <li class="nav-item mr-auto">
                  <a class="nav-link btn btn-danger text-white" href="logout_Controller.php">Log Out</a>
              </li>
          </ul>
      
        </div>
    </nav>
    
    <?php
        $page = (int)$_GET['page'];
        $entry = $_GET['post'];
        echo "<form class='form-signin' method='POST' action='deletePostController.php' enctype='multipart/form-data'>";
        echo "<h1>Confirm Deletion?</h1>";
        
        echo "<hr>";
        echo "<div class='form-group'>";
        echo "<input name='time' type ='hidden' value='".$entry."'>";
        echo "<input class = 'btn btn-lg btn-primary btn-block button' type='submit' name='submit' value='Confirm Deletion!'/>";
        echo "</div>";
        echo "<a href='editList.php?page=".$page."' class='btn btn-primary'>Go Back</a>";
        
        echo "</form>";
        
    ?>



    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    
  </body>
</html>