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
  </head>

  <body>

  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Flask ~ Create Post</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ml-3">
            <a class="nav-link btn btn-outline-primary text-white" href="dashboard.php">Go Back to Dashboard</a>
          </li>
          <li class="nav-item ml-3">
                <a class="nav-link btn btn-outline-primary text-white" href="#">View My Dash</a>
          </li> 
          <li class="nav-item ml-3">
                <a class="nav-link btn btn-outline-primary text-white" href="#">View My Profile</a>
          </li>
        </ul>
        <ul class="navbar-nav">       
            <li class="nav-item mr-auto">
                <a class="nav-link btn btn-danger text-white" href="#">Log Out</a>
            </li>
        </ul>
      </div>
  </nav>
  <form class="form-signin" method="POST" action="createPostController.php" enctype="multipart/form-data">
                         <!--Action would point to createPostController php file. -->
        <h1>Create a post</h1>
        <hr>
        <div class="form-group">
            <p>Add a picture</p>
            <label for="picture" class="custom-file-label">Add a picture</label>
            <input type="file" id="picture" name="picture" class="form-control-file" placeholder="Add a picture">
        </div>
        
        <label for="quotes" class="sr-only">Add a quote</label>
            <input type="text" id="quotes" name="quotes" class="form-control" placeholder="Add a quote">

        <label for="textArea" class="sr-only">Add some text</label>
            <textarea class="form-control" id="textArea" name="textArea" rows="6" placeholder="Add some text"></textarea>
        <br>
        <input class = "btn btn-lg btn-primary btn-block button" type="submit" name="submit" value="Submit Post!" />
  </form>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>
