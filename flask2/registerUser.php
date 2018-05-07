<?php
    session_start();

	  if(isset($_SESSION['user'])){
        header("location: dashboard.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>FLASK</title>
 
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="form-wrapper">
    <?php
        if(isset($_GET['msg'])) {
            if($_GET['msg']=="invalid") {
                echo '<div class="alert alert-warning alert-dismissible">';
                echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                echo '<strong>Something was wrong with your input.</strong></div>';
            }elseif($_GET['msg']=="mismatch"){
                echo '<div class="alert alert-warning alert-dismissible">';
                echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                echo '<strong>Password did not match with value in Confirm Password.</strong></div>';
            }
        }
    ?>
    <h1>FLASK</h1>
    <form class="form-signin" method="POST" action="registerUserController.php">
      <div class="form-item">
        <label for="userName"></label>
        <input type="text" name="userName" placeholder="User Name" id="userName" required autofocus>
        </input>
      </div>
      <div class="form-item">
        <label for="inputEmail"></label>
        <input type="email" id="inputEmail" name="inputEmail" placeholder="Email Address" required autofocus>
        </input>
      </div>
      <div class="form-item">
          <label for="inputPassword"></label>
          <input type="password" id="inputPassword" name="inputPassword" placeholder="Password" required>
          </input>
      </div>
      <div class="form-item">
          <label for="confirmPassword"></label>
          <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
          </input>
      </div>
      <div class="button-panel">
        <input type="submit" class="button" title="Register Account" value="Register Account"></input>
      </div>
    </form>
    <div class="form-footer">
      <p><a href="index.php">Back</a></p>
    </div>
</div>
  
  

</body>

</html>
