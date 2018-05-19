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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        #container {
            border: 1px solid black;
            height: 200px;  /* You can change this value */
            padding-top: 41px;
        }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark navbar-static-top bg-dark">
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
      require 'vendor/autoload.php';
      
      //Creating Connection 
      $connection = new MongoDB\Client("mongodb://localhost:27017");
  
      //Variables
      $numberItemsPerPage = 10;
      //End-of variables
  
      //Select DB
      $db = $connection->flask2w;
  
      //Select the collection
      $collection = $db->posts;

      $page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;

      //Amount of posts per page.
      $limit = 10;
      $skip  = ($page - 1) * $limit;
      $next  = ($page + 1);
      $prev  = ($page - 1);
      
      $operations  = array(
        array('$match' => array(
            'author' => ($_SESSION['user'])
        )),
        array('$skip' => ($skip)),
        array('$limit' => ($limit)),
        array('$sort' => array(
            'time' => -1
        ))
      );

      //Find all, skip a couple of records, get a certain number of records then sort it out.   
      $cursor = $collection->aggregate($operations);
      
      //Show the data.
      $counter = 0;
      foreach ($cursor as $entry) {
          echo "<div class='card-deck'>";
                  echo "<div class='col-sm-6'>";
                      echo "<div class='card'>";
                          echo "<div class='card-body'>";
                              echo "<h5 class='card-title'>".$entry['author']." -> Post #".$entry['time']."</h5>";
                                  echo "<div id='container'>";
                                      echo "<div id='editor".$counter."'>";
                                          echo file_get_contents($entry['contentLink']);
                                      echo "</div>";      
                                  echo "</div>";  
                                  echo "<a href='editPost.php?post=".$entry['time']."&page=".$page."' class='btn btn-primary'>Edit this post</a>";
                          echo "</div>";
                          
                      echo "</div>";
                      
                  echo "</div>";
          echo "</div>";
          $counter = $counter + 1;
      }

      $total= $collection->count(array('author'=>($_SESSION['user']))); 
      
      if($page > 1){
          echo '<a href="?page=' . $prev . '">Previous</a>';
          if($page * $limit < $total) {
              echo ' <a href="?page=' . $next . '">Next</a>';
          }
      } else {
          if($page * $limit < $total) {
              echo ' <a href="?page=' . $next . '">Next</a>';
          }
      }
      
      //Now attach $page to $_GET
      $_GET['page'] = $page;
    ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

     <!-- Initialize Quill editor -->
    <script>

        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons

            ['blockquote', 'code-block'],

            [{ 'list': 'ordered'}, { 'list': 'bullet' }],

            [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript

            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent

            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown

            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

            [ 'link', 'image','formula' ],          // add's image support

            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme

            [{ 'font': [] }],

            [{ 'align': [] }],

            ['clean']                                         // remove formatting button
        ];
        
        var quill0 = new Quill('#editor0', {
            modules: {
                toolbar: false
            },
            theme: 'snow',
            readOnly: true
        });

        var quill1 = new Quill('#editor1', {
            modules: {
                toolbar: false
            },
            theme: 'snow',
            readOnly: true
        });

        var quill2 = new Quill('#editor2', {
            modules: {
                toolbar: false
            },
            theme: 'snow',
            readOnly: true
        });

        
        var quill3 = new Quill('#editor3', {
            modules: {
                toolbar: false
            },
            theme: 'snow',
            readOnly: true
        });

        
        var quill4 = new Quill('#editor4', {
            modules: {
                toolbar: false
            },
            theme: 'snow',
            readOnly: true
        });

        
        var quill5 = new Quill('#editor5', {
            modules: {
                toolbar: false
            },
            theme: 'snow',
            readOnly: true
        });

        
        var quill6 = new Quill('#editor6', {
            modules: {
                toolbar: false
            },
            theme: 'snow',
            readOnly: true
        });

        
        var quill7 = new Quill('#editor7', {
            modules: {
                toolbar: false
            },
            theme: 'snow',
            readOnly: true
        });

        var quill8 = new Quill('#editor8', {
            modules: {
                toolbar: false
            },
            theme: 'snow',
            readOnly: true
        });

        var quill9 = new Quill('#editor9', {
            modules: {
                toolbar: false
            },
            theme: 'snow',
            readOnly: true
        });
    </script>
  
  </body>
</html>
