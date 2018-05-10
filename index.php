

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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>

<body>

  <div class="form-wrapper">
      <?php
          if(isset($_GET['msg'])) {
              if($_GET['msg']=="invalid") {
                  echo '<div class="alert alert-warning alert-dismissible">';
                  echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                  echo '<strong>Something was wrong with your input.</strong></div>';
              }
          }
      ?>
    <h1>FLASK</h1>
    <form class="form-signin" method="post" action="controller/login_controller.php">
      <div class="form-item" >
        <label for="inputEmail"></label>
        <input type="email" id="inputEmail" name="inputEmail" required="required" placeholder="Email Address"></input>
      </div>
      <div class="form-item">
        <label for="inputPassword"></label>
        <input type="password" id="inputPassword" name="inputPassword" required="required" placeholder="Password" ></input>
      </div>
      <div class="button-panel">
        <input type="submit" class="button" title="Sign In" value="Sign In"></input>
      </div>
      <a href="login-with.php?provider=Facebook">Login With Facebook</a>
      <a href="login-with.php?provider=Google">Login With Google</a>
    </form>
    <div class="form-footer">
      <p><a href="registerUser.php">Create an account</a></p>
    </div>
</div>

</body>

</html>
